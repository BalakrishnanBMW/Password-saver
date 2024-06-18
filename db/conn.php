<?php

	$host = "localhost";
	$db = "password_manager";
	$user = "root";
	$pass = "";
	$charset = "utf8mb4";

	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

	try{
		$pdo = new PDO($dsn,$user,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} 
	catch(PDOException $ex) {
		throw new PDOException($ex->getMessage());
	}

	require_once 'crud.php';
	require_once 'user.php';

	$crud = new crud($pdo);
	$user = new user($pdo);
	

?>