<?php
namespace Poseiden\Core\Model;

use Cmfcmf\OpenWeatherMap;
use Poseiden\Core\lib;

class weatherModel {

	// Language of data (try your own language here!):
	public $lang = 'nl';

	// Units (can be 'metric' or 'imperial' [default]):
	public $units = 'metric';

	public $response;
	/**
	 * @param $city
	 */
	public function __construct($city){
		$owm = new OpenWeatherMap('3fe75478307d3590ef58fa09f41d2f03');
		try {
			$weather = $owm->getWeather($city, $this->units, $this->lang);
		} catch(\Exception $e) {
			lib\debug::debugMessage('weather','General exception: ' . $e->getMessage() . ' (Code ' . $e->getCode() . ').');
		}

		$this->response = $weather;
	}

	public function temperature(){
		return $this->response->temperature;
	}
}
