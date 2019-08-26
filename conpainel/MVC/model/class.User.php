<?php 
	// session_start();
	
	include "../DAO/class.UserDAO.php";
	
	class User{
		
		private $id;
		private $login;
		private $password;
				
		public function getlogin(){
			return $this->login;
		}
		
		public function setlogin($login){
			$this->login = $login;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function setPassword($password){
			$this->password = $pasword;			
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function connectingUser(){
			$userDAO = new UserDAO();
			
			if($userDAO->verificationUser() == true ){
				$_SESSION['user'] = true;
			}
		}
		
		public function desconnectingUser(){
			$_SESSION['user'] = false;
			
		}
		
	}


