<?php 
  session_start();
  ob_start();

  if($_SESSION['isLoggedIn'] != 'login'){
    header('location: ../../loginForm.php');
}
  $banner_text = "Chat";
  include("./Header/header.php");

  // Connection
  include("../../connection/config.php");

  $id = $_SESSION['id'];
  $sql = "SELECT * FROM register where id = $id";
  // echo $sql;

  $result = $conn->query($sql);
  $num = mysqli_num_rows($result);
  // echo $num;
  
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
header('location:http://64.227.133.196/dashboard/user.php');

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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                
                  <h4 class="card-title">ChatRoom</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">

                </div>
              </div>
            </div>
         
          </div>
        </div>
      </div>

      <?php 
  include("./Footer/footer.php");
  ?>