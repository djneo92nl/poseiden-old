<?php
namespace Poseiden\Core\Controller;


use Poseiden\Core\lib\jsonReturnLib;


class mainController extends \Poseiden\Core\lib\Main {
	private $usedModels;


	public function __construct() {

	}

	public function jsonReturn(array $content) {

		$output = new jsonReturnLib();
		$output->output($content);
	}
}
