<?php
namespace Poseiden\Core\Service;
/**
* Handles Creating Files and Reading Files
*/


class fileService {

	private $folderName;

	public $files;

	/**
	 * @return mixed
	 */
	public function getFolders () {
		return $this->folders;
	}

	/**
	 * @return mixed
	 */
	public function getFiles () {
		return $this->files;
	}

	public $folders;

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
		$this->scanAll();
	}

	public function __construct ($folder = null) {
		if (!is_null($folder)){
			$this->setFolderName($folder);
		}
	}


	/*
    * Returns an array with file information
    * @param bool $fast if set to false returns a detailed list of files
    * @Returns Array
    */
	public function scanAll($fast = TRUE) {
		$scan = array();
		if ($fast) {
			$scan = scandir($this->folderName);
		}

		$return = array();
		foreach($scan as $file)
		{
			if (!is_dir("$this->folderName/$file"))
			{
				$this->files[] = $file;
			} else {
				$this->folders[] = $file;

			}
		}

		return $return;
	}

	
}
