<?php

class homeController extends mainController {
	function index(){

		$nianda = array_fill(1,40,1);
		$this->json->output($nianda);

	}
}