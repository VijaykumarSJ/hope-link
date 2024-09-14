<?php

include 'connection.php';

$uploadDirectory = "../../uploads/";

$id =  $_GET['id'];
$status =  $_GET['status'];
$value = ($status==1) ? 0 : 1;


    $sql = "UPDATE orphanage_tbl SET status = $value";

    if($conn->query($sql)===TRUE)
    {
        header('location: ../orphanages.php');
    }
    else
    {
        echo "Error : ".$con->error;
    }