<?php
namespace Poseiden\Core\lib;

class jsonReturnLib {

	public function output($content) {
		header('Content-Type: application/json');
		header('X-Poseiden: 0.0.1');
		$output = array();
		$output['JSON'] = json_encode($content, JSON_PRETTY_PRINT);
		echo $output['JSON'];
	}
}
