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

	public function __construct() {
		//Include settings
		include_once(ROOTPATH . '/lib/config.local.php');
		$this->settings = $settings;
	}

	public function setConnection () {

		if (!isset($this->settings['database'])) {
			debugMessage('Model ', null, 'No Config setting', false);

		}
	}


}