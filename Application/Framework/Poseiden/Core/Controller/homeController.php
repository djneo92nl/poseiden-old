<?php
namespace Poseiden\Core\Controller;

class homeController extends mainController {



	public function indexAction() {
		$this->jsonReturn(array('test'));
	}
}
