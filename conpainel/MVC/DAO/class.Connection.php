<?php 

	class Connection{

		private $user;
		private $password;
		private $database;
		private $conn;

		function __construct(){
			private $this->user = "root";
			private $this->password = "";
			private $this->database = "sabaojua_sdb";
			public $this->conn = null;

		}	

		public static createConnection(){
			try {
				$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
				$this->conn = new PDO('mysql:host=localhost;dbname='.$this->bd_name,$this->username,$this->password,$opcoes);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
			}
			
			return $this->conn;
		}

		public closeConnection(){
			$this->conn = null;
		}

	}