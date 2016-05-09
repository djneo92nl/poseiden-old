<?php
namespace Poseiden\Core\lib;

/**
 * Class httpRequest
 * @package djneo\poseiden
 */
class httpRequest {

	protected $sourceURI;

	protected $status;

	protected $result;

	/**
	 * @return mixed
	 */
	public function getSourceURI () {
		return $this->sourceURI;
	}

	/**
	 * @param mixed $sourceURI
	 */
	public function setSourceURI ($sourceURI) {
		$this->sourceURI = $sourceURI;
	}

	/**
	 * @return mixed
	 */
	public function getStatus () {
		return $this->status;
	}

	/**
	 * @param mixed $status
	 */
	public function setStatus ($status) {
		$this->status = $status;
	}

	/**
	 * @return mixed
	 */
	public function getResult () {
		return $this->result;
	}

	/**
	 * @param mixed $result
	 */
	public function setResult($result) {
		$this->result = $result;
	}






	public function __construct() {

	}



}