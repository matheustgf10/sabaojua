<?php
require_once("../model/class.User.php");
require_once("class.Connection.php");
class userDAO{
	
	private $User;
	private $Conn;	
	private $stmt;
	
	function __construct($User){
		$this->User = $User;
		$this->Conn = new Connection();
		$this->Conn = Connection->openConnection();

	}
	
	
	public function insertUser(){
		$this->stmt = $this->Conn->prepare("INSERT INTO user (login,password) VALUES (?,?)");
		$this->stmt->bindValue(1, $this->User->login);
		$this->stmt->bindValue(2, $this->User->password);
		
		return $this->stmt->execute();
	}
	
	public function deleteUser(){
		$this->stmt = $this->Conn->prepare("UPDATE user SET flag = 0 WHERE id = ?");
		$this->stmt->bindValue(1, $this->User->id);
		return $this->stmt->execute();
		
	} 
	
	public function updateUser(){
		$this->stmt = $this->Conn->prepare("UPDATE user SET login = ?, password = ? WHERE id = ?");
		$this->stmt->bindValue(1, $this->User->login);
		$this->stmt->bindValue(2, $this->User->password);
		$this->stmt->bindValue(3, $this->User->id);
		return $this->stmt->execute();		
	}
	
	public function verificationUser($login,$password){
		$this->stmt= $this->Conn->prepare("SELECT login FROM user WHERE login = ? AND password = ? ");
		$this->stmt->bindValue(1, $login);
		$this->stmt->bindValue(2, $password);
		$this->stmt->execute();
		$result = $this->stmt->fetchAll();
		
		$this->Conn->closeConnection();
		
		if(count($result) == 1){
			return true;
		} else{
			return false;
		}
		
		
	}
	
	
	

}

