<?php

class jsonReturnLib {

	public function output ($content) {
		$output = array();
		debugMessage('json  ', 'Json called');
		$output['JSON'] = json_encode($content, JSON_PRETTY_PRINT);
		echo '<pre>';
		echo $output['JSON'];
		echo '</pre>';
	}
}