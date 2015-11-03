<?php

namespace djneo\poseiden;

use Colors\Color;

class main {

	//Settings storage var
	public $settings  = array();


	public function __construct(){
		$this->settings= \parse_ini_file(ROOTPATH . '/lib/config.ini');

		$c = new Color();
		echo $c('Hello World!')->green();

	}

}