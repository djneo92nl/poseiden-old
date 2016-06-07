<?php
namespace Poseiden\Core\Service\Database;

use Poseiden\Core\lib;
use Poseiden\Core\Service;

/**
 * Class main
 * @package djneo\poseiden
 */
class OrmLoader{
	public $settings;

	/**
	 * @return \PDO
	 */
	private function createConnection() {
		try {
			\ORM::configure('mysql:host=localhost;dbname=poseiden');
			\ORM::configure('username', $this->settings['Poseiden']['Database']['Username']);
			\ORM::configure('password', $this->settings['Poseiden']['Database']['Password']);

			return \ORM::get_db();
		}
		catch ( \PDOException $Exception ){
			lib\debug::debugMessage('db', "", $Exception->getMessage(), false);
		}
	}

	/**
	 * @return \PDO
	 */
	public function __construct() {
		$this->settings =lib\DILib::get('set');
			return $this->createConnection();
	}
}