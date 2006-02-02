<?php
/*
  $Id$


*/

  //character set
  define('CHARACTER_SET', "ISO-8859-1" );

  //MySQL database character set (Null entry of "" uses the system default)
  define('DATABASE_CHARACTER_SET', "" );

  //Style sheet (CSS) (Place your CSS into /css directory)
  define('SETUP_CSS', 'default.css' );

  //version info
  define('SETUP_WEBCOLLAB_VERSION', "2.00-beta" );
  define('SETUP_UNICODE_VERSION', "N" );


/*

LANGUAGE ENCODING OPTIONS

- English, Brazilian Portuguese, Catalan, Danish, French, German, Italian, Spanish, Swedish

  define('CHARACTER_SET', "ISO-8859-1" );
  define('DATABASE_CHARACTER_SET', "ISO-8859-1" );

- Czech, Hungarian, Serbian, Slovak

  define('CHARACTER_SET', "ISO-8859-2" );
  define('DATABASE_CHARACTER_SET', "ISO-8859-2" );

- Turkish

  define('CHARACTER_SET', "ISO-8859-9" );
  define('DATABASE_CHARACTER_SET', "latin5" );

  (ISO-8859-9 === latin5 in MySQL)

- Greek

  define('CHARACTER_SET', "ISO-8859-7" );
  define('DATABASE_CHARACTER_SET', "greek" );

- Bulgarian

  define('CHARACTER_SET', "WINDOWS-1251" );
  define('DATABASE_CHARACTER_SET', "cp1251" );

- Russian

  define('CHARACTER_SET', "KOI8-R" );
  define('DATABASE_CHARACTER_SET', "koi8r" );

*/

?>
