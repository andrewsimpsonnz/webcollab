<?php
/*
  $Id$

  This is the main config page.
  Items marked ** need to be filled in - the others don't matter.

*/


//Some default values

  //Base directory of the project

  //You need to add the full webservername and dir to WebCollab here. Example"
  // "http://www.your-url-here.com/backend/org/" (don't forget the tailing slash)
  //**
  $BASE_URL="";

  //The name of the site
  $MANAGER_NAME="WebCollab Project Management";

  //The abbreviated name for the site (for use in email subject lines)
  $ABBR_MANAGER_NAME="WebCollab";

//Database options
  //**
  $DATABASE_NAME="";
  $DATABASE_USER="";
  $DATABASE_PASSWORD="";

//Database type (valid options are "mysql" and "postgresql")
  //**
  $DATABASE_TYPE="mysql";
  $DATABASE_HOST="localhost";

/*Note: $DATABASE_HOST is not used for Postgresql. To use remote connections with PostgreSQL:
   - Edit pg_hba.conf (Postgresql config) to allow tcp/ip connections
   - Start postmaster with -i option
   - Edit /includes/pgsql_database.php to allow remote hosts
*/

//email addresses

  //If an error occurs, who do you want the error to be mailed to ?
  $EMAIL_ERROR="";

// file uploads

  //upload to what directory ?
  $FILE_BASE = "/home/files";

  //max file size in bytes ( 2 mb default)
  $FILE_MAXSIZE = 2000000;

/*Note:
  1. Make sure the filebase directory exists, and is writeable by the webserver, or you
     won't be able to upload any files.
  2. The filebase directory must be outside your webserver root directory to maintain file
     security.  This is important to prevent users navigating to the file directory with
     their web browsers, and viewing all the files.

*/

// language files
  
  // available locales are 'en' (English).

  $LOCALE = "en";


// minor config parameters

  //number of days that new or updated tasks should be highlighted as 'New' or 'Updated'
  $NEW_TIME = 14;

  //custom image to replace the webcollab banner on splash page (base directory is /images)
  $SITE_IMG = "";

  //sort order on project list & summary (SQL format) (default is "taskname")
  $PROJECT_ORDERED_BY = "taskname";

// error message config parameters

  //show full debugging messages on the screen when errors occur (values are "0", or "1")
  $DEBUG = "0";

  //Don't show full error message on the screen - just a 'sorry, try again' message (values are "0", or "1")
  $NO_ERROR = "0";


?>
