<?php 
    session_start();
    ob_start();
     // Header
     $banner_text="Reset Password ";
     include("./Header/header.php");
 
     // Connection
     include("./Connection/config.php");
 
     if(isset($_POST['submit'])){
         $password = $_POST['password'];
         $confirmPassword = $_POST['confirmPassword'];

         $id= $_GET['token'];

         if($password === $confirmPassword ){

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE `register` SET `password` ='$pass' WHERE id =$id";
            $result= mysqli_query($conn, $sql);
            // $num = mysqli_num_rows($result); 

                if($result){
                    $_SESSION['pass-update'] = "Your Password is updated";
                    header('location: ./loginForm.php');
                }else{
                    $_SESSION['resetmsg'] = "Your Password is not updated";
                    header('location: resetPassword.php');
                }

         }else{
            echo "Password not matched";
            $_SESSION['resetmsg'] = "Password not matched";
            header('location: resetPassword.php');
         }
     }else{
        $_SESSION['resetmsg'] = " ";   
     }
    ?>
	<section class="login">
<!--  Request me for a signup form or any type of help  -->
<div class="login-form">    
    <form  method="POST">
		<!-- <div class="avatar"><i class="material-icons">&#xE7FF;</i></div> -->
		<img class="loginimg" src="./img/user.png" alt="img" width="35%" style="display:flex;margin-left:30%;">
        <h4 class="modal-title">Reset Password</h4>
        <p class="bg-danger text-white px-3"> <?php 
            if(isset($_SESSION['resetmsg'])){
                echo $_SESSION['resetmsg'];
                $_SESSION['resetmsg'] = "";
            }else{
                $_SESSION['resetmsg'] = "";
            }
        ?> </p>
        <div class="form-group">
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
            <span id="passwordSpan"></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            <span id="confirmPasswordSpan"></span>
        </div>
        
        <input type="submit" id="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Update">  <br>           
        <div class="text-center small">Don't have an account? <a href="../register/registerform.php">Sign up</a></div>
    </form>			
</div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
          $('#passwordSpan').hide();
          $('#confirmPasswordSpan').hide();

          //Password validation start
          $('#password').keyup(function(){
            pass_check();
          });

          function pass_check(){
              var val = $('#password').val();

              if(val.length == ''){
                $('#passwordSpan').show();
                $('#passwordSpan').html('Please fill the field');
                $('#passwordSpan').focus();
                $('#passwordSpan').css("color", "red");
                $('#password').css("border-color", "red");
                password_err = true;
                return false;
              }
              else if(!val.match(
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
      )){
                $('#passwordSpan').show();
                $('#passwordSpan').html('Invalid password');
                $('#passwordSpan').focus();
                $('#passwordSpan').css("color", "red");
                $('#password').css("border-color", "red");
                password_err = true;
                return false;
              }else{
                $('#passwordSpan').hide();
                $('#password').css("border-color", "");
              }
          }
          // Password validation ends
           
          //Confirm Password validation start
           $('#confirmPassword').keyup(function(){
            cnf_pass_check();
          });

          function cnf_pass_check(){
              var val = $('#password').val();
              var con_pass_val = $('#confirmPassword').val();
          

              if(val != con_pass_val){
                $('#confirmPasswordSpan').show();
                $('#confirmPasswordSpan').html("Password didn't match");
                $('#confirmPasswordSpan').focus();
                $('#confirmPasswordSpan').css("color", "red");
                $('#confirmPassword').css("border-color", "red");
                confirmPassword_err = true;
                return false;
              }
              else{
                $('#confirmPasswordSpan').hide();
                $('#confirmPassword').css("border-color", "");
              }
          }
          // Confirm Password validation ends

          $('#submit').click(function(){
            
           password_err = false;
           confirmPassword_err = false;

          pass_check();
          cnf_pass_check();


            if( (password_err == false) && (confirmPassword_err == false) ){
      
              return true
            }else{
              return false;
            }
          });

    });
</script>
<?php 
include('./footer/footer.php');
?>

  
  
  
  
  