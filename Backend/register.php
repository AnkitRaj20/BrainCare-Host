<?php
//Connection
include("../connection/config.php");
session_start();

$getPassword = $_POST['password'];
$email = $_POST['email'];

// Password hashing using bcrypt
$pass = password_hash($getPassword, PASSWORD_BCRYPT);


$emailQuery = "SELECT * from register where email = '$email'";
$query = mysqli_query($conn, $emailQuery);
$emailCount = mysqli_num_rows($query);


if ($emailCount > 0) {
?>
  <script>
    location.replace("../registerForm.php");
    alert('Email already registered');
  </script>
<?php
} else {
  $sql = "INSERT INTO `register` (`firstName`, `middleName`, `lastName`, `mobile`, `email`,`gender`,`occupation`, `addr`, `street`, `city`, `state`, `pin`, `password`, `regDate`,`userType`) VALUES ('$_POST[firstName]','$_POST[middleName]','$_POST[lastName]','$_POST[mobile]','$_POST[email]','$_POST[gender]','$_POST[occupation]','$_POST[address]','$_POST[street]','$_POST[city]','$_POST[state]','$_POST[pin]','$pass', current_timestamp(),'user');";

  if ($conn->query($sql) === TRUE) {
    $_SESSION['isLoggedIn'] = 'login' ;
                $last_id = mysqli_insert_id($conn);
                $_SESSION['id'] = $last_id;
                $_SESSION['email'] = $_POST['email'];
    echo "Account Created Successfully";
    header('location: ../dashboard/dashboard/user.php');
  } else {
    echo "Error" . $conn->error;
  }
}

$conn->close();
?>