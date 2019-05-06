<div class="container">
<div class="row" style="padding-top: 6%;">
    
<div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="card text-white bg-primary">
  <div class="card-header"><a href="index.php" class="text-secondary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;&nbsp;Archived Projects</div>
  <div class="card-body">
        <?php
    echo '<div class="list-group">';

   
$conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM archivedproject where userid=".$userid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="recoverproject.php?pid='.$row["id"].'" class="list-group-item list-group-item-action">'.$row["name"].'</a>';
    }
} else {
    echo "0 results";
}
$conn->close();
 
    echo '</div><br>';

        ?>
     
        </div>
</div>
    </div>
    <div class="col-md-2">
    </div>
</div>
    </div>