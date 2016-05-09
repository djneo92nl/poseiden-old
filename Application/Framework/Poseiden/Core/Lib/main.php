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

		//$this->settings = 'hay';
		$usedController = new homeController();

		//call_user_func_array(array($usedController, 'weatherAction'), array(''));
				$files = new Service\fileService($_SERVER['DOCUMENT_ROOT'].'/demo/');

		var_dump($files->getFiles());
		var_dump($files->getFolders());
	}

}
