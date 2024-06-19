<?php

require_once 'db/conn.php';
include 'includes/header.php';
require 'includes/auth_check.php';

$result = $user->getUserByMail($_SESSION['email']);

?>

<div class="card">
  <div class="card-header">
	<?php echo '<h3>'. $result['email'] .'</h3>'; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">No of Password Saved : </h5>
    <a href="passwords.php" class="btn btn-primary">Password Manager</a>
    <a href="addnew.php" class="btn btn-primary">Add New Password</a>
  </div>
</div>

<?php

include 'includes/footer.php';

?>