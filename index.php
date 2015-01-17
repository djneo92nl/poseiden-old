<?php

//Define Main Variables
define('ROOTPATH', __DIR__);
define('DEVELOPMENT', TRUE);

//Include main
include_once(ROOTPATH . '/lib/main.php');
//Include the router
include_once(ROOTPATH . '/lib/router.php');

//Require Kint
if (DEVOLOPMENT) {
	require ROOTPATH . '/kint/Kint.class.php';
}

$jsonOutput = new jsonReturnLib();
$this['Paths'] = router();

$activeController = new $this['Paths']['Controller']();
$activeAction = $activeController->$this['Paths']['Action']();