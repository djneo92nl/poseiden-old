<?php
namespace Poseiden\Core\lib;

function router() {
	//Starting Controller
	$startingCon = 'homeController';
	//Starting action
	$startingAction = 'index';

	return array('Controller' => $startingCon, 'Action' => $startingAction);

}
