<?php
session_start();
ob_start();

if ($_SESSION['isLoggedIn'] != 'login') {
    header('location: ../../loginForm.php');
}
$banner_text = "Share Story";
include("./Header/header.php");

// Connection
include("../../connection/config.php");

$id = $_SESSION['id'];
// echo $sql;

$result = $conn->query($sql);
$num = mysqli_num_rows($result);
?>




<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">

                        <h4 class="card-title">Share Story</h4>
                        <p class="card-category">Share your story to inspire others</p>
                    </div>
                    <div class="card-body">
                        <form action="./backend/shareStory.php" method="POST">
                            <?php
                            if ($num > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                            ?>
                                    <div class="row">
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
                                                <input type="text" id="middleName" name="middleName" value="<?php echo $row['middleName']; ?>" class="form-control">
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
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Topic</label>
                                                <input required type="text" id="topic" name="topic" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"> Write your story here</label>
                                                    <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Share</button>
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
        </div>
    </div>
</div>

<!-- VALIDATION -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#firstNameSpan').hide();
        $('#middleNameSpan').hide();
        $('#lastNameSpan').hide();

        var fName_err = false;
        var mName_err = false;
        var lName_err = false;

        // First Name validation start
        $('#firstName').keyup(function() {
            fName_check();
        });

        function fName_check() {
            var val = $('#firstName').val();

            if (val.length == '') {
                $('#firstNameSpan').show();
                $('#firstNameSpan').html('Please fill the field');
                $('#firstNameSpan').focus();
                $('#firstNameSpan').css("color", "red");
                $('#firstName').css("border-color", "red");
                fName_err = true;
                return false;
            } else if (!val.match('^[a-zA-Z]{2,48}$')) {

                $('#firstNameSpan').show();
                $('#firstNameSpan').html('Invalid Name');
                $('#firstNameSpan').focus();
                $('#firstNameSpan').css("color", "red");
                $('#firstName').css("border-color", "red");
                fName_err = true;
                return false;
            } else {
                $('#firstNameSpan').hide();
                $('#firstName').css("border-color", "");
            }
        }
        // First Name validation ends

        // Middle Name validation start
        $('#middleName').keyup(function() {
            mName_check();
        });

        function mName_check() {
            var val = $('#middleName').val();

            if (val.length != '' && !val.match('^[a-zA-Z]{2,48}$')) {

                $('#middleNameSpan').show();
                $('#middleNameSpan').html('Invalid Name');
                $('#middleNameSpan').focus();
                $('#middleNameSpan').css("color", "red");
                $('#middleName').css("border-color", "red");
                mName_err = true;
                return false;
            } else {
                $('#middleNameSpan').hide();
                $('#middleName').css("border-color", "");
            }
        }
        // Middle Name validation ends

        // Last Name validation start
        $('#lastName').keyup(function() {
            lName_check();
        });

        function lName_check() {
            var val = $('#lastName').val();

            if (val.length == '') {
                $('#lastNameSpan').show();
                $('#lastNameSpan').html('Please fill the field');
                $('#lastNameSpan').focus();
                $('#lastNameSpan').css("color", "red");
                $('#lastName').css("border-color", "red");
                lName_err = true;
                return false;
            } else if (!val.match('^[a-zA-Z]{2,48}$')) {

                $('#lastNameSpan').show();
                $('#lastNameSpan').html('Invalid Name');
                $('#lastNameSpan').focus();
                $('#lastNameSpan').css("color", "red");
                $('#lastName').css("border-color", "red");
                lName_err = true;
                return false;
            } else {
                $('#lastNameSpan').hide();
                $('#lastName').css("border-color", "");
            }
        }
        // Last Name validation ends




        $('#submit').click(function() {
            fName_err = false;
            mName_err = false;
            lName_err = false;

            fName_check();
            mName_check();
            lName_check();


            if ((fName_err == false) && (mName_err == false) && (lName_err == false)) {
                return true
            } else {
                return false;
            }
        });

    });
</script>

<?php
include("./Footer/footer.php");
?>