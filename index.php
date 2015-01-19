<?php

//Define Main Variables
define('ROOTPATH', __DIR__);
define('DEVELOPMENT', TRUE);

//Include main
include_once(ROOTPATH . '/lib/main.php');
//Include the router
include_once(ROOTPATH . '/lib/router.php');
//Include settings
include_once(ROOTPATH . '/lib/config.local.php');

//Require Kint
if (DEVELOPMENT) {
	require ROOTPATH . '/vendor/raveren/kint/Kint.class.php';
}

$this['Paths'] = router();

$activeController = new $this['Paths']['Controller']();
$activeAction = $activeController->$this['Paths']['Action']();