<?php 
session_start();
  $banner_text = "All Users";
  include("./Header/header.php");

  // Connection
  include("../../connection/config.php");

  $sql = "SELECT * FROM register";
  $result = $conn->query($sql);
  $num = mysqli_num_rows($result);

  ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Users</h4>
                  <p class="card-category">See All Users Here</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="transactionTable" >
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                         Email
                        </th>
                        <th>
                          Gender
                        </th>
                        <th>
                         Occupation
                        </th>
                        <th>
                          Mobile Number
                        </th>
                        <th>
                          Registered Date
                        </th>
                      </thead>
                      <tbody>
                      <?php
if($num > 0){

while($row=  mysqli_fetch_array($result))
{
    $name =  $row['firstName']. " " . $row['middleName']." " . $row['lastName'];
    ?>
    <script>
        var newDate = new Date("<?php echo $row['regDate'] ?>");
        var nd = newDate.toDateString();
    </script>
<tr>
   <td><?php echo $row['id']; ?></td>
   <td><?php echo $name; ?></td>
   <td><?php echo $row['email']; ?></td>
   <td><?php echo $row['gender'] ;?></td>
   <td><?php echo $row['occupation'] ;?></td>
   <td><?php echo $row['mobile'] ;?></td>
   <td><?php  echo "<script>document.write(nd);</script>"; ?></td>
</td>
</tr>
<?php
}
}
else{
  ?>
  <td><?php echo "No Messages"; ?></td>

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