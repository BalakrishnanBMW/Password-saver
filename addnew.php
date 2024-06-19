<?php

require_once 'db/conn.php';
include 'includes/header.php';
require 'includes/auth_check.php';

if($_SERVER['REQUEST_METHOD']=='POST') {
	$website = $_POST['website'];
	$userIdSite = $_POST['userIdSite'];
	$passwordSite = $_POST['passwordSite'];
	$notes = $_POST['notes'];
	$userId = $user->getUserByMail($_SESSION['email']);

	if($crud->insert($website, $userIdSite, $passwordSite, $notes)) {
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

?>

<div class="container">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
<h1> Save a New Password </h1>
  <div class="mb-3">
    <label for="website" class="form-label">website name/url</label>
    <input type="text" name='website' class="form-control" id="website">
  </div>
  <div class="mb-3">
    <label for="user-id" class="form-label">User id</label>
    <input type="text" name='userIdSite' class="form-control" id="user-id" aria-describedby="useridHelp">
    <div id="useridHelp" class="form-text">Enter the user id or email you registered with <span id='site-name'> site </span></div>
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="text" name='passwordSite' class="form-control" id="Password">
  </div>
  <div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control" name='notes' id="notes" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

<?php include 'includes/footer.php'; ?>