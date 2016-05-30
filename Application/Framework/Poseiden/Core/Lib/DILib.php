<?php
namespace Poseiden\Core\lib;

class DILib {
	 protected static $values = array();

	public static function set ($key, $value) {
		self::$values[$key] = $value;
	}

	public static function get ($key) {
		if (!isset(self::$values[$key])) throw new \InvalidArgumentException(sprintf("Value %s has not been set", $key));

		$value = self::$values[$key];

		if (is_callable($value)) {
			return $value();
		}

		else {
			return $value;
		}
	}
}