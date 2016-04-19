<?php
namespace Poseiden\Core\lib;

/** Poseiden Core dbo engine
 *
 * @author remco janse remko@djneo.nl
 * @version 0.1.$Id$
 */

class pdoLib extends main {

	private $dboHandler;

	public function __construct() {
	}

	public function setConnection() {
		if (!isset($this->settings['database'])) {
			debug::debugMessage('Model ', NULL, 'No Config settings', FALSE);
		}

		try {
			$this->dboHandler = new PDO('mysql:host='.$this->settings['database']['host'].';dbname='.$this->settings['database'].';'.'charset=utf8', $this->settings['database']['username'], $this->settings['database']['password']);
			$this->dboHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->dboHandler->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		} catch (\PDOException $e) {
			debugMessage('ModelPDO', NULL, $e->getMessage(), FALSE);
		}
	}

	public function getData() {
		$stmt = $this->dboHandler->query("SELECT * FROM".$this->database);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


}
