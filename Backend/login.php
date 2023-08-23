<?php 
//Connection
include("../connection/config.php");
session_start();

$email= $_POST['email'];
$password= $_POST['password'];

$sql = "SELECT * FROM `register` WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);


if($num==1){
     while($row=mysqli_fetch_array($result)){

        if(password_verify($password,$row['password'])){

            // if(mysqli_num_rows($result)>0){
                $_SESSION['isLoggedIn'] = 'login';
                
                // Fetching id and email from db
                $_SESSION['id'] = $row['id'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['email'] = $row['email'];
                header('location: ../dashboard/dashboard/user.php');
                // header('location: ../dashboard1/user.php');
            }
            $_SESSION['msg'] = "Incorrect username or password";
    ?>
                  <script> 
                //   alert("Wrong Email Id or Password");
                  location.replace("../loginForm.php");
                  </script>
                 
                <?php

  
 }
}else{
    $_SESSION['msg'] = "Incorrect username or password";
    ?>
                  <script> 
                //   alert("Wrong Email Id or Password");
                  location.replace("../loginForm.php");
                  </script>
                 
                <?php
}

?>