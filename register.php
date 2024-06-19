<?php

require_once 'db/conn.php';
include 'includes/header.php';

if($_SERVER['REQUEST_METHOD']=='POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if($user->insertUser($email, $password)) {
		$_SESSION['email'] = $email;
		$crud->createNewTable();
		header('Location: index.php');
		exit();
	} else {
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			User already exists or registration failed!
 			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php
	}
}

?>


<div class="container">
<h1> Create New Account </h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>

  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Register</button>

</form>

<br>
<div>
	<p class="lead"> Already have an account? <a href="login.php"> login </a> </p>
</div>

</div>



<?php include 'includes/footer.php'; ?>