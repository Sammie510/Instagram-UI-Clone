<?php
session_start();
include "dataBase.php";
include "functions/functions.php";

$error = "";
$fname = "";
$sname = "";
$oname = "";
$email = "";
$pass = "";
$pass2 = "";
$passerror = "";


if (isset($_POST['register_but'])) {
  //Validate Login Details
  $fname = htmlentities($_POST['firstname']);
  $sname = htmlentities($_POST['surname']);
  $oname = htmlentities($_POST['othername']);
  $email = htmlentities($_POST['myemail']);
  $pass = htmlentities($_POST['mypass']);
  $mypass2 = htmlentities($_POST['mypass2']);

  if ($pass !== $mypass2) {
    $passerror = "<p style='color:red';>passwords do not match</p>";
  } else {
    //Check database if email exists
    $chk_email = checkIfEmailExists($conn, $email);

    //if false(okay) continue
    if ($chk_email === true) {
      if ($email = '') {
        $error = '';
      } else {
        $error = "<p style='color:red';>Email Already Registered</p>";
      }
    } else {
      $error = '';
      $register = registerNewUser($conn, $fname, $sname, $oname, $email, $pass);
      if ($register === true) {
        $error = "<p style='color:white'; font-size:'1.1rem'; text-align:'center'; font-weight:'bolder';>Sign Up Successful!</p>";
        $fname = "";
        $sname = "";
        $oname = "";
        $email = "";
        $pass = "";
        $pass2 = "";
        $passerror = "";
      } else {
        //if true(display error message)
        $error = "<p style='color:'red'; font-size:'1.1rem'; text-align:'center'; font-weight:'bolder';'>Sign Up Failed!</p>";
      }
    }


  }


}

?>


<link rel="stylesheet" href="css/style.css?123">


<div class="sign-up__form">
  <form role="form text-left" method="post" action="">
    <?php echo $error; ?>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Enter your first name" name="firstname">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Enter your surname" name="surname">
    </div>
    <div class="mb-2">
      <input type="text" class="form-control" placeholder="Enter your other name" name="othername">
    </div>
    <div class="mb-2">
      <input type="email" class="form-control" placeholder="Enter your Email" name="myemail" name="myemail">
    </div>
    <?php echo $passerror ?>
    <div class="mb-2">
      <input type="password" class="form-control" placeholder="Password" name="mypass">
    </div>
    <div class="mb-2">
      <input type="password" class="form-control" placeholder="Confirm Password" name="mypass2">
    </div>
    <div class="form-check form-check-info mb-2">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
      <label class="form-check-label" for="flexCheckDefault">
        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
      </label>
    </div>
    <div class="text-center mb-2">
      <button name="register_but" value="Sign In" class="btn-sign-in">Sign
        up</button>
    </div>
    <p class="text-sm mt-3 mb-0">Already have an account? <a href="signin.php" class="twitter-text">Sign in</a></p>
  </form>
</div>