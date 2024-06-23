<?php 
$title = "View Password";
require 'includes/header.php';
require_once 'includes/auth_check.php';
require 'db/conn.php';

if(!isset($_GET['id']))
{
	header("Location:index.php");
	// include 'includes/errormessage.php';
	exit();
}
else 
{
	$id = $_GET['id'];
	$result = $crud->getPasswordById($id);

?>
<br/>

<?php

echo $result['website'] . '<br>';
echo $result['userid'] . '<br>';
echo $result['password'] . '<br>';
echo $result['notes'] . '<br>';

?>
	
<br/><br/>
	<a href="passwords.php" class="btn btn-info"> Back to List </a>
	<a href="edit.php?id=<?php echo $result['id'] ?>" class="btn btn-warning"> Edit </a>
	<a onclick="return confirm('Are you sure? Do you want to delete the record? note: The action cannot be undo.')" href="delete.php?id=<?php echo $result['id'] ?>" class="btn btn-danger"> Delete </a>

<?php } ?>

<br/>
<br/>
<br/>
    
<?php require 'includes/footer.php' ?>