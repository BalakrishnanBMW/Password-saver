
<?php

class crud {

	private $db;
	
	function __construct($conn)
	{
		$this->db = $conn;
	}	

	public function createNewTable() 
	{
	   	try 
		{
			$tablename = $this->getTableName();
        		$query = "CREATE TABLE IF NOT EXISTS `$tablename` (id INT AUTO_INCREMENT PRIMARY KEY, website VARCHAR(100), userid VARCHAR(100), password VARCHAR(100), notes VARCHAR(255))";
        		$stmt = $this->db->prepare($query);
        		$stmt->execute();
        		return true;
		} 
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
			return false;
	    	}
	}

	public function getPasswordList($result)
	{
		try 
		{
			$tablename = $this->getTableName();
			$query = "SELECT * FROM `$tablename`";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
		} 
		catch(PDOException $ex) 
		{
			echo $ex->getMessage();
			return false;
		}
	}

	public function insert($website, $userIdSite, $passwordSite, $notes)
	{
		try
		{
			$tablename = $this->getTableName();
			$query = "INSERT INTO `$tablename` (website, userid, password, notes) VALUES (:website, :userIdSite, :passwordSite, :notes)";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':website',$website);
			$stmt->bindparam(':userIdSite',$userIdSite);
			$stmt->bindparam(':passwordSite',$passwordSite);
			$stmt->bindparam(':notes',$notes);			
			$stmt->execute();
			return true;
		} 
		catch(PDOException $ex) 
		{
			echo $ex->getMessage();
			return false;
		}
	}

	public function getTableName() 
	{
	 	try 
		{
			$email = $_SESSION['email'];
			$tablename = str_replace("@","_",$email);
			$tablename = str_replace(".","_",$tablename);
	        	return $tablename;
	    	} 
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
			return false;
	    	}
	}
}
?>