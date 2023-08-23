<?php 
 session_start();
 include("../../connection/config.php");

$roomname=$_GET['roomname'];

$sql="SELECT * FROM `rooms` WHERE `name` = '$roomname'";

$result = mysqli_query($conn,$sql);

if($result){
    //Check if room exits
    if(mysqli_num_rows($result)==0) {
        
        $_SESSION['roomErr'] = "This room does not exist. Please create a new one.";
        ?>
        <script>
            window.location.href = 'http://64.227.133.196/dashboard/dashboard/createRoom.php';
        </script>
        <?php
    }   
        // Chat room
    else{
    }
}else{
    echo "ERROR:".mysqli_error($conn);
}

include("./Message/grp.php");
?>