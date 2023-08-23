<?php 
// connection
include "../../../connection/config.php";

$msg=$_POST['text'];
$room=$_POST['room'];
$ip=$_POST['ip'];
$name=$_POST['name'];
echo $name;
echo $msg;
date_default_timezone_set("Asia/Calcutta");
$date = date("d-m-Y h:i:sa");

$sql="INSERT INTO `msgs` ( `msg`, `room`,`name`, `ip`, `stime`) VALUES ('$msg', '$room','$name', '$ip', '$date')";

echo $sql;

mysqli_query($conn,$sql);

// Close the connection
mysqli_close($conn);
?>