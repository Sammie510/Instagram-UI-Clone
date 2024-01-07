<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
  // if yes, go to dashboard
  header("Location: home.php?login=success");
} else {
  // if no, go to login page
  //	header("Location: login.html");
  header("Location: signin.php");
}

?>