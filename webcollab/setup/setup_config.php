<?php
/*
  $Id$


*/

  //character set
  define('SETUP_CHARACTER_SET', "ISO-8859-1" );

  //MySQL database character set (Null entry of "" uses the system default)
  define('MYSQL_SETUP_CHARACTER_SET', "utf8" );

  //PostgreSQL database character set (Null entry of "" uses the system default)
  define('PGSQL_SETUP_CHARACTER_SET', "UTF8" );

  //Style sheet (CSS) (Place your CSS into /css directory)
  define('SETUP_CSS', 'default.css' );

  //version info
  define('SETUP_WEBCOLLAB_VERSION', "2.01" );
  define('SETUP_UNICODE_VERSION', "N" );


/*

LANGUAGE ENCODING OPTIONS

- All languages (recommended)

  define('SETUP_CHARACTER_SET', [as given below, eg: "ISO-8859-1"] );
  define('MYSQL_SETUP_CHARACTER_SET', "utf8" );
  define('MYSQL_SETUP_CHARACTER_SET', "UTF8" );

  With this option the SQL server uses UTF-8, while the web interface uses the given character set (eg: ISO-8859-1).
  The MySQL/PGSQL connection client will convert to and from the given character set during input and output. WebCollab
  automatically sets the required character set in the MySQL/PGSQL connection client.


- English, Brazilian Portuguese, Catalan, Danish, French, German, Italian, Spanish, Swedish

  define('SETUP_SETUP_CHARACTER_SET', "ISO-8859-1" );

  define('MYSQL_SETUP_CHARACTER_SET', "ISO-8859-1" );
  define('PGSQL_SETUP_CHARACTER_SET', "LATIN1" );

- Czech, Hungarian, Serbian (latin), Slovak

  define('SETUP_CHARACTER_SET', "ISO-8859-2" );

  define('MYSQL_SETUP_CHARACTER_SET', "ISO-8859-2" );
  define('PGSQL_SETUP_CHARACTER_SET', "LATIN2" );

- Turkish

  define('SETUP_CHARACTER_SET', "ISO-8859-9" );

  define('MYSQL_SETUP_CHARACTER_SET', "latin5" );
  define('PGSQL_SETUP_CHARACTER_SET', "LATIN5" );

  (This is not a mistake: 'ISO-8859-9' is 'latin5'/'LATIN5' in MySQL/PostgreSQL)

- Greek

  define('SETUP_CHARACTER_SET', "ISO-8859-7" );

  define('MYSQL_SETUP_CHARACTER_SET', "greek" );
  define('PGSQL_SETUP_CHARACTER_SET', "ISO_8859_7" );

- Bulgarian, Serbian (cyrillic)

  define('SETUP_CHARACTER_SET', "WINDOWS-1251" );

  define('MYSQL_SETUP_CHARACTER_SET', "cp1251" );
  define('PGSQL_SETUP_CHARACTER_SET', "WIN1251" );

- Russian

  define('SETUP_CHARACTER_SET', "KOI8-R" );

  define('MYSQL_SETUP_CHARACTER_SET', "koi8r" );
  define('PGSQL_SETUP_CHARACTER_SET', "KO18" );

*/

?>
