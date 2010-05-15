<?php
/*
  $Id$

  (c) 2004 - 2010 Andrew Simpson <andrew.simpson at paradise.net.nz>

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

  create_top('Error' );
  new_box('Error', "<div align=\"center\">".$message."</div>", 'boxdata-small', 'head-small' );
  create_bottom();
  die;

}

//
// LOGIN CHECK
//

//valid login attempt ?
if( (isset($_POST['username']) && isset($_POST['password']) ) ) {

  include_once(BASE.'includes/common.php' );
  include_once(BASE.'database/database.php' );

  //set variables
  $q = '';
  $content = '';
  $flag_attempt = FALSE;
  $username = safe_data($_POST['username']);
  //encrypt password
  $md5pass = md5($_POST['password'] );

  //no ip (possible?)
  if( ! ($ip = $_SERVER['REMOTE_ADDR'] ) ) {
    secure_error('Unable to determine ip address');
  }

  //set character set & connect to database
  db_user_locale(CHARACTER_SET);

  //limit login attempts if post-1.60 database is being used
  if(@db_query('SELECT * FROM '.PRE.'login_attempt LIMIT 1', 0 ) ) {

    //count the number of recent login attempts
    if( ! $q = @db_query('SELECT COUNT(*) FROM '.PRE.'login_attempt
                               WHERE name=\''.$username.'\'
                               AND last_attempt > (now()-INTERVAL '.$delim.'10 MINUTE'.$delim.') LIMIT 4', 0 ) ) {
      secure_error('Unable to connect to database.  Please try again later.' );
    }

    $count_attempts = db_result($q, 0, 0 );

    //protect against password guessing attacks
    if($count_attempts > 3 ) {
      secure_error('Exceeded allowable number of login attempts.<br /><br />Account locked for 10 minutes.' );
    }
    $flag_attempt = TRUE;

    //record this login attempt
    db_query('INSERT INTO '.PRE.'login_attempt(name, ip, last_attempt ) VALUES (\''.$username.'\', \''.$ip.'\', now() )' );
  }

  //do query and check database connection
  if( ! $q = db_query('SELECT id FROM '.PRE.'users
                             WHERE deleted=\'f\'
                             AND admin=\'t\'
                             AND name=\''.$username.'\'
                             AND password=\''.$md5pass.'\'', 0 ) ){
    secure_error('Not a valid username, or password' );
  }

  //no such user-password combination
  if( ! ($user_id = @db_result($q, 0, 0) ) ) {
    sleep(2);
    secure_error('Not a valid username, or password' );
  }

  //user is okay log him/her in

  //remove the old login information for post 1.60 database
  if($flag_attempt ) {
    @db_query('DELETE FROM '.PRE.'login_attempt WHERE last_attempt < (now()-INTERVAL '.$delim.'20 MINUTE'.$delim.') OR name=\''.$username.'\'' );
  }

  //update for version 1.32 -> 1.40
  if(! (db_query('SELECT groupaccess FROM '.PRE.'config', 0 ) ) ) {
     db_query('ALTER TABLE '.PRE.'tasks ADD COLUMN groupaccess VARCHAR(5)' );
     db_query('ALTER TABLE '.PRE.'tasks ALTER COLUMN groupaccess SET DEFAULT \'f\'' );
     db_query('ALTER TABLE '.PRE.'config ADD COLUMN groupaccess VARCHAR(50)' );
     $content .= "<p>Updating from version pre-1.40 database ... success!</p>\n";
  }

  //update for version 1.51 -> 1.60
  if(! (db_query('SELECT * FROM '.PRE.'login_attempt', 0 ) ) ) {

    switch (DATABASE_TYPE) {
      case 'mysql':
        db_query('CREATE TABLE '.PRE.'login_attempt ( name VARCHAR(100) NOT NULL,
                                               ip VARCHAR(100) NOT NULL,
                                               last_attempt DATETIME NOT NULL)' );
        break;

      case 'mysql_innodb':
      case 'mysqli':
        db_query('CREATE TABLE '.PRE.'login_attempt ( name VARCHAR(100) NOT NULL,
                                               ip VARCHAR(100) NOT NULL,
                                               last_attempt DATETIME NOT NULL)
                                               TYPE = innoDB' );
        break;


      case 'postgresql':
        db_query('CREATE TABLE "'.PRE.'login_attempt" ( "name" character varying(100) NOT NULL,
                                               "ip" character varying(100) NOT NULL,
                                               "last_attempt" timestamp with time zone NOT NULL DEFAULT current_timestamp(0))' );
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }
  }

  //update for version 1.51 -> 1.60
  if(! (db_query('SELECT private FROM '.PRE.'users', 0 ) ) ) {
     db_query('ALTER TABLE '.PRE.'users ADD COLUMN private INT' );
     db_query('ALTER TABLE '.PRE.'users ALTER COLUMN private SET DEFAULT 0' );
  }

  //update for version 1.51 -> 1.60
  if(! (db_query('SELECT private FROM '.PRE.'usergroups', 0 ) ) ) {
     db_query('ALTER TABLE '.PRE.'usergroups ADD COLUMN private INT' );
     db_query('ALTER TABLE '.PRE.'usergroups ALTER COLUMN private SET DEFAULT 0' );
  }

  //update for version 1.59 -> 1.60
  if(! (db_query('SELECT completed FROM '.PRE.'tasks', 0 ) ) ) {

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql':
      case 'mysql_innodb':
      case 'mysqli':
        $date_type = 'DATETIME';
        break;

      case 'postgresql':
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

    //retrieve existing data
    $q = db_query('SELECT id FROM '.PRE.'tasks WHERE parent=0' );

    for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {

      $q_complete = db_query('SELECT status FROM '.PRE.'tasks WHERE projectid='.$row['id'].' AND parent<>0'  );

      $total_tasks = 0;
      $tasks_completed = 0;

      for($j=0 ; $row_complete = @db_fetch_num($q_complete, $j ) ; $j++ ) {
        $total_tasks++;

        if($row_complete[0] == 'done') {
          $tasks_completed++;
        }
      }

      //project with no tasks is complete
      if($total_tasks == 0 ){
        $percent_completed = 0;
      }
      else{
        $percent_completed = round($tasks_completed * 100 / $total_tasks );
      }

      db_query('UPDATE '.PRE.'tasks SET completed='.(int)$percent_completed.' WHERE id='.$row['id'] );

      //for completed project set the completion time
      if($percent_completed == 100 ){
        $completion_time = db_result(db_query('SELECT MAX(finished_time) FROM '.PRE.'tasks WHERE projectid='.$row['id'] ), 0, 0 );
        db_query('UPDATE '.PRE.'tasks SET completion_time=\''.$completion_time.'\' WHERE id='.$row['id'] );
      }
    }
    $content .= "<p>Updating from version pre-1.60 database ... success!</p>\n";
  }

  //update for version 1.60 -> 1.70
  if(! (db_query('SELECT guest FROM '.PRE.'users', 0 ) ) ) {
    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql':
      case 'mysql_innodb':
      case 'mysqli':
        $integer = 'TINYINT';
        break;

      case 'postgresql':
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

    $content .= "<p>Updating from version pre-1.69 database ... success!</p>\n";
  }

  //update for version 1.69 -> 1.70
  if(! (db_query("SELECT fileid FROM ".PRE."files", 0 ) ) ) {
    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql':
      case 'mysql_innodb':
      case 'mysqli':
        db_query('ALTER TABLE '.PRE.'files CHANGE COLUMN oid fileid INT' );
        break;

      case 'postgresql':
        db_query('ALTER TABLE '.PRE.'files ADD COLUMN fileid INTEGER' );

        $q = db_query('SELECT id, oid FROM '.PRE.'files' );

        for($i=0 ; $row = @db_fetch_array($q, $i ) ; $i++) {
          db_query('UPDATE '.PRE.'files SET fileid='.$row['oid'].' WHERE id='.$row['id'] );
        }
        break;

      default:
        error("Database type not specified in config file." );
        break;
    }
    $content .= "<p>Updating from version pre-1.70 database ... success!</p>\n";
  }

  //update version 1.81 -> 2.00
  if(! (db_query("SELECT taskid FROM ".PRE."contacts", 0 ) ) ) {

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
    if((DATABASE_TYPE == 'mysql' ) || (DATABASE_TYPE == 'mysql_innodb' ) || (DATABASE_TYPE == 'mysqli' ) ) {
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

    $content .= "<p>Updating from version pre-2.00 database ... success!</p>\n";
  }

  //update version 2.00 -> 2.20
  if(! (db_query('SELECT * FROM '.PRE.'site_name', 0 ) ) ) {

    if(! defined('MANAGER_NAME') )      define('MANAGER_NAME', 'WebCollab Project Management' );
    if(! defined('ABBR_MANAGER_NAME') ) define('ABBR_MANAGER_NAME', 'WebCollab' );

    switch (DATABASE_TYPE) {
      case 'mysql':
        db_query('CREATE TABLE '.PRE.'site_name (manager_name VARCHAR(100),
                                                 abbr_manager_name VARCHAR(100) )' );
        break;

      case 'mysql_innodb':
      case 'mysqli':
        db_query('CREATE TABLE '.PRE.'site_name (manager_name VARCHAR(100),
                                                 abbr_manager_name VARCHAR(100) )
                                                 TYPE = innoDB' );
        break;

      case 'postgresql':
        db_query('CREATE TABLE "'.PRE.'site_name" ("manager_name" character varying(100),
                                                   "abbr_manager_name" character varying(100) )' );
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    //update the new table
    db_query("INSERT INTO ".PRE."site_name (manager_name, abbr_manager_name)  VALUES('".ABBR_MANAGER_NAME."','".ABBR_MANAGER_NAME."')" );

    //update deadline hours
    db_query('UPDATE '.PRE.'tasks SET deadline=(deadline+INTERVAL '.$delim.'2 HOUR'.$delim.')' );

    $content .= "<p>Updating from version pre-2.20 database ... success!</p>\n";
  }

  //update version 2.20 -> 2.30
  if(! (db_query('SELECT edited FROM '.PRE.'forum', 0 ) ) ) {

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql':
      case 'mysql_innodb':
      case 'mysqli':
        $date_type = 'DATETIME';
        break;

      case 'postgresql':
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

    $content .= "<p>Updating from version pre-2.30 database ... success!</p>\n";
  }

  //update version 2.40 -> 2.50
  if(! (db_query('SELECT token FROM '.PRE.'logins', 0 ) ) ) {

    //add new column for token
    db_query('ALTER TABLE '.PRE.'logins ADD COLUMN token VARCHAR(100)' );

    //set parameters for appropriate for database
    switch (DATABASE_TYPE) {
      case 'mysql':
      case 'mysql_innodb':
      case 'mysqli':
        //increase mime column to 200 characters
        db_query('ALTER TABLE '.PRE.'files MODIFY COLUMN mime VARCHAR(200)' );
        break;

      case 'postgresql':
        //increase mime column to 200 characters
        db_query('ALTER TABLE '.PRE.'files ALTER COLUMN mime TYPE VARCHAR(200)' );
        break;

      default:
        error('Database type not specified in config file.' );
        break;
    }

    $content .= "<p>Updating from version pre-2.50 database ... success!</p>\n";
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

//login box screen code
create_top('Login', 0, 2 );

$content = "<p>Admin login is required for database update:</p>\n".
           "<form name=\"inputform\" method=\"post\" action=\"update.php\">\n".
           "<table>\n".
           "<tr><td>Login: </td><td><input type=\"text\" id=\"username\" name=\"username\" size=\"30\" />".
           "<script type=\"text/javascript\">document.getElementById('username').focus();</script></td></tr>\n".
           "<tr><td>Password: </td><td><input type=\"password\" name=\"password\" value=\"\" size=\"30\" /></td></tr>\n".
           "</table>\n".
           "<div align=\"center\">\n".
           "<p><input type=\"submit\" value=\"Login\" /></p>\n".
           "</div></form>\n";

//set box options
new_box("Login", $content, 'boxdata', 'boxdata-small', 'head-small' );

create_bottom();

?>