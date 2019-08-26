<?php 
	include "../model/class.UserTax.php";
	include "../view/UserView.php";

	Class UserController{

		private $UserTax;
		private $UserView;

		function __construct(){
			$this->UserTax = new UserTax();
			$this->UserTax->setController($this);
			$this->UserView = new UserView();
			$this->UserTax->view($this->UserView);
	
		}

		public function createUser(){
			$this->UserTax->create();

		}

		public function updateUser(){
			$this->UserTax->update();

		}

		public function deleteUser(){
			$this->UserTax->delete();

		}

		public function verifyUser(){
			$this->UserTax->verification();

		}

		public function verifyRequest($request){
			
			if($request == "create"){
				$this->createUser();

			}else if($request == "update"){
				$this->updateUser();

			}else if($request == "delete"){
				$this->deleteUser();
			
			}else if($request == "verification"){
				$this->verifyUser();

			}else{
				echo "error";
			}
			
		}
		
	}