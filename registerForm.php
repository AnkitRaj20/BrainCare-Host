<?php
include("./Header/header.php");
?>

<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Register</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Register</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->

<!-- Register Form Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-xl-4 col-lg-6 wow slideInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded h-100 p-5">
                    <div class="section-title">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Contact Us</h5>
                        <h1 class="display-6 mb-4">Feel Free To Contact Us</h1>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h5 class="mb-0">Our Office</h5>
                            <span>1, Galgotia College, Greater Noida, India</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h5 class="mb-0">Email Us</h5>
                            <span>braincare@gmail.com</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h5 class="mb-0">Call Us</h5>
                            <span>+918825298311</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                <h1 class="text-center m-2">Join Us</h1>
                <form action="./Backend/register.php" method="POST">
                    <div class="row g-3">
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="firstName" id="firstName" placeholder="First Name" style="height: 55px;"required>
                            <span id="firstNameSpan"> 
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="middleName" id="middleName" placeholder="Middle Name" style="height: 55px;" >
                            <span id="middleNameSpan"> 
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="lastName" placeholder="Last Name" id="lastName" style="height: 55px;"required>
                            <span id="lastNameSpan"> 
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control border-0 bg-light px-4" placeholder="Mobile Number" id="mobile" name="mobile" style="height: 55px;"required>
                            <span id="mobileSpan"></span>
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" id="email" name="email" style="height: 55px;"required>
                            <span id="emailSpan"></span>
                        </div>
                        <div class="col-6">
                            <label for="gender:" class="form-label">Gender</label><br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="boys" value="boys" checked required>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="girls">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="others" value="others">
                                <label class="form-check-label" for="inlineRadio3">Others</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="occupation:" class="form-label">Occupation</label><br />
                            <select class="form-select" id="occupation" name="occupation" aria-label="Default select example" required>
        
                                <option value="student">Student</option>
                                <option value="business">Business</option>
                                <option value="job">Job</option>
                            </select>
                        </div>
                        <div class="col-8">
                            <input type="text" class="form-control border-0 bg-light px-4" name="address" id="address" placeholder="Address" style="height: 55px;" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="street" id="street" placeholder="Street" style="height: 55px;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="city" id="city" placeholder="City" style="height: 55px;" required>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control border-0 bg-light px-4" name="state" id="state" placeholder="State" style="height: 55px;"required>
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control border-0 bg-light px-4" name="pin" id="pin" placeholder="Pin Code" style="height: 55px;"required>
                            <span id="pinSpan"></span>
                        </div>

                        <div class="col-6">
                            <input type="password" class="form-control border-0 bg-light px-4" name="password" id="password" placeholder="Password" style="height: 55px;"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                      <span id="passwordSpan"></span>
                        </div>
                        <div class="col-6">
                            <input type="password" class="form-control border-0 bg-light px-4" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" style="height: 55px;"required>
                            <span id="confirmPasswordSpan"></span>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit" id="submitbtn">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="col-xl-2 col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div> -->
        </div>
    </div>
</div>
<!-- Register Form End -->

<script>
      function showPassword() {
var x = document.getElementById("password");
var y = document.getElementById("confirmPassword");

if (x.type === "password") {
  x.type = "text";
} else {
  x.type = "password";
}

if (y.type === "password") {
  y.type = "text";
} else {
  y.type = "password";
}  
}
    </script>

    <!-- JQUERY cdn -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<!-- validation -->
    <script type="text/javascript">
        // console.log("working")
        $(document).ready(function(){
          $('#firstNameSpan').hide();
          $('#middleNameSpan').hide();
          $('#lastNameSpan').hide();
          $('#mobileSpan').hide();
          $('#emailSpan').hide();
          $('#pinSpan').hide();
          $('#passwordSpan').hide();
          $('#confirmPasswordSpan').hide();

          var fName_err = false;
          var mName_err = false;
          var lName_err = false;
          var mobile_err = false;
          var email_err = false;
          var pin_err = false;
          var password_err = false;
          var confirmPassword_err = false;


          // First Name validation start
          $('#firstName').keyup(function(){
            fName_check();
          });

          function fName_check(){
              var val = $('#firstName').val();
            //   alert(val);

              if(val.length == ''){
                $('#firstNameSpan').show();
                $('#firstNameSpan').html('Please fill the field');
                $('#firstNameSpan').focus();
                $('#firstNameSpan').css("color", "red");
                $('#firstName').css("border-color", "red");
                fName_err = true;
                return false;
              }
              else if(!val.match('^[a-zA-Z]{2,48}$')){
                // alert(val);
                $('#firstNameSpan').show();
                $('#firstNameSpan').html('Invalid Name');
                $('#firstNameSpan').focus();
                $('#firstNameSpan').css("color", "red");
                $('#firstName').css("border-color", "red");
                fName_err = true;
                return false;
              }else{
                $('#firstNameSpan').hide();
                $('#firstName').css("border-color", "");
              }
          }
          // First Name validation ends
          
          // Middle Name validation start
          $('#middleName').keyup(function(){
            mName_check();
          });

          function mName_check(){
              var val = $('#middleName').val();

              if(val.length != '' && !val.match('^[a-zA-Z]{2,48}$')){
                // alert(val);
                $('#middleNameSpan').show();
                $('#middleNameSpan').html('Invalid Name');
                $('#middleNameSpan').focus();
                $('#middleNameSpan').css("color", "red");
                $('#middleName').css("border-color", "red");
                mName_err = true;
                return false;
              }else{
                $('#middleNameSpan').hide();
                $('#middleName').css("border-color", "");
              }
          }
          // Middle Name validation ends

          // Last Name validation start
          $('#lastName').keyup(function(){
            lName_check();
          });

          function lName_check(){
              var val = $('#lastName').val();
              // alert(val);

              if(val.length == ''){
                $('#lastNameSpan').show();
                $('#lastNameSpan').html('Please fill the field');
                $('#lastNameSpan').focus();
                $('#lastNameSpan').css("color", "red");
                $('#lastName').css("border-color", "red");
                lName_err = true;
                return false;
              }
              else if(!val.match('^[a-zA-Z]{2,48}$')){
                // alert(val);
                $('#lastNameSpan').show();
                $('#lastNameSpan').html('Invalid Name');
                $('#lastNameSpan').focus();
                $('#lastNameSpan').css("color", "red");
                $('#lastName').css("border-color", "red");
                lName_err = true;
                return false;
              }else{
                $('#lastNameSpan').hide();
                $('#lastName').css("border-color", "");
              }
          }
          // Last Name validation ends

           // Mobile validation start
           $('#mobile').keyup(function(){
            mobile_check();
          });

          function mobile_check(){
              var val = $('#mobile').val();
              // alert(val);

              if(val.length == ''){
                $('#mobileSpan').show();
                $('#mobileSpan').html('Please fill the field');
                $('#mobileSpan').focus();
                $('#mobileSpan').css("color", "red");
                $('#mobile').css("border-color", "red");
                mobile_err = true;
                return false;
              }
              else if(val.length != 10){
                // alert(val);
                $('#mobileSpan').show();
                $('#mobileSpan').html('Invalid Mobile Number');
                $('#mobileSpan').focus();
                $('#mobileSpan').css("color", "red");
                $('#mobile').css("border-color", "red");
                mobile_err = true;
                return false;
              }else{
                $('#mobileSpan').hide();
                $('#mobile').css("border-color", "");
              }
          }
          // Mobile validation ends

          // Email Name validation start
          $('#email').keyup(function(){
            email_check();
          });

          function email_check(){
              var val = $('#email').val();
              
              // alert(val);

              if(val.length == ''){
                $('#emailSpan').show();
                $('#emailSpan').html('Please fill the field');
                $('#emailSpan').focus();
                $('#emailSpan').css("color", "red");
                $('#email').css("border-color", "red");
                email_err = true;
                return false;
              }
              else if(!val.match(
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      )){
                // alert(val);
                $('#emailSpan').show();
                $('#emailSpan').html('Invalid Email');
                $('#emailSpan').focus();
                $('#emailSpan').css("color", "red");
                $('#email').css("border-color", "red");
                email_err = true;
                return false;
              }else{
                $('#emailSpan').hide();
                $('#email').css("border-color", "");
              }
          }
          // Email validation ends

          // Pin validation start
          $('#pin').keyup(function(){
            pin_check();
          });

          function pin_check(){
              var val = $('#pin').val();
              // alert(val);

              if(val.length == ''){
                $('#pinSpan').show();
                $('#pinSpan').html('Please fill the field');
                $('#pinSpan').focus();
                $('#pinSpan').css("color", "red");
                $('#pin').css("border-color", "red");
                pin_err = true;
                return false;
              }
              else if(val.length != 6){
                // alert(val);
                $('#pinSpan').show();
                $('#pinSpan').html('Invalid Pin Code');
                $('#pinSpan').focus();
                $('#pinSpan').css("color", "red");
                $('#pin').css("border-color", "red");
                pin_err = true;
                return false;
              }else{
                $('#pinSpan').hide();
                $('#pin').css("border-color", "");
              }
          }
          // Pin validation ends

           //Password validation start
           $('#password').keyup(function(){
            pass_check();
          });

          function pass_check(){
              var val = $('#password').val();
              // alert(val);

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
                // alert(val);
                $('#passwordSpan').show();
                $('#passwordSpan').html('Must Contain Capital Letter,small letter, numbers and should be of 8 characteres. No special Character allowed');
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
              // alert(val);

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


          $('#submitbtn').click(function(){
             fName_err = false;
           mName_err = false;
           lName_err = false;
           mobile_err = false;
           email_err = false;
           pin_err = false;
           password_err = false;
           confirmPassword_err = false;

          fName_check();
          mName_check();
          lName_check();
          mobile_check();
          email_check();
          pin_check();
          pass_check();
          cnf_pass_check();

            // alert('second check');

            if( (fName_err == false) && (mName_err == false) && (lName_err == false) && (mobile_err == false) && (email_err == false) && (pin_err == false) &&  (password_err == false) && (confirmPassword_err == false) ){
              // alert('true')
              return true
            }else{
              // alert('wrong')
              return false;
            }
          });
          
        });
    </script>



<?php
include("./Footer/footer.php");
?>