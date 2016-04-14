<?php
namespace Poseiden\Core\lib;


/**
 * Class debug
 * @package djneo\poseiden
 */
class debug {
	/**
	 * Writes a debug message and sends it to the appendLineToFile function
	 *
	 * @param string $MessageSucces
	 * @param string $MessageFail
	 * @param bool $state
	 * @param string $source
	 */
	public static function debugMessage($source, $MessageSucces, $MessageFail = null, $state = TRUE) {
		if (!$state) {
			debug::appendLineToFile(date("H:i:s d-m-Y").'   '.$source.'   Critical    : '.$MessageFail, 'error');
		} elseif ($state) {
			debug::appendLineToFile(date("H:i:s d-m-Y").'   '.$source.'   Info        : '.$MessageSucces, 'debug');
		}
	}


	/**
	 * @param        string $line
	 */
	public static function appendLineToFile($line) {
		$file = 'debug'; //Overide in debug state
		file_put_contents($file.'.txt', $line."\r\n", FILE_APPEND);
	}
}
