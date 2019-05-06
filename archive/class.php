<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
    

    <div class="col-md-8">
       
        <div class="card text-white bg-primary" >
  <div class="card-header"><?php $userclass = querys("SELECT class FROM users WHERE id=".$userid, "class"); echo querys("SELECT name from class where id=".$_GET["id"], "name"); ?><span class="text-muted float-right"><?php echo querys("SELECT school from class where id=".$_GET["id"], "school"); ?></span></div>
  <div class="card-body" style="width:100%;">
      <div class="list-group">
          <?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users where class=".$_GET["id"]." ORDER BY lastname ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       echo '<a href="studentprojects.php?student='.$row["id"].'" class="list-group-item list-group-item-action">'.$row["firstname"].' '.$row["lastname"].'</a>';
    }
} else {
    echo "No Students";
}
$conn->close();
 
      ?>
  
     

        </div>
     
      </div>
</div>
    </div>
    <div class="col-md-4">
    <div class="card text-white bg-primary" >
  <div class="card-header">Classes</div>
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

</div>
    </div>

<?php include "footer.php"; ?>
