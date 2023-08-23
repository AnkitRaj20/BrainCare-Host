<?php
session_start();
ob_start();

if ($_SESSION['isLoggedIn'] != 'login') {
  header('location: ../../loginForm.php');
}
$banner_text = "Create Events";
include("./Header/header.php");

// Connection
include("../../connection/config.php");

$id = $_SESSION['id'];
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">

            <h4 class="card-title">Create Events</h4>
            <p class="card-category">Create your new zoom meeting</p>
          </div>
          <div class="card-body">
            <form action="./zoom/generateLink.php" method="POST">
              <div class="col-md-12">
                

                <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                        <label class="bmd-label-floating">For</label>
                    <select class="form-control" name="for" id="for">
                      <option value="all">All</option>
                      <option value="student">Students</option>
                      <option value="boys">Male</option>
                      <option value="girls">Female</option>
                      <option value="others">Others</option>
                    </select>
                        </div>
                      </div>
                     
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="bmd-label-floating">Topic</label>
                      <input type="text" name="topic" id="topic" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="bmd-label-floating">Duration</label>
                      <input type="number" name="duration" id="duration" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                        <label for="date">Date</label>
                      <input type="datetime-local" name="date" id="date" class="form-control" required>
                        </div>
                      </div>
                     
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                <span id="roomSpan"></span>
              </div>
              </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#roomSpan').hide();

    var room_err = false;

    $('#room').keyup(function() {
      roomName_check();
    });

    function roomName_check() {
      var value = $('#room').val();

      if (value.length == '') {
        $('#roomSpan').show();
        $('#roomSpan').html('Please enter room name');
        $('#roomSpan').focus();
        $('#roomSpan').css("color", "red");
        $('#roomSpan').css("border-color", "red");

        room_err = true;
        return false;
      } else if (value.length < 2 || value.length > 30) {
        $('#roomSpan').show();
        $('#roomSpan').html('Please Choose an name between 2 to 30 characters.');
        $('#roomSpan').focus();
        $('#roomSpan').css("color", "red");
        $('#roomSpan').css("border-color", "red");

        room_err = true;
        return false;
      } else {
        $('#roomSpan').hide();
        $('#roomSpan').css("border-color", "");
      }
    }

    $('#submit').click(function() {
      room_err = false;

      roomName_check();

      if (room_err == false) {
        return true;
      } else {
        return false;
      }
    })
  })
</script>

<?php
include("./Footer/footer.php");
?>