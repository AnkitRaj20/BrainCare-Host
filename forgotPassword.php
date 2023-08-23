<?php 
session_start();
    // Header
    $banner_text="Forgot Password ";

    include("./Header/header.php");

    // Connection
    include("./Connection/config.php");

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $sql = "SELECT * FROM register where email='$email'";
        $result= mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); 

        if($num){
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
            $name =  $row['firstName'];
            $id =  $row['id'];
            $link = "http://64.227.133.196/resetPassword.php?token=$id";
            $subject = "Password Reset";
            $body = "Hi $name, Click here to reset your password $link";
            $sender = "From : ankit21654@gmail.com";

            if(mail($email,$subject,$body,$sender)){
              $_SESSION['pass'] = "Check your mail to reset your password $email";
                // header('location: ../login.login.php');
            }
            else{
                $_SESSION['pass'] = "Email sending failed";
                
            }
        }else{
                $_SESSION['pass'] = "No such email found $email";
        }
    }
    else{
        $_SESSION['pass'] = " ";
    }

?>



<section class="login">
<!--  Request me for a signup form or any type of help  -->
<div class="login-form">    
    <form  method="POST">
		<img class="loginimg" src="./img/user.png" alt="img" width="35%" style="display:flex;margin-left:30%;">
    	<h4 class="modal-title">Please fill email id properly</h4>
        <p class="bg-danger text-white px-3"> <?php 
            if(isset($_SESSION['pass'])){
                echo $_SESSION['pass'];
                $_SESSION['pass'] = "";
            }else{
                $_SESSION['pass'] = "";
            }
        ?> </p>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Send Mail">   <br>           
        <div class="text-center small">Don't have an account? <a href="./registerForm.php">Sign up</a></div>
    </form>			
</div>
</section>

<?php
include("./Footer/footer.php")
?>
  
  
  
  
  