<?php
session_start();
include("./Header/header.php");
?>

<section class="login">
    <div class="login-form">
        <form action="./Backend/login.php" method="POST">
        <img class="loginimg" src="./img/user.png" alt="img" width="35%" style="display:flex;margin-left:30%;">
            <h4 class="modal-title">
                Login To Your Account
            </h4>

            <p class="bg-danger text-white text-center px-3"> <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                $_SESSION['msg'] = "";
            }else{
                $_SESSION['msg'] = "";
            }
        ?> </p>
           

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required >
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div class="form-group small clearfix">
            <!-- <label class="checkbox-inline"><input type="checkbox" name="rememberme"> Remember me</label> -->
            <a href="./forgotPassword.php" class="forgot-link">Forgot Password?</a>
        </div> 

            <input type="submit" class="btn btn-outline-info btn-block btn-lg text-white justify-content-center" value="Login">
            <br>
            <div class="text-center small m-3">Don't have an account?
                <a href="registerForm.php">Sign up</a>
            </div>
        </form>
    </div>
</section>

<?php
include("./Footer/footer.php")
?>