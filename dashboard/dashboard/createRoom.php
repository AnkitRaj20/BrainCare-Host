<?php 
  session_start();
  ob_start();

  if($_SESSION['isLoggedIn'] != 'login'){
    header('location: ../../loginForm.php');
}
  $banner_text = "Create Room";
  include("./Header/header.php");

  // Connection
  include("../../connection/config.php");

  $id = $_SESSION['id'];
  ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                
                  <h4 class="card-title">Create Room</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                        <form action="./backend/createRoom.php" method="POST">
                        <div class="col-md-12">
                            <div class="form-group">
                          <label class="bmd-label-floating">Enter Your ChatRoom Name</label>
                          <input  type="text" name="room" id="room"  class="form-control" required>
                          </div>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Create Room</button>
                        <span id="roomSpan"></span>
                        </div>
        <div class="col-md-12 text-center py-3 mt-2">
                        <p class="d-flex justify-content-center align-items-center text-danger text-center px-3"> <?php 
            if(isset($_SESSION['roomErr'])){
                echo $_SESSION['roomErr'];
                $_SESSION['roomErr'] = "";
            }else{
                $_SESSION['roomErr'] = "";
            }
        ?> </p>

        </div>
                        </form>
                </div>
              </div>
            </div>
         
          </div>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#roomSpan').hide();

          var room_err = false;

          $('#room').keyup(function(){
            roomName_check();
          });

          function roomName_check(){
            var value = $('#room').val();

            if(value.length == ''){
              $('#roomSpan').show();
              $('#roomSpan').html('Please enter room name');
              $('#roomSpan').focus();
              $('#roomSpan').css("color", "red");
              $('#roomSpan').css("border-color","red");

              room_err =true;
              return false;
            }
            else if(value.length<2 || value.length>30){
              $('#roomSpan').show();
              $('#roomSpan').html('Please Choose an name between 2 to 30 characters.');
              $('#roomSpan').focus();
              $('#roomSpan').css("color", "red");
              $('#roomSpan').css("border-color","red");

              room_err =true;
              return false;
            }
            else{
              $('#roomSpan').hide();
              $('#roomSpan').css("border-color","");
            }
          }

          $('#submit').click(function(){
            room_err =false;

            roomName_check();

            if(room_err == false){
              return true;
            }
            else{
              return false;
            }
          })
        })
      </script>

      <?php 
  include("./Footer/footer.php");
  ?>