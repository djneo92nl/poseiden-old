<?php
namespace Poseiden\Core;


//Define Main Variables
define('ROOTPATH', __DIR__);
define('DEVELOPMENT', TRUE);

require_once (ROOTPATH . '/vendor/autoload.php');

$app = new main();
