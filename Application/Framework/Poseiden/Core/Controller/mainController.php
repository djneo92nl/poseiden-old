<?php
namespace Poseiden\Core\Controller;

use Poseiden\Core\lib\jsonReturnLib;

class mainController extends \Poseiden\Core\lib\Main {

	public $factory;

	public $output;

	public function __construct($usedModel = null) {
		if (isset($usedModel)){
			$this->factory = $this->createFactory($usedModel);
		}

		$this->output = new jsonReturnLib();

	}

	public function createFactory($className) {
		return \Model::factory("Poseiden\Core\Model\\".$className);
	}


	public function jsonReturn(array $content) {

		$this->output->output($content);
	}
}
