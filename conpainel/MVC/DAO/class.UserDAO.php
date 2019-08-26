<?php
include "../model/class.User.php";
include "class.Connection.php";

class userDAO{
	
	private $User;
	private $Conn;	
	private $stmt;
	
	function __construct($User){
		$this->User = $User;
		$this->Conn = new Connection();
		$this->Conn = Connection::createConnection();

	}
	
	
	public function insert(){
		$this->stmt = $this->Conn->prepare("INSERT INTO user (login,password) VALUES (?,?)");
		$this->stmt->bindValue(1, $this->User->login);
		$this->stmt->bindValue(2, $this->User->password);
		
		return $this->stmt->execute();
	}
	
	public function delete(){
		$this->stmt = $this->Conn->prepare("UPDATE user SET flag = 0 WHERE id = ?");
		$this->stmt->bindValue(1, $this->User->id);
		
		return $this->stmt->execute();
	} 
	
	public function update(){
		$this->stmt = $this->Conn->prepare("UPDATE user SET login = ?, password = ? WHERE id = ?");
		$this->stmt->bindValue(1, $this->User->login);
		$this->stmt->bindValue(2, $this->User->password);
		$this->stmt->bindValue(3, $this->User->id);
	
		return $this->stmt->execute();		
	}
	
	public function verification($login,$password){
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

