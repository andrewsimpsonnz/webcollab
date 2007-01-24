<?php
/*
  $Id$

*/

//------------------------------------------------------------------------------------------

//ALLOWING WEB-BASED SETUP

  //Allow web-based the setup prgram to alter this file (values are "N", or "Y").
  //Defaults to "N" (not allowed) after the first successful web install.
  //** For security: change this to "N" **
  $WEB_CONFIG = "Y";

//----------------------------------------------------------------------------------------------

//BASE DIRECTORY

  //You need to add the full webservername and dir to WebCollab here. Example"
  // "http://www.your-url-here.com/backend/org/" (don't forget the tailing slash)
  define('BASE_URL', "" );

  //The name of the site
  define('MANAGER_NAME', "WebCollab Project Management" );

  //The abbreviated name for the site (for use in email subject lines)
  define('ABBR_MANAGER_NAME',"WebCollab" );


//----------------------------------------------------------------------------------------------

//DATABASE OPTIONS

  define('DATABASE_NAME', "" );
  define('DATABASE_USER', "" );
  define('DATABASE_PASSWORD', "" );

  //Database type (valid options are "mysql", "postgresql", "mysql_innodb" and "mysqli")
  define('DATABASE_TYPE', "mysql" );

  //Database host (usually "localhost")
  define('DATABASE_HOST', "localhost" );

  /*Note:
    For PostgreSQL DATABASE_HOST should not be changed from localhost.
    To use remote tcp/ip connections with PostgreSQL:
     - Edit pg_hba.conf (PostgreSQL config file) to allow tcp/ip connections
     - Start PostgreSQL postmaster with -i option
     - Change DATABASE_HOST as required
  */


//----------------------------------------------------------------------------------------------

//FILE UPLOADS

  //upload to what directory ?
  define('FILE_BASE', "/var/www/html/webcollab/files/filebase" );

  //max uploaded file size in bytes (2 Mb is the default)
  define('FILE_MAXSIZE', 2000000 );

  //number of file upload boxes to show
  define('NUM_FILE_UPLOADS', 3 );

  /*Note:
    1. Make sure the file_base directory exists, and is writeable by the webserver, or you
       won't be able to upload any files.
    2. The filebase directory should be outside your webserver root directory to maintain file
       security.  This is important to prevent users navigating to the file directory with
       their web browsers, and viewing all the files.  (The default location given is NOT outside
       the webserver root, but it makes first-time setup easier).
    3. The FILE_BASE is the full path to the operating system root, not the webserver root directory.
    4. PHP and Apache settings will overide the maximum file size set here.

  */


//----------------------------------------------------------------------------------------------

//LANGUAGE

  /* available locales are 
          'en'    (English)
          'bg'    (Bulgarian)
          'ca'    (Catalan)
          'cs'    (Czech)
          'da'    (Danish)
          'de'    (German)
          'eo'    (Esperanto)
          'es'    (Spanish)
          'fr'    (French)
          'gr'    (Greek)
          'hu'    (Hungarian)
          'it'    (Italian)
          'ja'    (Japanese)
          'ko'    (Korean)
          'no'    (Norwegian)
          'nl'    (Dutch)
          'pt-br' (Brazilian Portuguese)
          'ru'    (Russian)
          'se'    (Swedish)
          'sk'    (Slovakian)
          'sl'    (Slovenian)
          'sr-la' (Serbian (Latin))      'sr-cy' (Serbian (cyrillic))
          'tr'    (Turkish)
          'zh-tw' (Traditional Chinese)  'zh-hk' (Simplified Chinese)
  */

  define('LOCALE', "en" );


//----------------------------------------------------------------------------------------------

//TIMEZONE
  //timezone offset from GMT/UTC (hours)
  define('TZ', 0 );


//----------------------------------------------------------------------------------------------

//EMAIL CONFIGURATION

  //enable email to send messages? (Values are "Y" or "N").
  //  default is "Y".
  define('USE_EMAIL', "Y" );

      //location of SMTP server (ip address or FQDN)
      define('SMTP_HOST', "localhost" );

      //mail transport (leave as SMTP for standard WebCollab)
      define('MAIL_TRANSPORT', "SMTP" );

      //SMTP port (leave as 25 for ordinary mailservers)
      define('SMTP_PORT', 25 );

      //use smtp auth? ('Y' or 'N')
      define('SMTP_AUTH', "N" );
        //if using SMTP_AUTH give username & password
        define('MAIL_USER', "" );
        define('MAIL_PASSWORD', "" );
        //use TLS encryption? (requires PHP 5.1+)
        define('TLS', 'N' );


//----------------------------------------------------------------------------------------------
// Less important items below this line

//MINOR CONFIG PARAMETERS

  //Style sheets (CSS) Note: Setup always uses 'default.css' stylesheet for CSS_MAIN. (Place your CSS into /css directory)
  define('CSS_MAIN', 'default.css' );
  define('CSS_CALENDAR', 'calendar.css' );
  define('CSS_PRINT', 'print.css' );

  //If an error occurs, who do you want the error to be mailed to ?
  define('EMAIL_ERROR', "" );

  //session timeout in hours
  define('SESSION_TIMEOUT', 1 );

  //number of days that new or updated tasks should be highlighted as 'New' or 'Updated'
  define('NEW_TIME', 14 );

  //custom image to replace the webcollab banner on splash page (base directory is /images)
  define('SITE_IMG', "" );

  //show full debugging messages on the screen when errors occur (values are "N", or "Y")
  define('DEBUG', "N" );

  //Don't show full error message on the screen - just a 'sorry, try again' message (values are "N", or "Y")
  define('NO_ERROR', "N" );

  //Use external webserver authorisation to login (values are "N", or "Y")
  define('WEB_AUTH', "N" );

  //Use to set a prefix to the database table names (Note: Table names in /db directory will need be manually changed to match) 
  define('PRE', "" );

  //version info
  define('WEBCOLLAB_VERSION', "2.00-beta" );
  define('UNICODE_VERSION', "N" );

?>
