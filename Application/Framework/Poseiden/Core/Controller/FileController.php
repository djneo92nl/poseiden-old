<?php
namespace Poseiden\Core\Controller;
/**
* Handles Creating Files and Reading Files
*/


class FileController {

	private $folderName;

	/**
	 * @return mixed
	 */
	public function getFolderName() {
		return $this->folderName;
	}

	/**
	 * @param mixed $folderName
	 */
	public function setFolderName($folderName) {
		$this->folderName = $folderName;
	}

	/*
    * Returns an array with file information
    * @param bool $fast if set to false returns a detailed list of files
    * @Returns Array
    */
	public function listFiles($fast = TRUE) {
		$return = array();

		if ($fast) {
			$return = scandir($this->folderName);
		}

	}
}
