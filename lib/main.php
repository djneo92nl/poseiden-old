<?php

namespace djneo\poseiden;

class main {

	//Settings storage var
	public $settings  = array();


	/**
	 * Writes a debug message and sends it to the appendLineToFile function
	 *
	 * @param string $MessageSucces
	 * @param string $MessageFail
	 * @param bool $state
	 */
	static function debugMessage ($source, $MessageSucces, $MessageFail = null, $state = TRUE) {
		if (!$state) {
			debug::appendLineToFile(date("H:i:s d-m-Y") . '   ' . $source . '   Critical    : ' . $MessageFail, 'error');
		} elseif ($state) {
			debug::appendLineToFile(date("H:i:s d-m-Y") . '   ' . $source . '   Info        : ' . $MessageSucces, 'debug');
		}
	}

}