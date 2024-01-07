<?php
function checkIfEmailExists($conn, $email)
{
  $query = "SELECT email FROM users WHERE email='$email'";
  $result2 = mysqli_query($conn, $query) or die("Check Database Error" . mysqli_error($conn));
  if ($result2 !== false) {
    if (mysqli_num_rows($result2) > 0) {
      return true;
    }
  }
  return false;
}
function checkIfEmailAndPasswordExist($conn, $email, $pass, $user_valid, $user_id)
{
  $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
  $result = mysqli_query($conn, $query) or die("Check Database Error" . mysqli_error($conn));
  if ($result !== false) {
    if (mysqli_num_rows($result) > 0) {
      // A MATCH HAS BEEN FOUND
      $user_valid = true;
      $row = mysqli_fetch_assoc($result);

      $user_id = $row['id'];
      return true;
    }
  }
  return false;
}
function registerNewUser($conn, $fname, $sname, $oname, $email, $pass, $status = 1)
{
  $query1 = "INSERT INTO users(email, password, firstname, surname, othername, status)
  VALUES('$email', '$pass', '$fname', '$sname', '$oname', '$status')";
  $result1 = mysqli_query($conn, $query1) or die("registerNewUser" . mysqli_error($conn));
  return true;
}
?>