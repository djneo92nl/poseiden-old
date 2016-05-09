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

		$usedController = new homeController();
		call_user_func_array(array($usedController, 'weatherAction'), array(''));
	}

}
