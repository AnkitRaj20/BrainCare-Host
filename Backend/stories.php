<?php 
 include("../connection/config.php");

//  Create Table
$sql = "CREATE TABLE register(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    topic text NOT NULL,
    message TEXT NOT NULL,
    regDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
)";

  if($conn->query($sql)===TRUE)
    echo "Table Created Successfully";
  else
    echo "Table Not Created Successfully".$conn->error;

    $conn->close();
?>