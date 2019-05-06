<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
    

    <div class="col-md-8">
       
        <div class="card text-white bg-primary" >
            
  <div class="card-header"><a href="class.php?id=<?php echo querys("Select class from users where id=".$_GET["student"], "class"); ?>" class="text-secondary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;&nbsp;<?php echo querys("SELECT firstname from users where id=".$_GET["student"], "firstname").' '.querys("SELECT lastname from users where id=".$_GET["student"], "lastname"); ?></div>
            
  <div class="card-body" style="width:100%;">
      <div class="list-group">
 <?php  if(querys("Select count(id) from projects where userid=".$_GET["student"], "count(id)") == 0) {echo '
        
    <h4 class="card-title">It appears your are projectless.</h4><span style="text-transform:uppercase;">Don\'t be projectless. Get started now!</span><br><br>
  
  
        ';
}else{
    echo '<div class="list-group">';

   
$conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM projects where userid=".$_GET["student"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="project.php?id='.$row["id"].'" class="list-group-item list-group-item-action">'.$row["name"].'<span class="text-muted float-right"></span>
  </a>';
    }
} else {
    echo "0 results";
}
$conn->close();
 
    echo '</div><br>';
}
        ?>

        </div>
     
      </div>
</div>
    </div>
    <div class="col-md-4">
    <div class="card text-white bg-primary" >
  <div class="card-header">Menu</div>
  <div class="card-body">
   <div class="list-group">

  <a href="#" class="list-group-item list-group-item-action disabled">Actors<span class="float-right text-muted">IN DEVELOPMENT</span>
  </a>
  <a href="#" class="list-group-item list-group-item-action disabled">Friends<span class="float-right text-muted">IN DEVELOPMENT</span>
  </a>
 
</div>
  
  </div>
</div>
    </div>

</div>
    </div>

<?php include "footer.php"; ?>
