<?php
namespace Poseiden\Core\lib;

use Poseiden\Core\Bootstrap\Cache;
use Poseiden\Core\Model;
use Poseiden\Core\Service;
use Poseiden\Core\Service\Database\OrmLoader;

/**
 * Class main bootstrapping functions
 * @package djneo\poseiden
 */
class main {

	/**
	 * @var array
	 */
	protected $settings = array();

	/**
	 * main constructor.
	 */
	public function __construct() {

		$this->generateSettings();

		$calledController = "Poseiden\Core\Controller\\".$this->settings['route']->route['requestedController'];
		$calledAction = $this->settings['route']->route['requestedAction'];
		if (class_exists($calledController)) {
			$usedController = new $calledController();
			if (method_exists($usedController, $calledAction)) {
				call_user_func_array(array($usedController, $calledAction), array(''));
			} else {
				$this->returnError('404');
			}
		} else {
			$this->returnError('404');
		}
	}

	public function returnError ($code) {
		header('Content-Type: application/json');
		header('Content-Type: application/json');
		header('X-Poseiden:'. POSEIDEN_VER);
		echo json_encode(['state' => 'error',
			'error' => $code,
			'message' => 'Page not found'
		], JSON_PRETTY_PRINT);
	}

	public function generateSettings () {
		//build cache
		$nn = new Cache\configurationParser();
		$nn->create();

		$this->settings = $nn->read();
		$this->settings['route'] = new Service\Routing\RoutingService();

		DILib::set('set',$nn->read() );
		//Load Database
		DILib::set('orm', new OrmLoader());

		if (php_sapi_name() == 'cli') {
			$this->settings['mode'] = 'cli';
		} else {
			if (strtolower($this->settings['route']->getRequestHeader('X-Requested-With')) == 'xmlhttprequest') {
				$this->settings['mode'] = 'json';
			} else {
				$this->settings['mode'] = 'html';
				header('Location: Debug/index.html');
			}
		}

	}
}
