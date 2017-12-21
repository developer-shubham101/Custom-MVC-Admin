<?php
define ( 'DB_TYPE', 'mysql' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'mvc_backend' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );
 
  $site_location = $_SERVER['REQUEST_SCHEME'] . "://". $_SERVER['HTTP_HOST'] . str_replace("index.php", "", $_SERVER['PHP_SELF']);

define ( 'URL', $site_location );