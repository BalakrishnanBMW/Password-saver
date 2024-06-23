<?php 
require 'db/conn.php';
$title = "Delete Password";
include 'includes/header.php';
require_once 'includes/auth_check.php';

if(!isset($_GET['id'])){
	header("Location:index.php");
	// include 'includes/errormessage.php';
	exit();
}
else
{
	$id = $_GET['id'];
	
	$res = $crud->delete($id);
	if($res)
	{
		header("Location:passwords.php");
		exit();
	}
	else
	{
		
	}
}

?>

<?php include 'includes/footer.php' ?>