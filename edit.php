<?php 
$title = "Edit Password";
require 'includes/header.php';
require_once 'includes/auth_check.php';
require 'db/conn.php';


if($_SERVER['REQUEST_METHOD']=='POST') {
	$id = $_POST['id'];
	$website = $_POST['website'];
	$userIdSite = $_POST['userIdSite'];
	$passwordSite = $_POST['passwordSite'];
	$notes = $_POST['notes'];
	$userId = $user->getUserByMail($_SESSION['email']);

	if($crud->update($id, $website, $userIdSite, $passwordSite, $notes)) {
		header('Location:passwords.php');
		exit();
	} else {
?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Something went wrong!
 			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php
	}
}

if($_SERVER['REQUEST_METHOD']!='POST') {
if(!isset($_GET['id']))
{
	header("Location:passwords.php");
	// include 'includes/errormessage.php';
	exit();
}
else
{
	$id = $_GET['id'];
	$result = $crud->getPasswordById($id);
?>

<div class="container">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<h1> Save a New Password </h1>

  <input type='hidden' name='id' value="<?php echo $result['id'] ?>" />

  <div class="mb-3">
    <label for="website" class="form-label">website name/url</label>
    <input type="text" value="<?php echo $result['website'] ?>" name='website' class="form-control" id="website">
  </div>
  <div class="mb-3">
    <label for="user-id" class="form-label">User id</label>
    <input type="text" value="<?php echo $result['userid'] ?>" name='userIdSite' class="form-control" id="user-id">
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="text"  value="<?php echo $result['password'] ?>" name='passwordSite' class="form-control" id="Password">
  </div>
  <div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
	<textarea class="form-control" name='notes' id="notes" rows="3"><?php echo $result['notes'] ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

<?php }} ?>
    
<?php require 'includes/footer.php' ?>