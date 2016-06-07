<?php
namespace Poseiden\Core\Controller;

use Poseiden\Core\Model;

class authController extends mainController {
	private $usedModel = 'secAccount';

	public function __construct(){
		parent::__construct($this->usedModel);
	}

	public function listUsersAction() {
		$usersData = $this->createFactory('users');
		$users = $this->factory->find_many();
		$outputBuffer = [];
		foreach ($users as $user){
			$usersData = $this->createFactory('users');

			$userDate = $usersData->where('id', $user->userId )->find_one();
			$outputBuffer[$user->username ] = ['email' => $user->email, 'id' => $user->userId ,
				'firstName' => $userDate->first_name ,
				'lastName' => $userDate->last_name ];
		}
		$this->jsonReturn($outputBuffer);
	}

	public function validatePassword($passwordToTest, $original) {
		if (password_verify($passwordToTest, $original)) {
			return true;
		} else {
			return false;
		}
	}


	public function validateJWT($tokenToTest) {}
	public function createToken($user) {}
	public function createJWT($passwordToTest) {}
	public function loginAction() {
		$username = 'djneo'; // Shall be the post value
		$user = $this->factory->where('username', $username)->find_one();
		if ($this->validatePassword('test', $user->password) ) {
			$this->createToken($user);
		}


	}
}