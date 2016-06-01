<?php
namespace Poseiden\Core\Service\Keyval;

interface KeyValueInterface {
	public function writeKey($key);
	public function getKey($key, $value);
	public function getUserKey($key);
	public function writeUserKey($key, $value);
}
