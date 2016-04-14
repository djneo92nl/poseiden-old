<?php
namespace Poseiden\Core\Controller;

class mainController {
	private $usedModels;


	public function __construct() {

		if (isset($this->usedModels)) {
			// load models
			foreach ($this->usedModels as $model):
				$modelasmodel = $model.'Model';
				$this->$model = new $modelasmodel;
			endforeach;
		}
	}
}
