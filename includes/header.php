<?php
include_once 'db/session.php';
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Password Manager </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

</head>
<body>

<div class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <div class="container-fluid">
    <a class="navbar-brand">Password Manager</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">

<?php 
if(!isset($_SESSION['email'])) {
?>
	<a class='nav-link' href='login.php'>Login</a>
	<a class='nav-link' href='register.php'>Register</a>
<?php
} else {
?>
	<a class='nav-link' href='passwords.php'>Saved Password</a>
	<a class='nav-link' href='addnew.php'>Add new password</a>
	<a class='nav-link' href='profile.php'>Profile</a>
	<a class='nav-link' href='logout.php'>Logout</a>
<?php } ?>

      </div>
    </div>
  </div>
</nav>

<br>
<br>