<?php 
 include("../connection/config.php");

//  Create Table
$sql = "CREATE TABLE register(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    middleName VARCHAR(50) ,
    lastName VARCHAR(50) NOT NULL,
    mobile VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    gender VARCHAR(50) NOT NULL, 
    occupation VARCHAR(100) NOT NULL,
    addr VARCHAR(255) NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    pin INT(6) NOT NULL,
    password VARCHAR(255) NOT NULL,
    regDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    userType VARCHAR(100) NOT NULL
)";

  if($conn->query($sql)===TRUE)
    echo "Table Created Successfully";
  else
    echo "Table Not Created Successfully".$conn->error;

    $conn->close();
?>