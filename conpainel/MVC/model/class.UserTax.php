<?php 
	
	include "../controller/class.UserController.php";
	include "class.User.php";
	include "../view/UserView.php";	
	include "../DAO/class.UserDAO.php";

	class UserTax{

		private $View;
		private $Controller;

		function __construct(){
			$this->View = new UserView();
			$this->Controller = new UserController();

		}

		public function setController($Controller){
			$this->Controller = $Controller;
		}

		public function view($userView){
			$this->View = $userView;
		}

		public function create(){
			$this->UserDAO->create($user);

		}

		public function verification(){
			// echo "verify";
		}
	}