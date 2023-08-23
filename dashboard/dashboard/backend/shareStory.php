<?php 
session_start();

// Connection
include("../../../connection/config.php");

$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$lastName = $_POST['lastName'];
$topic = $_POST['topic'];
$message = $_POST['message'];

// Query
$sql = "INSERT INTO `stories` (`firstName`,`middleName`,`lastname`,`topic`,`message`) VALUES ('$firstName','$middleName','$lastName','$topic','$message')";
// echo $sql;

$result = mysqli_query($conn, $sql);


if($result){
    echo "Success";
    header("location: ../stories.php?start=0&data=5" );
}else{
    echo "Error".$conn->error;
}
?>