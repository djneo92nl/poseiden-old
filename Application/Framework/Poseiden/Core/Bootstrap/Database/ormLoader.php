<?php
namespace Poseiden\Core\Bootstrap\Database;

use Poseiden\Core\lib;
use Poseiden\Core\Service;

/**
 * Class main
 * @package djneo\poseiden
 */
class ConfigurationParser extends lib\main{

	private function createConnection() {
		\ORM::configure('mysql:host=localhost;dbname=my_database');
		\ORM::configure('username', $this->settings['Poseiden']['Database']['Username']);
		\ORM::configure('password', $this->settings['Poseiden']['Database']['Password']);

		$this->settings['Poseiden']['Database']['Handler'] = $db = \ORM::get_db();
	}

}