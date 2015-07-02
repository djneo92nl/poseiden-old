<?php

namespace djneo\poseiden;

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


	public function insert () {

	}
	
}