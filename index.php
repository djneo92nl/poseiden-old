<?php
namespace Poseiden\Core;
use Poseiden\Core\Lib;

//Define Main Variables
define('ROOTPATH', __DIR__);
define('CONFIGFOLDER', ROOTPATH . '/config/');
define('DEVELOPMENT', TRUE);

require_once (ROOTPATH . '/vendor/autoload.php');

$app = new Lib\main();
