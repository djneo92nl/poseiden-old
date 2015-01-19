<?php

class mainController {

	function __construct () {
		$this->json = new jsonReturnLib();

		if (isset($this->usedModels)) {
			// load models
			foreach ($this->usedModels as $model):
				$modelasmodel = $model . 'Model';
				$this->$model = new $modelasmodel;
			endforeach;
		}
	}
}