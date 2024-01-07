<?php

class Media
{
  // CRUD: CREATE, READ, UPDATE, DELETE
  // SQL: INSERT, SELECT, UPDATE, DELETE
  // id, user_id, filename, extension, status, time_added

  private $conn;

  private $table = "media";

  function __construct($conn)
  {
    $this->conn = $conn;

  }
  function createRecord($user_id, $filename, $extension, $status = 1)
  {
    $query = "INSERT INTO " . $this->table . " (user_id, filename, extension, status)
						VALUES ('$user_id', '$filename', '$extension', '$status') ";
    $result = mysqli_query($this->conn, $query)
      or die("createRecord " . mysqli_error($this->conn));
    return true;
  }
  function readRecord($user_id)
  {
    // CLASS WORK: ATTEMPT readRecord()
    $query = "SELECT * FROM " . $this->table . " WHERE user_id = '$user_id' ORDER BY time_added DESC ";
    $result = mysqli_query($this->conn, $query)
      or die("readRecord " . mysqli_error($this->conn));
    if ($result !== false) {
      if (mysqli_num_rows($result) > 0) {
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($arr, $row);
        }
        return $arr;
      }
    }
    return false;


  }
  function readRecordByID($id)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE id = '$id' ";
    $result = mysqli_query($this->conn, $query)
      or die("readRecord " . mysqli_error($this->conn));
    if ($result !== false) {
      if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
      }
    }
    return false;
  }
  function updateRecord($id, $filename, $extension, $status = 1)
  {
    $query = "UPDATE " . $this->table . "SET filename = '$filename', extension = '$extension', status  ='$status' WHERE id = '$id'";
    $result = mysqli_query($this->conn, $query) or die("updateRecord " . mysqli_error($this->conn));
    return true;
  }

  function deleteRecord($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = '$id'";
    $result = mysqli_query($this->conn, $query)
      or die("deleteRecord " . mysqli_error($this->conn));
    return true;
  }
}

?>