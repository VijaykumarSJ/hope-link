<?php

$name = $_POST['orphanage_name'];
$desc = $_POST['orphanage_desc'];
$file = $_FILES["orphanage_image"]["name"];
$category = $_POST['orphanage_category'];
$location = $_POST['orphanage_location'];
$contact = $_POST['orphanage_contact'];

include 'connection.php';

$uploadDirectory = "../../uploads/";

if (move_uploaded_file(
    $_FILES["orphanage_image"]["tmp_name"],
    $uploadDirectory . $_FILES["orphanage_image"]["name"]
    )) {
    echo "File uploaded successfully!";
} else {
    echo "Error moving file.";
}

    $sql = "INSERT INTO myorphanages_tbl(orphanage_name , orphanage_desc, orphanage_category, orphanage_image, orphanage_location, orphanage_contact) VALUES('$name','$desc','$category','$file','$location','$contact')";

    if($conn->query($sql)===TRUE)
    {
        header('location: ../myorphanages.php');
    }
    else
    {
        echo "Error : ".$con->error;
    }