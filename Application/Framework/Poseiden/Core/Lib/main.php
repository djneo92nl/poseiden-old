<?php
namespace Poseiden\Core\lib;

use Poseiden\Core\Controller\homeController;
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

		$this->settings = 'hay';
		$usedController = new homeController();

		call_user_func_array(array($usedController, 'weatherAction'), array(''));

	}

}
