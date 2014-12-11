<?php
/**
 * Created by PhpStorm.
 * User: Remko
 * Date: 8-12-2014
 * Time: 21:13
 */
//Define Main Variables
define('ROOTPATH', __DIR__);
//Include main
include_once (ROOTPATH.'/lib/router.php');
require ROOTPATH.'/kint/Kint.class.php';

$jsonOutput = new jsonReturnLib();

$this['Paths'] = router();

kint::dump($this);

$activeController = new $this['Paths']['Controller']();