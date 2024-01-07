<link rel="stylesheet" href="css/style.css?123">
<?php
session_start();
include "dataBase.php";
include "functions/functions.php";

// echo "<pre>" . print_r($_POST, true) . "</pre>";
$error = "";

if (isset($_POST['login_but'])) {
  $email = htmlentities($_POST['myemail']);
  $pass = htmlentities($_POST['mypass']);

  $user_valid = false;
  $user_id = false;

  $validate = checkIfEmailAndPasswordExist($conn, $email, $pass, $user_valid, $user_id);


  if ($validate) {
    $_SESSION['user_id'] = $user_id;
    header("Location: index.php?login=success");

  } else {
    unset($_SESSION['user_id']);
    session_destroy();
    $error = "<p style='color:red'>Email or Password Incorrect!</p>";
  }
}
?>

<div class="sign-in__form">
  <form method="post" action="">
    <?php echo $error ?>
    <label class="mb-2">Email</label>
    <div class="mb-3">
      <input name='myemail' type="email" class="form-control" placeholder="Enter your Email">
    </div>
    <label class="mb-2">Password</label>
    <div class="mb-3">
      <input name='mypass' type="password" class="form-control" placeholder="Enter your Password">
    </div>
    <div class="form-check form-switch mb-3">
      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
      <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
    <div class="text-center mb-3">
      <button name='login_but' value='Sign In' class="btn-sign-in">Sign
        in</button>
    </div>
    <p class="text-sm mt-3 mb-0">Don't have an account? <a href="signup.php" class="twitter-text">Sign Up</a></p>
  </form>
</div>