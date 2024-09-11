<?php

include '../../db-connection.php'; 


$id =  $_GET['id'];
$table = $_GET['table'];

$sql = "DELETE FROM $table WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  if($table == "orphanage_tbl") { $location = "../orphanages.php"; }
  else { $location = "../users.php"; }

  header('Location: '.$location);
} else {
  echo "Error deleting record: " . $conn->error;
}

?>