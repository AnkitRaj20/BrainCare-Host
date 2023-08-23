<?php 
include("../../../connection/config.php");
include("./api.php");
include("./config.php");


$for=$_POST['for'];
$topic=$_POST['topic'];
$duration=$_POST['duration'];
$date=$_POST['date'];
$password=$_POST['password'];

$datetimeValue = $date;
$datetime = new DateTime($datetimeValue);

// Output the formatted datetime
$newDate = $datetime->format('Y-m-d H:i:s');
echo $newDate;

$arr['for']=$for;
$arr['topic']=$topic;
$arr['start_date']=$newDate;
$arr['password']=$password;
$arr['duration']=$duration;
// 2 for schedule meeting
$arr['type'] = '2';



$result = createMeeting($arr);

$data = json_encode($result);

if(isset($result->id)){
    print_r($result);
    $url = $result->join_url;
    $time = $result->duration;
    $pass=$result->password;
    $start=$result->start_time;

  

    echo '<Pre>';
    echo "Topic".$result->topic."<br/>";
    echo "For".$result->for."<br/>";
    echo "Join URL:".$result->join_url."<br/>";
    echo "Duration:".$result->duration."<br/>";
    echo "Password:".$result->password."<br/>";
    echo "Date".$result->start_time."<br/>";
}
 else{
    echo "<Pre>";
    print_r($data);
 }


 $sql="INSERT INTO `meetings` (`usedFor`, `topic`, `url`, `duration`, `password`, `date`) VALUES ('$for', '$topic', '$url', '$time', '$pass', '$newDate');";

  if ($result = mysqli_query($conn, $sql)) {
    ?>
    <script>
       window.location.href = 'http://64.227.133.196/dashboard/dashboard/viewMeeting.php';
    </script>
    <?php
  }else{
    echo "error".$conn->error;
  }

?>