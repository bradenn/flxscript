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
       <br>
        
        
 
    </div>
    
    <div class="col-md-3">
        <div class="card text-white bg-primary">
  <div class="card-header">Equipment</div>
  <div class="card-body">
<?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM checklist where type=0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        $tog = "A catastrophic error has occured.";
        if(querys("SELECT COUNT(id) FROM userchecklist WHERE itemid=".$row["id"], "COUNT(id)") > 0){
            $tog = "fa-check-square";
            $link = "0";
        }else{
            $tog = "fa-square";
            $link = "1";
        }
        
       echo '<div style=""><h5 class="text-secondary"><a href="togglechecklist.php?cid='.$row["id"].'&&action='.$link.'&&id='.$_GET["id"].'" class="text-secondary"><i class="far '.$tog.'"></i></a>&nbsp;&nbsp;'.$row["item"].'</h5></div><br>';
    }
} else {
    echo "A catastrophic error has occured.";
}
$conn->close();
 
      ?>
  </div>
</div>
</div>
     <div class="col-md-3">
        <div class="card text-white bg-primary">
  <div class="card-header">Crew<span class="float-right">(From crew list)</span></div>
  <div class="card-body">
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
      
        $tog = "A catastrophic error has occured.";
        if(querys("SELECT COUNT(id) FROM crewchecklist WHERE crewid=".$row["id"], "COUNT(id)") > 0){
            $tog = "fa-check-square";
            $link = "0";
        }else{
            $tog = "fa-square";
            $link = "1";
        }
        
       echo '<div style=""><h5 class="text-secondary"><a href="crewchecklist.php?cid='.$row["id"].'&&action='.$link.'&&id='.$_GET["id"].'" class="text-secondary"><i class="far '.$tog.'"></i></a>&nbsp;&nbsp;'.$row["firstname"].' '.$row["lastname"].'</h5><span class="text-muted">'.$row["position"].'</span></div><br>';
    }
} else {
    echo "Your crew list is empty.<br>Add crew <a href='crew.php?id=".$_GET["id"]."' class='text-info'>here</a>.";
}
$conn->close();
 
      ?>
  </div>
</div>
</div>
     <div class="col-md-3">
        <div class="card text-white bg-primary">
  <div class="card-header">Props<span class="float-right">(From brainstorm)</span></div>
  <div class="card-body">
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
      
        $tog = "A catastrophic error has occured.";
        if(querys("SELECT obtained FROM props WHERE id=".$row["id"], "obtained") == 0){
            $tog = "fa-square";
            $link = "1";
        }else{
            $tog = "fa-check-square";
            $link = "0";
        }
        
       echo '<div style=""><h5 class="text-secondary"><a href="propchecklist.php?pid='.$row["id"].'&&action='.$link.'&&id='.$_GET["id"].'" class="text-secondary"><i class="far '.$tog.'"></i></a>&nbsp;&nbsp;'.$row["name"].'</h5></div><br>';
    }
} else {
    echo "Your prop list is empty.<br>Add props <a href='pitch.php?id=".$_GET["id"]."' class='text-info'>here</a>.";
}
$conn->close();
 
      ?>
  </div>
</div>
</div>
   
    
</div>
    </div>

<?php include "footer.php"; ?>
