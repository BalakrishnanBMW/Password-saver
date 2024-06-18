<?php

class user
{
	private $db;

	function __construct($conn)
	{
		$this->db = $conn;
	}

	public function insertUser($email, $password)
	{
		try{
			$result = $this->getUserByMail($email);
			if($result['num']>0) {
				return false;
			}
			else 
			{
				$new_password = md5($password.$email);
				$sql = "INSERT INTO `users` (email, password) VALUES (:email,:password)";
				$stmt = $this->db->prepare($sql);
				$stmt->bindparam(':password',$new_password);
				$stmt->bindparam(':email',$email);
				$stmt->execute();
				return true;
			}
		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function getUser($email, $password)
	{
		try {
			$query = "SELECT * FROM users WHERE email=:email AND password=:password";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':email',$email);
			$stmt->bindparam(':password',$password);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		}  catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
		
	}

	public function getUserByMail($email)
	{
		try {
			$query = "SELECT COUNT(*) AS num FROM users WHERE email=:email";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':email',$email);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

}


?>