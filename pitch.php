<?php include "header.php"; ?>

<?php
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){ 
    
}else{
    if(querys("SELECT account from users where id=".$userid,"account") == 3){
        
    }else{
    header("Location: index.php");
    }
    }?>
<div class="container">
<div class="row" style="padding-top: 6%;">
    

    <div class="col-md-12">
        <h2><a href="project.php?id=<?php echo $_GET["id"]; ?>" class="text-primary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;<?echo querys("SELECT name from projects where id=".$_GET["id"], "name"); ?></h2>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newcharacter"><i class="fas fa-user"></i>&nbsp;&nbsp;Add Character</a><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newlocation"><i class="fas fa-map"></i>&nbsp;&nbsp;Add Location</a><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newprop"><i class="fas fa-fire"></i>&nbsp;&nbsp;Add Prop</a><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newpitch"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Add Pitch</a><br><br>
        
        
 
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-primary">
  <div class="card-header">Characters</div>
  <div class="card-body" style="overflow: auto;
max-height: 500px;">
<?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM characters where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       echo '<div style="border-bottom: 1px solid #fff;"><span>'.$row["firstname"].' '.$row["lastname"].'</span><span class="float-right"><a href="deletepitch.php?id='.$_GET["id"].'&&type=0&&pid='.$row["id"].'" class="text-danger"><i class="fas fa-trash-alt"></i></a></span></div><br>';
    }
} else {
    echo "No Characters";
}
$conn->close();
 
      ?>
  </div>
</div>
</div>
   
     <div class="col-md-3">
        <div class="card text-white bg-primary">
  <div class="card-header">Locations</div>
  <div class="card-body" style="overflow: auto;
max-height: 500px;">
   <?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM locations where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       echo '<div style="border-bottom: 1px solid #fff;"><span>'.$row["name"].'</span><a href="deletepitch.php?id='.$_GET["id"].'&&type=1&&pid='.$row["id"].'" class="text-danger float-right"><i class="fas fa-trash-alt"></i></a></div><br>';
    }
} else {
    echo "No Locations";
}
$conn->close();
 
      ?>
  </div>
</div>
</div>
         <div class="col-md-2">
        <div class="card text-white bg-primary">
  <div class="card-header">Props</div>
  <div class="card-body" style="overflow: auto;
max-height: 500px;">
   <?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM props where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       echo '<div style="border-bottom: 1px solid #fff; "><span>'.$row["name"].'</span><a href="deletepitch.php?id='.$_GET["id"].'&&type=3&&pid='.$row["id"].'" class="text-danger float-right"><i class="fas fa-trash-alt"></i></a></div><br>';
    }
} else {
    echo "No Props";
}
$conn->close();
 
      ?>
  </div>
</div>
</div>
     <div class="col-md-4">
        <div class="card text-white bg-primary">
  <div class="card-header">Pitch</div>
  <div class="card-body" style="overflow: auto;
max-height: 500px;">
   <?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM pitches where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
       echo '<div style="border-bottom: 1px solid #fff; "><span>'.$row["desc"].'</span><a href="deletepitch.php?id='.$_GET["id"].'&&type=2&&pid='.$row["id"].'" class="text-danger float-right"><i class="fas fa-trash-alt"></i></a></div><br>';
    }
} else {
    echo "No Pitches";
}
$conn->close();
 
      ?>
  </div>
</div>
</div>
    
</div>
    </div>

<?php include "footer.php"; ?>
