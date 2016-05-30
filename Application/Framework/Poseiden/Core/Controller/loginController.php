<?php
namespace Poseiden\Core\Controller;

class loginController extends mainController {
	private $usedModel = 'secAccount';

	public function __construct(){
		parent::__construct($this->usedModel);
	}

	public function listUsersAction() {
		$usersData = $this->createFactory('users');
		$users = $this->factory->find_many();
		foreach ($users as $user){
			$userDate = $usersData->where('id', $user->id )->find_one();
			$outputBuffer[$user->username ] = ['email' => $user->email, 'id' => $user->id ,
				'firstName' => $userDate->first_name ,
				'lastName' => $userDate->last_name ] ;
		}
		$this->jsonReturn($outputBuffer);
	}
}