<?php

class mainModel {
	/**
	 * @var string database Name
	 */
	private $database;

	private $dboHandler;

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
		$this->dboHandler = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', $this->settings['database']['username'], 'password');
		$this->dboHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->dboHandler->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}

	public function getData() {
		$stmt = $this->dboHandler->query("SELECT * FROM" . $this->database);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}