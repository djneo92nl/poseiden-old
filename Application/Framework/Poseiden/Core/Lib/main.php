<?php
namespace Poseiden\Core\lib;

use Poseiden\Core\Controller\homeController;
use Poseiden\Core\Bootstrap\Cache;
use Poseiden\Core\Service;

/**
 * Class main
 * @package djneo\poseiden
 */
class main {

	/**
	 * @var array
	 */
	public $settings = array();


	/**
	 * main constructor.
	 */
	public function __construct() {
		//build cache
		$nn = new Cache\ConfigurationParser();
		$nn->create();
		if (php_sapi_name() == 'cli') {
			$this->settings['mode'] = 'cli';
		} else {
			// Not in cli-mode
			$request = $_SERVER["HTTP_ACCEPT"];
			if(strpos($request, 'application/json') != false) {
				$this->settings['mode'] = 'json';
			}
			else{
				$this->settings['mode'] = 'html';
				//header('Location: Web/index.html');
			}
		}

		$usedController = new homeController();
		call_user_func_array(array($usedController, 'weatherAction'), array(''));
	}

}
