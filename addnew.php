<?php

require_once 'db/conn.php';
include 'includes/header.php';
require 'includes/auth_check.php';

?>

<div class="container">
<form>
<h1> Save a New Password </h1>
  <div class="mb-3">
    <label for="website" class="form-label">website name/url</label>
    <input type="text" class="form-control" id="website">
  </div>
  <div class="mb-3">
    <label for="user-id" class="form-label">User id</label>
    <input type="text" class="form-control" id="user-id" aria-describedby="useridHelp">
    <div id="useridHelp" class="form-text">Enter the user id or email you registered with <span id='site-name'> site </span></div>
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="text" class="form-control" id="Password">
  </div>
  <div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control" id="notes" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php include 'includes/footer.php'; ?>