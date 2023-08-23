<?php 
session_start();
  $banner_text = "Feedback List";
  include("./Header/header.php");

  // Connection
  include("../../connection/config.php");

  $sql = "SELECT * FROM contact";
  $result = $conn->query($sql);
  $num = mysqli_num_rows($result);

  ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Feedback Messages</h4>
                  <p class="card-category">See All Messages Here</p>
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
                          Subject
                        </th>
                        <th>
                         Message
                        </th>
                        <th>
                          Date
                        </th>
                      </thead>
                      <tbody>
                      <?php
if($num > 0){

while($row=  mysqli_fetch_array($result))
{
    
    ?>
    <script>
        var newDate = new Date("<?php echo $row['date'] ?>");
        var nd = newDate.toDateString();

    </script>
<tr>
   <td><?php echo $row['cId']; ?></td>
   <td><?php echo $row['name']; ?></td>
   <td><?php echo $row['email']; ?></td>
   <td><?php echo $row['subject'] ;?></td>
   <td><?php echo $row['message'] ;?></td>
   <td><?php
   echo "<script>document.writeln(nd);</script>";
?>
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