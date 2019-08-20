<?php 
	include "../model/class.User.php";
	include "../view/UserView.php";

	Class UserController{

		private $User;
		private $UserView;

		function __construct(){
			$this->User = new User();
			$this->UserView = new UserView();
			$this->User->view($this->UserView);
	
	}
		
	}