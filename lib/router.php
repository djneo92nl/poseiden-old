<?php

/** PHP autoloader
 *
 * @param $className
 */
function __autoload ($className) {
	//TODO: Rewrite this piece of s**t
	$loaded = false;
	if (strpos($className, 'Lib') != false) {
		if (file_exists(ROOTPATH . '/lib/' . $className . '.php')) {
			include ROOTPATH . '/lib/' . $className . '.php';
			$loaded = true;
		}
	}
	if (strpos($className, 'Controller') != false) {
		if (file_exists(ROOTPATH . '/Controller/' . $className . '.php')) {
			include ROOTPATH . '/Controller/' . $className . '.php';
			$loaded = true;
		}
	}
	if (strpos($className, 'View') !== false) {
		if (file_exists(ROOTPATH . '/View/' . $className . '.php')) {
			include ROOTPATH . '/View/' . $className . '.php';
			$loaded = true;
		}

	}
	if (strpos($className, 'Model') !== false) {
		if (file_exists(ROOTPATH . '/Model/' . $className . '.php')) {
			include ROOTPATH . '/Model/' . $className . '.php';
			$loaded = true;
		}

	}
	debugMessage('Router', 'Successfully loaded ' . $className, 'Failed to load ' . $className, $loaded);

}

function router () {
	//Starting Controller
	$startingCon = 'homeController';
	//Starting action
	$startingAction = 'index';

	return array('Controller' => $startingCon, 'Action' => $startingAction);

}