<link href="upload.css?1323" rel="stylesheet">

<?php
session_start();
include "dataBase.php";
include "models/media.php";

//******** PROTECT PAGE FROM UNAUTHORIZED ACCESS ************
// Check if user is logged in
if (isset($_SESSION['user_id'])) {
  // if yes, do nothing
} else {
  // if no, go to index page
  header("Location: index.php");
}
//*************************************************************

echo "FILES <pre>" . print_r($_FILES, true) . "</pre>";

// if(isset($_FILES['file_upload'])){
//   $upload_dir = "uploads/";
//   move_uploaded_file(
//     $_FILES['file_upload']['tmp_name'],
//     $upload_dir . $_FILES['file_upload']['name']
//   );

// }
$user_id = $_SESSION['user_id'];

$uploads_dir = "uploads/";

// echo "<pre>" . print_r($_FILES, true) . "</pre>"
if (isset($_FILES['file_upload'])) {
  //File Validation(CLASSWORK)

  //Get file extension and other details
  $filename = $_FILES['file_upload']['name'];
  $arr_pieces = explode(".", $filename);
  $extension = end($arr_pieces);

  //Create a media object and create a file record in database
  $record_id = false;
  $file_obj = new Media($conn);
  $result = $file_obj->createRecord($user_id, $filename, $extension);
  if ($result) {
    $record_id = mysqli_insert_id($conn);
  }

  //Rename and move uploaded file to uploads folder
  if ($record_id !== false) {
    move_uploaded_file(
      $_FILES['file_upload']['tmp_name'],
      $uploads_dir . $record_id . "." . $extension
    );
  }
}
?>
<a href="home.php"><button class="back">Back To Home Page</button></a>
<div class="box_upload">

  <form method="post" enctype="multipart/form-data" class="upload_form">
    <div class="file">
      <input type="file" name="file_upload" id="">
    </div>
    <div class="btn">
      <button name="upload_file" value="upload a file">Upload a file</button>
    </div>
  </form>
</div>
<hr />
<div class="display">
  <?php
  $med = new Media($conn);

  $rows = $med->readRecord($user_id);
  if ($rows !== false) {
    foreach ($rows as $key => $val) {
      $record_id = $val['id'];
      $real_file_name = $val['id'] . "." . $val['extension'];
      $original_file_name = $val['filename'];
      echo "<div class='each_img'>";
      echo "<div class='img'>";
      echo "<img class='image' src='" . $uploads_dir . $real_file_name . "' >";
      echo "</div>";
      echo "<div class='img_name'>";
      echo "<h5>" . $real_file_name . "</h5>";
      echo "</div>";
      echo "</div>";

    }
  }
  ?>
  <!-- <div class="img">
    echo "<img src='" . $uploads_dir . $real_file_name . "' class='w-25 img-fluid border-radius-lg' >";
  </div>
  <div class="img_name">

  </div> -->
</div>