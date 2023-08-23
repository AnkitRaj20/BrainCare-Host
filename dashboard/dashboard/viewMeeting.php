<?php
session_start();
$banner_text = "Join Events";
include("./Header/header.php");

// Connection
include("../../connection/config.php");

$sql = "SELECT * FROM meetings where usedFor='all' order by id DESC";
$result = $conn->query($sql);
$num = mysqli_num_rows($result);

?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Meeting Links</h4>
                        <p class="card-category">See All Meetings Here</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- <table class="table" id="transactionTable" > -->
                            <!-- <thead class=" text-primary"> -->
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


<?php
include("./Footer/footer.php");
?>