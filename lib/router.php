<?php
/**
 * Created by PhpStorm.
 * User: Remko
 * Date: 8-12-2014
 * Time: 21:45
 */

/** PHP autoloader
 *
 * @param $className
 */
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
	if (!$loaded) {
		//File not loaded, Write to error log
		file_put_contents(ROOTPATH . '/error.txt', "[" . date("H:i:s Y-m-d") . "]  Failed to load " . $className . "\r\n", FILE_APPEND);
	}
	if ($loaded) {
		//File not loaded, Write to error log
		file_put_contents(ROOTPATH . '/debug.txt', "[" . date("H:i:s Y-m-d") . "]  Successfully loaded " . $className . "\r\n", FILE_APPEND);
	}

}

function router() {
	//Starting Controller
	$startingCon = 'homeController';
	//Starting action
	$startingAction = 'index';


	return array('Controller' => $startingCon, 'Action' => $startingAction);
}