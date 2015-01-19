<?php

/**
 * Writes a debug message and sends it to the appendLineToFile function
 *
 * @param string $MessageSucces
 * @param string $MessageFail
 * @param bool $state
 */
function debugMessage ($source, $MessageSucces, $MessageFail = null, $state = TRUE) {
	if (!$state) {
		appendLineToFile(date("H:i:s d-m-Y") . '   ' . $source . '   Critical    : ' . $MessageFail, 'error');
	} elseif ($state) {
		appendLineToFile(date("H:i:s d-m-Y") . '   ' . $source . '   Info        : ' . $MessageSucces, 'debug');
	}
}

/**
 *
 * @param $line
 * @param string $file filename to append to
 */
function appendLineToFile ($line, $file) {
	$file = 'debug'; //Overide in debug state
	file_put_contents(ROOTPATH . '/' . $file . '.txt', $line . "\r\n", FILE_APPEND);
}