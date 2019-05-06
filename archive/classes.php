<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
    

   <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="card text-white bg-primary" >
  <div class="card-header">Your Classes</div>
  <div class="card-body">
   <div class="list-group">
          <?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM class where teacherid=".$userid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       echo '<a href="class.php?id='.$row["id"].'" class="list-group-item list-group-item-action">'.$row["name"].'</a>';
    }
} else {
    echo "No Classes";
}
$conn->close();
 
      ?>
</div>
  
  </div>
</div>
    </div>
<div class="col-md-2"></div>
</div>
    </div>

<?php include "footer.php"; ?>
