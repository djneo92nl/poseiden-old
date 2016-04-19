<?php
namespace Poseiden\Core\Controller;


class mainController extends \Poseiden\Core\lib\Main {
	private $usedModels;


	public function __construct() {

	}

	public function jsonReturn(array $content) {
		header('Content-Type: application/json');
		header('X-Poseiden: 0.0.1');
		echo json_encode($content);
	}
}
