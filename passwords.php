<?php

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
		<button class='btn btn-outline-primary'>View</button>
		<button class='btn btn-outline-info'>Update</button>
		<button class='btn btn-outline-danger'>Delete</button>
	</div>

<?php
}
?>

<?php include 'includes/footer.php'; ?>