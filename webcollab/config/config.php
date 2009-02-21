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
          'pl'    (Polish)
          'pt'    (Portuguese)
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

      //mail transport (SMTP for standard mailserver, or PHPMAIL for PHP mail() )
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

//-- These items need to be edited directly from this file --

//STYLE AND APPEARANCE

  //Style sheets (CSS) Note: Setup always uses 'default.css' stylesheet for CSS_MAIN. (Place your CSS into /css directory)
  define('CSS_MAIN', 'default.css' );
  define('CSS_CALENDAR', 'calendar.css' );
  define('CSS_PRINT', 'print.css' );

  //custom image to replace the webcollab banner on splash page (base directory is [webcollab]/images)
  define('SITE_IMG', "" );

  //number of days that new or updated tasks should be highlighted as 'New' or 'Updated'
  define('NEW_TIME', 14 );

//CALENDAR CONTROLS

  //Start day of week on calendar (Sun = 0, Mon = 1, Tue = 2, Wed = 3, etc) 
  define('START_DAY', 0 );

  //Use VEVENT for iCalendar instead of VTODO - works for Google Calendar and others (values are "N", or "Y")
  define('VEVENT', "N");

//RSS

  //enable autodiscovery of rss feeds by web browser
  define('RSS_AUTODISCOVERY', 'N' );

//LOGIN CONTROLS

  //session timeout in hours
  define('SESSION_TIMEOUT', 1 );

  //Use external webserver authorisation to login (values are "N", or "Y")
  define('WEB_AUTH', "N" );

  //Show passwords in user edit screens as plain text or hidden ('****') (values are "text", or "password")
  define('PASS_STYLE', "text" );

  //Stop GUEST users from changing their login details or posting in the forums (values are "N", or "Y")
  define('GUEST_LOCKED', "N" );

//ERROR DEBUGGER

  //If an error occurs, who do you want the error to be mailed to ?
  define('EMAIL_ERROR', "" );

  //show full debugging messages on the screen when errors occur (values are "N", or "Y")
  define('DEBUG', "N" );

  //Don't show full error message on the screen - just a 'sorry, try again' message (values are "N", or "Y")
  define('NO_ERROR', "N" );

//DATABASE

  //Use to set a prefix to the database table names (Note: Table names in /db directory will need be manually changed to match) 
  define('PRE', "" );

//WEBCOLLAB VERSION

  //version info
  define('WEBCOLLAB_VERSION', "2.40" );
  define('UNICODE_VERSION', "N" );

?>
