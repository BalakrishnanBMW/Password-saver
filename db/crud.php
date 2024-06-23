
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

	public function getPasswordList()
	{
		try 
		{
			$tablename = $this->getTableName();
			$query = "SELECT * FROM `$tablename`";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} 
		catch(PDOException $ex) 
		{
			echo $ex->getMessage();
			return false;
		}
	}

	public function update($id, $website, $userIdSite, $passwordSite, $notes)
	{
		try{
			$tablename = $this->getTableName();
			$query = "UPDATE `$tablename` SET website=:website, userid=:userIdSite, password=:passwordSite, notes=:notes WHERE id=:id";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':id',$id);
			$stmt->bindparam(':website',$website);
			$stmt->bindparam(':userIdSite',$userIdSite);
			$stmt->bindparam(':passwordSite',$passwordSite);
			$stmt->bindparam(':notes',$notes);
			
			$stmt->execute();
			return true;

		} catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
		}
	}

	public function getPasswordById($id)
	{
		try 
		{
			$tablename = $this->getTableName();
			$query = "SELECT * FROM `$tablename` WHERE id=:id";
			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':id',$id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
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

	public function delete($id)
	{
	   try{
		$tablename = $this->getTableName();
		$query = "DELETE FROM `$tablename` WHERE id=:id";
		$stmt = $this->db->prepare($query);
		$stmt->bindparam(':id', $id);
		$stmt->execute();
		return true;
	      } catch(PDOException $ex) {
			echo $ex->getMessage();
			return false;
	      }
	
	}	

	public function noOfSavedPassword()
	{	
		try 
		{
			$tablename = $this->getTableName();
			$query = "SELECT COUNT(*) AS count FROM `$tablename`";
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

}
?>