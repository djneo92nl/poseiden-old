<?php
namespace Poseiden\Core\lib;

use Poseiden\Core\Bootstrap\Database\OrmLoader;
use Poseiden\Core\Service;
use Poseiden\Core\Model;
use Poseiden\Core\Bootstrap\Cache;

/**
 * Class main
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
		//build cache
		$nn = new Cache\configurationParser();
		$nn->create();

		$this->settings = $nn->read();
		$this->settings['route'] = new Service\Routing\RoutingService();

		DILib::set('set',$nn->read() );
		//Load Database
		DILib::set('orm',new ormLoader());

		if (php_sapi_name() == 'cli') {
			$this->settings['mode'] = 'cli';
		} else {
			if (strtolower($this->settings['route']->getRequestHeader('X-Requested-With')) == 'xmlhttprequest') {
				$this->settings['mode'] = 'json';
			} else {
				$this->settings['mode'] = 'html';
				header('Location: Web/index.html');
			}
		}

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
		header('X-Poseiden: 0.0.1');
		echo json_encode(['state' => 'error',
			'error' => $code,
			'message' => 'Page not found'
		], JSON_PRETTY_PRINT);
	}
}
