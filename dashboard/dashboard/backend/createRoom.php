<?php
session_start();
$room = $_POST['room'];

// Connection
include("../../../connection/config.php");

if (strlen($room) > 30 || strlen($room) < 2) {
?>
    <script>
        window.location.href = 'http://64.227.133.196/dashboard/dashboard/createRoom.php';
    </script>

    <?php
}

//    Query
$sql = "SELECT * FROM rooms WHERE name='$room'";

// Query Execute
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "error";
        $_SESSION['roomErr'] = "This room name is not available.Please choose different room";
    ?>
        <script>
            window.location.href = 'http://64.227.133.196/dashboard/dashboard/createRoom.php';
        </script>
        <?php
    } else {
        $sql = "INSERT INTO `rooms` (`name`, `time`) VALUES ( '$room', CURRENT_TIMESTAMP)";

        if (mysqli_query($conn, $sql)) {
            $message = "Your room is ready.Chat now";
            // echo $message;
            echo '<script language="javascript">';
            // echo 'alert("'.$message.'");';
            echo 'window.location.href="http://64.227.133.196/dashboard/dashboard/room.php?roomname=' . $room . '"';
            echo '</script>';
        } else {
        ?>
            <script>
                $_SESSION['roomErr'] = "Your room is not ready.Please try again later";
                window.location.href = 'http://64.227.133.196/dashboard/dashboard/createRoom.php';
            </script>
<?php
        }
    }
} else {
    echo "error" . mysqli_error($conn);
}


?>