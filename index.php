<?php

require_once 'db/conn.php';
include 'includes/header.php';

?>

<?php

if(!isset($_SESSION['email'])) {
	header("Location:login.php");
	exit();
} else {
	header("Location:addnew.php");
	exit();
}

?>

<?php

include 'includes/footer.php';

?>