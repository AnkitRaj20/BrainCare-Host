<?php
ob_start();
$roomname = $_GET['roomname'];

if ($_SESSION['isLoggedIn'] != 'login') {
    header('location: ../../loginForm.php');
}
$banner_text = "ChatRoom and Event Links";

include("./Header/header.php");

// Connection
include("../../connection/config.php");

$id = $_SESSION['id'];

// Getting the url
$url =  $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$purl = parse_url($url);
$q = $purl['query'];


$q1 = "roomname=" . $_SESSION['gender'];

if ($q == "roomname=boys" || $q == "roomname=girls" || $q == "roomname=others") {
    if ($q != $q1) {
        $_SESSION['roomErr'] = "Cannot Access that room";
        header('location: ./createRoom.php');
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">ChatRoom - <?php echo $roomname; ?> </h4>
                        <p class="card-category">Chat With Your Friends</p>
                    </div>
                    <div class="msgs">
                        <div class="card-body">
                            <div data-bs-spy="scroll" data-bs-smooth-scroll="true" class=" scroll   overflow-x-scroll ">
                            <!-- <div data-bs-spy="scroll" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scroll scrollspy-example bg-light p-3 rounded-2" tabindex="0"> -->

                                <div class="message">
                                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTf-bO3uHEFkNpmTuytSRFBLu5pG3f0MTg-9g&usqp=CAU" alt="Avatar" style="width:100%;">
                            <p>Hello. How are you today?</p>
                            <span class="time-right">11:00</span> -->
                                </div>

                                <div class="message darker">
                                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKJ2nq_kCjAnFNypd6rm42wlBurO0TzAkZDQ&usqp=CAU" alt="Avatar" class="right" style="width:100%;">
                            <p>Hey! I'm fine. Thanks for asking!</p>
                            <span class="time-left">11:01</span> -->
                                </div>

                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Type Your Message</label>
                                    <input type="text" name="message" id="message" class="form-control" required>
                                    <span id="messageSpan"></span>
                                </div>
                                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Send</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ======MEETINGS LINKS================ -->

            <?php
            $sql = "SELECT * FROM meetings where usedFor='$roomname'";
            $result = $conn->query($sql);
            $num = mysqli_num_rows($result);
            ?>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Meeting Links</h4>
                        <p class="card-category">Meeting Links for <?php echo $roomname ?> </p>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table hover table-striped" style="width:100%">
                                <thead class="text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        For
                                    </th>
                                    <th>
                                        Topic
                                    </th>
                                    <th>
                                        Duration
                                    </th>
                                    <th>
                                        URL
                                    </th>
                                    <th>
                                        Password
                                    </th>
                                    <th>
                                        Date
                                    </th>

                                </thead>
                                <tbody>
                                    <?php
                                    if ($num > 0) {

                                        while ($row =  mysqli_fetch_array($result)) {

                                    ?>
                                            <script>
                                                var newDate = new Date("<?php echo $row['date'] ?>");
                                                var nd = newDate.toDateString();
                                            </script>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['usedFor']; ?></td>
                                                <td><?php echo $row['topic']; ?></td>
                                                <td><?php echo $row['duration']; ?></td>
                                                <td> <a href="<?php echo $row['url']; ?>" target="_blank"><?php echo $row['url']; ?></a> </td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php
                                                    echo "<script>document.writeln(nd);</script>";
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <td><?php echo "No Links"; ?></td>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






<!-- <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->

<!-- VALIDATION -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#messageSpan').hide();

        var message_err = false;

        // Message validation start
        $('#message').keyup(function() {
            message_check();
        });

        function message_check() {
            var val = $('#message').val();
            if (val.length == 0) {
                $('#messageSpan').show();
                $('#messageSpan').html('Please fill the field');
                $('#messageSpan').focus();
                $('#messageSpan').css("color", "red");
                $('#message').css("border-color", "red");
                // $('#submit').hide();
                message_err = true;

                return false;
            } else {
                // $('#submit').show();
                $('#messageSpan').hide();
                $('#message').css("border-color", "");


            }
        }
        //Message validation ends


        $('#submit').click(function() {
            message_err = false;
            message_check();
            if ((message_err == false)) {

                return true
            } else {

                return false;
            }
        });

    });
</script>

<script type="text/javascript">
    // ======Check for new msg every 1 second======
    setInterval(runFunction, 1000);

    function runFunction() {
        $.post("./Message/htcont.php", {
                room: '<?php echo $roomname ?>'
            },
            function(data, status) {
                document.getElementsByClassName("scroll")[0].innerHTML = data;

            }
        )
    }
    //  =============  After clicking the send button====================
    $("#submit").click(function() {
        //    If user sends the msg
        var clientmsg = $('#message').val();

        if ($('#message').val() != '') {
            // Clearing the input field
            $('#message').val('');

            $.post("./Message/postmsg.php", {
                    text: clientmsg,
                    room: '<?php echo $roomname ?>',
                    ip: "<?php echo $_SERVER['REMOTE_ADDR'] ?>",
                    name: "<?php echo $_SESSION['name'] ?>"
                }),

                function(data, status) {
                    document.getElementsByClassName('scroll')[0].innerHTML = data;

                }
            return false;
        }
    });



    //============== Enter to submit========
    // Get the input field
    var input = document.getElementById("message");

    // Execute a function when the user presses a key on the keyboard
    input.addEventListener("keypress", function(event) {
        // If the user presses the "Enter" key on the keyboard
        if (event.key === "Enter") {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("submit").click();
        }
    });
</script>





<?php
include("./Footer/footer.php");
?>