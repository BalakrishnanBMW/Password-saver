<?php

$title = "Password Manager";
require_once 'db/conn.php';
include 'includes/header.php';
require 'includes/auth_check.php';

$result = $crud->getPasswordList();
?>

<?php
foreach($result as $r) {
?>

	<div class="container px-5 py-4 border rounded m-2">
		<h4> <?php echo $r['website'] ?> </h4>
		<hr>
		<a href="view.php?id=<?php echo $r['id'] ?>" class='btn btn-outline-primary'>View</a>
		<a href="edit.php?id=<?php echo $r['id'] ?>" class='btn btn-outline-info'>Update</a>
		<a onclick="return confirm('Are you sure? Do you want to delete the record? note: The action cannot be undo.')" href="delete.php?id=<?php echo $r['id'] ?>" class='btn btn-outline-danger'>Delete</a>
	</div>

<?php
}
?>

<?php include 'includes/footer.php'; ?>