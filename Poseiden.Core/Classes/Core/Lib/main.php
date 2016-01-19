<?php
namespace Poseiden\Core\lib;

use Colors\Color;

/**
 * Class main
 * @package djneo\poseiden
 */
class main {

	/**
	 * @var array
	 */
	public $settings = array();


	/**
	 * main constructor.
	 */
	public function __construct() {
		$this->settings = \parse_ini_file(CONFIGFOLDER . 'config.ini');

		$c = new Color();
		echo $c('Hello World!')->green();

	}

}
