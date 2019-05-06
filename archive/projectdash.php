<div class="container">
<div class="row" style="padding-top: 6%;">
    
<div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="card text-white bg-primary">
  <div class="card-header"><?echo querys("SELECT name from projects where id=".$_GET["id"]); ?></div>
  <div class="card-body">
        <?php $userid = $_COOKIE["user"]; if(querys("Select count(id) from projects where userid=".$userid, "count(id)") == 0) {echo '
        
    <h4 class="card-title">It appears your are projectless.</h4>
  
  
        ';
}else{
    echo '<div class="list-group">';

   
$conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM projects where userid=".$userid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="#" class="list-group-item list-group-item-action">'.$row["name"].'<span class="text-muted float-right">Last Edited: 2/3/18 </span>
  </a>';
    }
} else {
    echo "0 results";
}
$conn->close();
 
    echo '</div><br>';
}
        ?>
      <a href="#" class="btn btn-success pull-left" data-toggle="modal" data-target="#newproject"><i class="fas fa-plus"></i> New Project</a>
        </div>
</div>
    </div>
    <div class="col-md-2">
    </div>
</div>
    </div>