<?php
/*
  $Id: update.php 2328 2009-09-27 08:31:56Z andrewsimpson $

  (c) 2004 - 2015 Andrew Simpson <andrew.simpson at paradise.net.nz>

  WebCollab
  ---------------------------------------

  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful, but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave,
  Cambridge, MA 02139, USA.

   Function:
  ---------

  Updating older databases to the current schema

*/

require_once('path.php' );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

include_once(BASE.'lang/lang.php' );
include_once(BASE.'includes/common.php' );
include_once(BASE.'includes/screen.php' );

//
// ERROR FUNCTION
//

function secure_error($message ) {

  create_top('Error', 1 );
  new_box('Error', "<div style=\"text-align:center\">".$message."</div>", 'boxdata-small', 'head-small' );
  create_bottom();
  die;

}


function update($username ) {

  //initalise variables
  $content = '';
  
  //user is okay log him/her in

  //remove the old login information for post 1.60 database
  if(@db_query('SELECT * FROM '.PRE.'login_attempt LIMIT 1', 0 ) ) {
    $q = db_prepare('DELETE FROM '.PRE.'login_attempt WHERE last_attempt < (now()-INTERVAL '.db_delim('20 MINUTE' ).') OR name=?' );
    db_execute($q, array($username ) );
  }

  //update for version 1.32 -> 1.40
  if(! (db_query('SELECT groupaccess FROM '.PRE.'config', 0 ) ) ) {
     db_begin();
     db_query('ALTER TABLE '.PRE.'tasks ADD COLUMN groupaccess VARCHAR(5)' );
     db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN groupaccess SET DEFAULT \'f\'' );
     db_query('ALTER TABLE '.PRE.'config ADD COLUMN groupaccess VARCHAR(50)' );
     $content .= "<p>Updating from version pre-1.40 database ... success!</p>\n";
     db_commit();
  }
  
  //update for version 1.51 -> 1.60
  if(! (db_query('SELECT * FROM '.PRE.'login_attempt', 0 ) ) ) {

    db_begin();

    switch (DATABASE_TYPE) {

      case 'mysql_pdo':
        db_query('CREATE TABLE '.PRE.'login_attempt ( name VARCHAR(100) NOT NULL,
                                               ip VARCHAR(100) NOT NULL,
                                               last_attempt DATETIME NOT NULL)
                                               ENGINE = innoDB
                                               CHARACTER SET = utf8;' );
        break;

      case 'postgresql_pdo':
        db_query('CREATE TABLE "'.PRE.'login_attempt" ( "name" character varying(100) NOT NULL,
                                               "ip" character varying(100) NOT NULL,
                                               "last_attempt" timestamp with time zone NOT NULL DEFAULT current_timestamp(0))' );
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }
    db_commit();
  }

  //update for version 1.51 -> 1.60
  if(! (@db_query('SELECT private FROM '.PRE.'users', 0 ) ) ) {
     db_begin();
     db_query('ALTER TABLE '.PRE.'users ADD COLUMN private INT' );
     db_query('ALTER TABLE '.PRE.'users ALTER COLUMN private SET DEFAULT 0' );
     db_commit();
  }

  //update for version 1.51 -> 1.60
  if(! (db_query('SELECT private FROM '.PRE.'usergroups', 0 ) ) ) {
     db_begin();
     db_query('ALTER TABLE '.PRE.'usergroups ADD COLUMN private INT' );
     db_query('ALTER TABLE '.PRE.'usergroups ALTER COLUMN private SET DEFAULT 0' );
     db_commit();
  }

  //update for version 1.59 -> 1.60
  if(! (@db_query('SELECT completed FROM '.PRE.'tasks', 0 ) ) ) {

     db_begin();

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql_pdo':
        $date_type = 'DATETIME';
        break;

      case 'postgresql_pdo':
        $date_type = 'timestamp with time zone';
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    //add columns to database
    db_query('ALTER TABLE '.PRE.'tasks ADD COLUMN completed INT' );
    db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN completed SET DEFAULT 0' );
    db_query('ALTER TABLE '.PRE.'tasks ADD COLUMN completion_time '.$date_type );

    $q1 = db_prepare('SELECT status FROM '.PRE.'tasks WHERE projectid=? AND parent<>0' );
    $q2 = db_prepare('UPDATE '.PRE.'tasks SET completed=? WHERE id=?' );
    $q3 = db_prepare('SELECT MAX(finished_time) FROM '.PRE.'tasks WHERE projectid=?');
    $q4 = db_prepare('UPDATE '.PRE.'tasks SET completion_time=? WHERE id=?' );

    //retrieve existing data
    $q = db_query('SELECT id FROM '.PRE.'tasks WHERE parent=0' );

    for($i=0 ; $row = @db_fetch_array($q, $i ) ; ++$i) {

      db_execute($q1, array($row['id'] ) );

      $total_tasks = 0;
      $tasks_completed = 0;

      for($j=0 ; $row_complete = @db_fetch_num($q_complete, $j ) ; ++$j ) {
        ++$total_tasks;

        if($row_complete[0] == 'done') {
          ++$tasks_completed;
        }
      }

      //project with no tasks is complete
      if($total_tasks == 0 ){
        $percent_completed = 0;
      }
      else{
        $percent_completed = round($tasks_completed * 100 / $total_tasks );
      }

      db_execute($q2, array((int)$percent_completed, $row['id'] ) );

      //for completed project set the completion time
      if($percent_completed == 100 ){
        db_execute($q3, array($row['id'] ) );
        db_execute($q4, array($completion_time, $row['id'] ) );
      }

      db_free_result($q1 );
      db_free_result($q2 );
      db_free_result($q3 );
      db_free_result($q4 );
    }

    db_commit();
    $content .= "<p>Updating from version pre-1.60 database ... success!</p>\n";
  }

  //update for version 1.60 -> 1.70
  if(! (@db_query('SELECT guest FROM '.PRE.'users', 0 ) ) ) {

    db_begin();

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql_pdo':
        $integer = 'TINYINT';
        break;

      case 'postgresql_pdo':
        $integer = 'SMALLINT';
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    db_query('ALTER TABLE '.PRE.'users ADD COLUMN guest '.$integer );
    db_query('ALTER TABLE '.PRE.'users ALTER COLUMN guest SET DEFAULT 0' );
    db_query('UPDATE '.PRE.'users SET guest=0' );

    //archive
    db_query('ALTER TABLE '.PRE.'tasks ADD COLUMN archive '.$integer );
    db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN archive SET DEFAULT 0' );
    db_query('UPDATE '.PRE.'tasks SET archive=0' );

    //project sorting
    db_query('ALTER TABLE '.PRE.'config ADD COLUMN project_order VARCHAR(200)' );
    db_query('UPDATE '.PRE.'config SET project_order=\'ORDER BY name\'' );

    db_query('ALTER TABLE '.PRE.'config ADD COLUMN task_order VARCHAR(200)' );
    db_query('UPDATE '.PRE.'config SET task_order=\'ORDER BY name\'' );

    db_commit();
    $content .= "<p>Updating from version pre-1.69 database ... success!</p>\n";
  }

  //update for version 1.69 -> 1.70
  if(! (db_query("SELECT fileid FROM ".PRE."files", 0 ) ) ) {
 
    db_begin();
 
    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql_pdo':
        db_query('ALTER TABLE '.PRE.'files CHANGE COLUMN oid fileid INT' );
        break;

      case 'postgresql_pdo':
        db_query('ALTER TABLE '.PRE.'files ADD COLUMN fileid INTEGER' );

        $q = db_query('SELECT id, oid FROM '.PRE.'files' );

        $q1 = db_prepare('UPDATE '.PRE.'files SET fileid=? WHERE id=?' );

        for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
          db_execute($q1, array($row['oid'], $row['id'] ) );
          db_free_result($q1 );
        }
        break;

      default:
        error("Database type not specified in config file." );
        break;
    }
    db_commit();
    $content .= "<p>Updating from version pre-1.70 database ... success!</p>\n";
  }

  //update version 1.81 -> 2.00
  if(! (db_query("SELECT taskid FROM ".PRE."contacts", 0 ) ) ) {

    db_begin();

    //add project capability to contacts
    db_query('ALTER TABLE '.PRE.'contacts ADD COLUMN taskid INT' );
    db_query('UPDATE '.PRE.'contacts SET taskid=0' );

    //add locale for users
    db_query('ALTER TABLE '.PRE.'users ADD COLUMN locale VARCHAR(10)' );
    db_query('UPDATE '.PRE.'users SET locale=\''.LOCALE.'\'' );

    //add sequence for iCalendar
    db_query('ALTER TABLE '.PRE.'tasks ADD COLUMN sequence INT' );
    db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN sequence SET DEFAULT 0' );
    db_query('UPDATE '.PRE.'tasks SET sequence=0' );

    //change 'datetime' columns to 'timestamp'
    if(DATABASE_TYPE == 'mysql_pdo' ) {
      db_query('ALTER TABLE '.PRE.'tasks MODIFY COLUMN created TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'tasks MODIFY COLUMN edited TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'tasks MODIFY COLUMN finished_time TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'tasks MODIFY COLUMN deadline TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'tasks MODIFY COLUMN lastforumpost TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'tasks MODIFY COLUMN lastfileupload TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'tasks MODIFY COLUMN completion_time TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'forum MODIFY COLUMN posted TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'logins MODIFY COLUMN lastaccess TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'seen MODIFY COLUMN time TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'contacts MODIFY COLUMN date TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'files MODIFY COLUMN uploaded TIMESTAMP' );
      db_query('ALTER TABLE '.PRE.'login_attempt MODIFY COLUMN last_attempt TIMESTAMP' );
    }

    db_commit();
    $content .= "<p>Updating from version pre-2.00 database ... success!</p>\n";
  }

  //update version 2.00 -> 2.20
  if(! (db_query('SELECT * FROM '.PRE.'site_name', 0 ) ) ) {

    db_begin();

    if(! defined('MANAGER_NAME') )      define('MANAGER_NAME', 'WebCollab Project Management' );
    if(! defined('ABBR_MANAGER_NAME') ) define('ABBR_MANAGER_NAME', 'WebCollab' );

    switch (DATABASE_TYPE) {
      case 'mysql_pdo':
        db_query('CREATE TABLE '.PRE.'site_name (manager_name VARCHAR(100),
                                                 abbr_manager_name VARCHAR(100) )
                                                 ENGINE = innoDB
                                                 CHARACTER SET = utf8;' );
        break;

      case 'postgresql_pdo':
        db_query('CREATE TABLE "'.PRE.'site_name" ("manager_name" character varying(100),
                                                   "abbr_manager_name" character varying(100) )' );
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    //update the new table
    $q = db_prepare("INSERT INTO ".PRE."site_name (manager_name, abbr_manager_name) VALUES(?, ? )" );
    db_execute($q, array(MANAGER_NAME, ABBR_MANAGER_NAME ) );

    //update deadline hours
    db_query('UPDATE '.PRE.'tasks SET deadline=(deadline+INTERVAL '.db_delim('2 HOUR' ).')' );

    db_commit();
    $content .= "<p>Updating from version pre-2.20 database ... success!</p>\n";
  }

  //update version 2.20 -> 2.30
  if(! (db_query('SELECT edited FROM '.PRE.'forum', 0 ) ) ) {

    db_begin();

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql_pdo':
        $date_type = 'DATETIME';
        break;

      case 'postgresql_pdo':
        $date_type = 'timestamp with time zone';
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    //add edited to forum table
    db_query('ALTER TABLE '.PRE.'forum ADD COLUMN edited '.$date_type );

    //add sequence for forum
    db_query('ALTER TABLE '.PRE.'forum ADD COLUMN sequence INT' );
    db_query('ALTER TABLE '.PRE.'forum ALTER COLUMN sequence SET DEFAULT 0' );
    db_query('UPDATE '.PRE.'forum SET sequence=0' );

    db_commit();
    $content .= "<p>Updating from version pre-2.30 database ... success!</p>\n";
  }

  //update version 2.40 -> 2.50
  if(! (db_query('SELECT token FROM '.PRE.'logins', 0 ) ) ) {

    db_begin();

    //add new column for token
    db_query('ALTER TABLE '.PRE.'logins ADD COLUMN token VARCHAR(100)' );

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql_pdo':
        //increase mime column to 200 characters
        db_query('ALTER TABLE '.PRE.'files MODIFY COLUMN mime VARCHAR(200)' );
        break;

      case 'postgresql_pdo':
        //increase mime column to 200 characters
        db_query('ALTER TABLE '.PRE.'files ALTER COLUMN mime TYPE VARCHAR(200)' );
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    db_commit();
    $content .= "<p>Updating from version pre-2.50 database ... success!</p>\n";
  }

  //update version 2.50 -> 3.00
  if(! (db_query('SELECT token FROM '.PRE.'tokens', 0 ) ) ) {

    db_begin();

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'postgresql_pdo':
        $q = db_query('SELECT data_type FROM information_schema.columns 
                              WHERE table_name=\'tasks\' AND column_name=\'groupaccess\'');
        if(db_result($q, 0, 0 ) == 'boolean' ) {

          db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN globalaccess DROP DEFAULT' );
          db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN globalaccess TYPE VARCHAR(5) 
                              USING (CASE WHEN globalaccess THEN \'t\' ELSE \'f\' END),
                              ALTER COLUMN globalaccess SET DEFAULT \'f\'' );

          db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN groupaccess DROP DEFAULT' );
          db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN groupaccess TYPE VARCHAR(5) 
                              USING (CASE WHEN groupaccess THEN \'t\' ELSE \'f\' END),
                              ALTER COLUMN groupaccess SET DEFAULT \'t\'' );

          db_query('ALTER TABLE '.PRE.'users ALTER COLUMN admin DROP DEFAULT' );
          db_query('ALTER TABLE '.PRE.'users ALTER COLUMN admin TYPE VARCHAR(5) 
                              USING (CASE WHEN admin THEN \'t\' ELSE \'f\' END),
                              ALTER COLUMN admin SET DEFAULT \'f\'' );

          db_query('ALTER TABLE '.PRE.'users ALTER COLUMN deleted DROP DEFAULT' );
          db_query('ALTER TABLE '.PRE.'users ALTER  COLUMN deleted TYPE VARCHAR(5) 
                              USING (CASE WHEN deleted THEN \'t\' ELSE \'f\' END),
                              ALTER COLUMN deleted SET DEFAULT \'f\'' );
        }

        db_query('CREATE TABLE "'.PRE.'tokens" ("token" character varying(100) NOT NULL,
                                                "action" character varying(100) NOT NULL,
                                                "userid" integer NOT NULL,
                                              "lastaccess" timestamp with time zone NOT NULL DEFAULT current_timestamp(0))' );
        break;

      case 'mysql_pdo':
        db_query('CREATE TABLE '.PRE.'tokens (token VARCHAR(100) NOT NULL,
                                              action VARCHAR(100) NOT NULL,
                                              userid INT UNSIGNED NOT NULL,
                                              lastaccess DATETIME NOT NULL)
                                              ENGINE = innoDB
                                              CHARACTER SET = utf8;' );
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    db_commit();
    $content .= "<p>Updating from version pre-3.00 database ... success!</p>\n";
  }

  //update version 3.00 -> 3.40
  if(! (db_query('SELECT hashid FROM '.PRE.'files', 0 ) ) ) {

    db_begin();

    //add column for hashid
    db_query('ALTER TABLE '.PRE.'files ADD COLUMN hashid VARCHAR(200)' );

    db_commit();
    $content .= "<p>Updating from version pre-3.40 database ... success!</p>\n";
  }
    
  if( ! $content ) {
    $content .= "<p>No database updates were required.</p>\n";
  }

  $content .= "<p>Database update action has been completed.</p>\n";

  //display box calls
  create_top("Info", 1 );
  new_box("Update completed", $content, 'boxdata-small', 'head-small' );
  create_bottom();
  die;
}

//
// MAIN PROGRAM
//

//valid login attempt ?
if( (isset($_POST['username']) && isset($_POST['password']) ) ) {

  include_once(BASE.'includes/common.php' );
  include_once(BASE.'database/database.php' );

  //set variables
  $q = '';
  $row = '';
  $hash = 'xxxx';
  $salt = '';
  $username = '0';
  $password = '0';

    //log ip address
  if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
    secure_error('Unable to determine ip address');
  }
  
  $username = safe_data($_POST['username']);

  //construct login query for username / password
  if(! ($q = db_prepare('SELECT id, password FROM '.PRE.'users WHERE name=? AND deleted=\'f\' AND admin=\'t\'', 0 ) ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  //database query
  if( ! @db_execute($q, array($username), 0 ) ) {
    secure_error('Unable to connect to database.  Please try again later.' );
  }

  $row = @db_fetch_array($q, 0 );
  
  //limit login attempts if post-1.60 database is being used
  if(@db_query('SELECT * FROM '.PRE.'login_attempt LIMIT 1', 0 ) ) {

    //record this login attempt
    $q = db_prepare('INSERT INTO '.PRE.'login_attempt(name, ip, last_attempt ) VALUES (?, ?, now() )' );
    db_execute($q, array($username, $ip ) );

    //count the number of recent login attempts
    if(! ($q = db_prepare('SELECT COUNT(*) FROM '.PRE.'login_attempt
                                  WHERE name=? AND last_attempt > (now()-INTERVAL '.db_delim('10 MINUTE').') LIMIT 4', 0 ) ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }

    if(! db_execute($q, array($username ), 0 ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }

    //protect against password guessing attacks
    if(db_result($q, 0, 0 ) > 3 ) {
      secure_error("Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes." );
    }
  }

  //if user-password combination exists
  if($row == true ) {

    switch (substr($row['password'], 0, 3 ) ) {

     case '$5$':
        //sha256 + salt encryption
        $parts = explode('$', $row['password'] );
        $salt = '$5$'.$parts[2].'$'.$parts[3].'$';
        $hash = crypt($_POST['password'], $salt );
        break;

      case '$2a':
      case '$2y':
        //bcrypt encryption
        $salt = substr($row['password'], 0, 29 );
        $hash = crypt($_POST['password'], $salt );
        break;

      default:
        //older md5 encryption (being deprecated)
        $hash = md5($_POST['password'] );
        break;
    }

    if($hash === $row['password'] ) {
      update($username );
    }
  }
    
  //wait two seconds then record an error
  sleep(2);
  secure_error("Not a valid username, or password" );
  die;
}

//login box screen code
create_top('Login', 1, 0, 2 );

$content = "<div style=\"text-align:center\">\n".
           "<p>Admin login is required for database update:</p>\n".
           "<form method=\"post\" action=\"update.php\">\n".
           "<table style=\"margin-left:auto; margin-right:auto;\">\n".
           "<tr align=\"left\" ><td>Login: </td><td><input type=\"text\" class=\"size\" id=\"username\" name=\"username\" />".
           "<script type=\"text/javascript\">document.getElementById('username').focus();</script></td></tr>\n".
           "<tr align=\"left\" ><td>Password: </td><td><input type=\"password\" class=\"size\" name=\"password\" value=\"\" /></td></tr>\n".
           "</table>\n".
           "<p style=\"padding-top: 20px\"><input type=\"submit\" value=\"Login\" /></p>\n".
           "</form></div>\n";

//set box options
new_box("Login", $content, 'boxdata-small', 'head-small' );

create_bottom();

?>