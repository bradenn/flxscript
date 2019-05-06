<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
    

    <div class="col-md-12">
         <div class="card text-white bg-primary" >
  <div class="card-header"><a href="project.php?id=<?php echo $_GET["id"]; ?>" class="text-secondary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;&nbsp;<?echo querys("SELECT name from projects where id=".$_GET["id"], "name"); ?> - Crew<span class="text-muted float-right">Organize your crew members</span></div>
  <div class="card-body" style="width:100%;">
        
        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newcrew"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Crew Members</a> <br><br>
       <table class="table table-hover" style="color:#fff;">
  <thead>
    <tr>
     
      <th scope="col">Name</th>
      <th scope="col">Position</th>
     
      <th scope="col">Contact</th>
        <th scope="col">Actions</th>
     
    </tr>
  </thead>
  <tbody>
    <tr class="table-active">
      <?php 
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM crew where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        echo '<tr><td style="border-top:1px solid #fff;">'.$row["firstname"].' '.$row["lastname"].'</td>';
        echo '<td style="border-top:1px solid #fff;">'.$row["position"].'</td>';
     
        echo '<td style="border-top:1px solid #fff;">'.$row["contact"].'</td>';
        echo '<td style="border-top:1px solid #fff;"><a href="deletecrew.php?id='.$_GET["id"].'&&pid='.$row["id"].'" class="text-danger"><i class="fas fa-trash-alt"></i></a></td></tr>';
    
    }
} else {
    echo '<td style="border-top:1px solid #fff;">It appears you don\'t have a crew..</td><td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;"></td>';
}
$conn->close();
 
   
 ?>
    </tr>
  
  </tbody>
</table> 
    </div>
  </div>
     
      </div>
</div>
    </div>

<?php include "footer.php"; ?>
