<?php 
	
	include "MVC/controller/class.UserController.php";

	class Main{

		private $userController;

	
		function __construct(){
			$userController = new $userController();
			
		}

	}
