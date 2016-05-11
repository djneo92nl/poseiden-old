<?php
namespace Poseiden\Core\lib;

class jsonReturnLib {

	private $buffer = array();

	/**
	 * @return mixed
	 */
	public function getBuffer()
	{
		return $this->buffer;
	}

	/**
	 * @param mixed $buffer
	 */
	public function addToBuffer($buffer)
	{
		$this->buffer[] = $buffer;
	}




	public function output($content = null) {
		header('Content-Type: application/json');
		header('X-Poseiden: 0.0.1');

		if ($content === null) {
			$content = $this->buffer;
		}
		$output = array();
		$output['JSON'] = json_encode($content, JSON_PRETTY_PRINT);
		echo $output['JSON'];
	}
}
