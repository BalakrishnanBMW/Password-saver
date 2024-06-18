<?php

require_once 'db/conn.php';
include 'includes/header.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$new_password = md5($password.$email);
	$result = $user->getUser($email, $new_password);

	if($result==false)
	{
?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			Mail id or Password is invalid
 			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
<?php
	} else {
		$_SESSION['email'] = $email;
		header('Location:index.php');
		exit();
	}

}

?>

<div class="container">
<h1> Login </h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>

  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Log in</button>

</form>

<br>
<div>
	<p class="lead"> <a href="register.php"> Create new account </a> </p>
</div>

</div>




<?php include 'includes/footer.php'; ?>