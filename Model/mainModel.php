<?php

class mainModel {
	/**
	 * @var string database Name
	 */
	private $database;

	/**
	 * @return mixed
	 */
	public function getDatabase () {
		return $this->database;
	}

	/**
	 * @param mixed $database
	 */
	public function setDatabase ($database) {
		$this->database = $database;
	}

	public function setConnection () {

		if (!isset($settings['database'])) {
			debugMessage('Model ', null, 'No Config setting', false);

		}
	}


}