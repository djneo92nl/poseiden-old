<?php
/**
 * Poseiden.
 * @author: remkojanse
 * @date  : 25 -  09 - 2015
 *
 */

namespace djneo\poseiden;


/**
 * Class debug
 * @package djneo\poseiden
 */
class debug {
	/**
	 * @param        $line
	 * @param string $file filename to append to
	 */
	public static function appendLineToFile ($line, $file) {
		$file = 'debug'; //Overide in debug state
		file_put_contents(ROOTPATH . '/' . $file . '.txt', $line . "\r\n", FILE_APPEND);
	}
}