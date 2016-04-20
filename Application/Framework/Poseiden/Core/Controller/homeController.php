<?php
namespace Poseiden\Core\Controller;

use Poseiden\Core\Model;


class homeController extends mainController {



	public function indexAction() {
		$this->jsonReturn(array('build' =>'test',
			'auth' => array('user' => 'testUser'))
		);
	}

	public function weatherAction() {
		$weather = new Model\weatherModel('Rotterdam');
		$this->jsonReturn(array(
			'temperatureNow' => $weather->getTemperature(),
			'sunrise' => $weather->getSunrise(),
			'sunset' => $weather->getSunset(),
			'description' => $weather->getDescription(),
			'icon' => $weather->getIcon(),
			'humidity' => $weather->getHumidity(),
			'sunHours' => $weather->getSunHours()));
	}
}
