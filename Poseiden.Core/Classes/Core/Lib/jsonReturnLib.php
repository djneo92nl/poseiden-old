<?php
namespace Poseiden\Core\lib;

class jsonReturnLib {

	public function output($content) {
		$output = array();
		main::debugMessage('json  ', 'Json called');
		$output['JSON'] = json_encode($content, JSON_PRETTY_PRINT);
		echo '<pre>';
		echo $output['JSON'];
		echo '</pre>';
	}
}
