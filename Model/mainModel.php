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
		if (!in_array('config.local.php',get_included_files())) {
			debugMessage('Model ',null,'No Config setting',false);
		}
	}


}