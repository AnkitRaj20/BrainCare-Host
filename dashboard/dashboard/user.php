<?php 
  session_start();
  ob_start();

  if($_SESSION['isLoggedIn'] != 'login'){
    header('location: ../../loginForm.php');

    
  }
  
 

  $banner_text = "User Profile";
  include("./Header/header.php");

  // Connection
  include("../../connection/config.php");

  $id = $_SESSION['id'];
  $sql = "SELECT * FROM register where id = $id";

  $result = $conn->query($sql);
  $num = mysqli_num_rows($result);
  
  
  if(isset($_POST['submit'])){
    // $id = $_GET['id'];
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $mobile = $_POST['mobile'];
    $setEmail = $_POST['email'];
    $gender = $_POST['gender'];
    $addr = $_POST['address'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];

    $sql = "UPDATE `register` SET `id`=$id,`firstName`='$firstName',`middleName`='$middleName',`lastName`='$lastName',`mobile`=$mobile,`email`='$setEmail',`addr`='$addr',`street`='$street',`city`='$city',`state`='$state',`pin`=$pin WHERE id = $id";

    // $query = mysqli_query($conn, $sql);
    if($conn -> query($sql) === TRUE) {
// echo " Updated Successfully";
header('location:http://64.227.133.196/dashboard/dashboard/user.php');

?>
          <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> Profile Updated </b></span>
                  </div>
      <?php
    }

else
// echo "Error Updating Table".$conn->error;
?>
  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>
                      <b> This Email  is Already Registered.</b></span>
                  </div>
  <script>
  alert(" This Email  is Already Registered.");
  window.location.replace("http://64.227.133.196/dashboard/dashboard/user.php");
  </script>
<?php
}
  ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <?php 
                      if($num > 0){
                        
                        while($row= mysqli_fetch_array($result))
                        {
                           $_SESSION['name'] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
                           $_SESSION['gender'] = $row['gender'];
                          ?>
                          <div class="row">
                        
                        
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Company (disabled)</label>
                          <input required type="text" value="BrainCare" class="form-control" disabled>
                        </div>
                      </div>
                      <!-- <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input required type="text" class="form-control">
                        </div>
                      </div> -->
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input  type="email" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                        </div>
                        <span id="emailSpan"></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName']; ?>" class="form-control" required>
                          <span id="firstNameSpan"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input  type="text" id="middleName" name="middleName" value="<?php echo $row['middleName']; ?>" class="form-control">
                          <span id="middleNameSpan"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input required type="text" id="lastName" name="lastName" value="<?php echo $row['lastName']; ?>" class="form-control">
                        </div>
                        <span id="lastNameSpan"></span>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <input required type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>" disabled class="form-control">
                        </div>
                        <span id="genderSpan"></span>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Occupation</label>
                          <input required type="text" id="occupation" name="occupation" value="<?php echo $row['occupation']; ?>" class="form-control">
                        </div>
                        <span id="genderSpan"></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mobile Number</label>
                          <input required type="number" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control">
                          <span id="mobileSpan"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input required type="text" id="address" name="address" value="<?php echo $row['addr']; ?>" class="form-control">
                          <span id="addressSpan"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Street</label>
                          <input required type="text" id="street" name="street" value="<?php echo $row['street']; ?>" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input required type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input required type="text" name="state" value="<?php echo $row['state']; ?>" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">PIN Code</label>
                          <input required type="number" id="pin" name="pin" value="<?php echo $row['pin']; ?>" class="form-control">
                          <span id="pinSpan"></span>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                            <textarea class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>

                    <!-- Closing php -->
                    <?php
                        }
                        }
                    ?>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <!-- <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div> -->
                <div class="card-body">
                  <h6 class="card-category text-dark"><b> <u> Volunteer </u></b></h6>
                  <h4 class="card-title"> <b>Name: </b> <?php echo $_SESSION['name']; ?> </h4>
                  <h4 class="card-title"> <b>Email: </b> <?php echo $_SESSION['email']; ?> </h4>
                  <p class="card-description">
                  Keep Your Brain Healthy
                  </p>
                  <!-- <a href="javascript:;" class="btn btn-primary btn-round">Follow</a> -->
                 
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- VALIDATION -->
      <script type="text/javascript">
      $(document).ready(function(){
          $('#firstNameSpan').hide();
          $('#middleNameSpan').hide();
          $('#lastNameSpan').hide();
          $('#mobileSpan').hide();
          $('#emailSpan').hide();
          $('#pinSpan').hide();

          var fName_err = false;
          var mName_err = false;
          var lName_err = false;
          var mobile_err = false;
          var email_err = false;
          var pin_err = false;


          // First Name validation start
          $('#firstName').keyup(function(){
            fName_check();
          });

          function fName_check(){
              var val = $('#firstName').val();
             
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

          $('#submit').click(function(){
             fName_err = false;
           mName_err = false;
           lName_err = false;
           mobile_err = false;
           email_err = false;
           pin_err = false;

          fName_check();
          mName_check();
          lName_check();
          mobile_check();
          email_check();
          pin_check();


            if( (fName_err == false) && (mName_err == false) && (lName_err == false) && (mobile_err == false) && (email_err == false) && (pin_err == false) ){
             
              return true
            }else{
              return false;
            }
          });
          
        });
    </script>
     
      <?php 
  include("./Footer/footer.php");
  ?>