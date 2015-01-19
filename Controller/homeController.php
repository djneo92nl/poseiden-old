<?php

class homeController extends mainController {
	public $usedModels = ['main'];

	function index(){

		$nianda = array_fill(1,40,1);
		//$this->json->output($nianda);
		d($this);
		$this->main->setConnection();
	}
}