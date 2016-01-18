<?php
namespace Poseiden\Core\lib;

class jsonReturnLib {

	public function output($content) {
		$output = array();
		$output['JSON'] = json_encode($content, JSON_PRETTY_PRINT);
		echo '<pre>';
		echo $output['JSON'];
		echo '</pre>';
	}
}
