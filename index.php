<?php
use djneo\poseiden\main;

//Define Main Variables
define('ROOTPATH', __DIR__);
define('DEVELOPMENT', TRUE);


//Include main
include_once (ROOTPATH . '/lib/main.php');
//Include the router
include_once (ROOTPATH . '/lib/router.php');
require_once (ROOTPATH . '/vendor/autoload.php');

$app = new main;