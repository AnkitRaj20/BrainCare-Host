<?php 
// Connection
include('../connection/config.php');

$sql = "CREATE TABLE contact (
    cId int unsigned NOT NULL auto_increment primary key,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    subject varchar(255)    NOT NULL,
    message text,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if($conn -> query ($sql)=== true){
  echo "table created successfully";
}
else{
    echo "table not created successfully";
}
?>