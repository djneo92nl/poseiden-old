<?php
namespace Poseiden\Core\Service\Routing;

use Poseiden\Core\lib;

class RoutingService {

	private $routerClass;

	public $route = [''];

	public $requestmethod;

	public $requestheaders;


	function __construct () {
		$this->routerClass = new \Bramus\Router\Router();

		$this->requestmethod = $this->routerClass->getRequestMethod();
		$this->requestheaders = $this->routerClass->getRequestHeaders();
		switch ($this->requestmethod) {
			case "POST":
				break;
			case "GET":
				$this->routerClass->get('/(.*)',function($url){
					$this->parseRoute($url);
				});
				break;
			case "DELETE":
				break;
			default:
				echo 'l;';

				break;
		}

		$this->routerClass->run();
	}


	/**
	 * @param $header
	 *
	 * @return bool
	 */
	public function getRequestHeader($header) {
		if (isset($this->requestheaders[$header])) {
			return $this->requestheaders[$header];
		}
		return false;
	}


	public function parseRoute($url) {
		$parsedUrl = explode('/',urldecode($url));
		if (is_null($parsedUrl[0])){
			$this->route['requestedController'] = 'homeController';
		}
		else {
			$this->route['requestedController'] = strtolower($parsedUrl[0]).'Controller';
		}

		if (!isset($parsedUrl[1])){
			$this->route['requestedAction'] = 'indexAction';
		}
		else {
			$this->route['requestedAction'] = strtolower($parsedUrl[1]).'Action';
		}

	}



}