<?php
error_reporting ( E_ALL );
define ( 'BASE_PATH', dirname ( realpath ( __FILE__ ) ) . '/' );

require 'config/config.php';
// load other libs
require 'libs/upload.class.php';
require 'libs/class.phpmailer.php';

// Fire Base
require 'libs/firebase.php';
require 'libs/push.php';

require 'libs/NotificationObject.php';
require 'libs/BoothObject.php';

// Library
require 'libs/MysqliDb.php';
require 'libs/Database.php';
require 'libs/Zebra_Pagination.php';
require 'libs/Session.php';

// Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Help.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

$app = new Bootstrap ();