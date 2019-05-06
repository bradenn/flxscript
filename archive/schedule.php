<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
    

    <div class="col-md-12">
     
        
    
         <div class="card text-white bg-primary" >
  <div class="card-header"><a href="project.php?id=<?php echo $_GET["id"]; ?>" class="text-secondary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;&nbsp;<?echo querys("SELECT name from projects where id=".$_GET["id"], "name"); ?> - Schedule<span class="text-muted float-right">Schedule your production</span></div>
  <div class="card-body" style="width:100%;">
          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newdate"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Date</a>
       <table class="table table-hover" style="">
  <thead>
    <tr>
      <th scope="col">Production Type</th>
      
      <th scope="col">Crew</th>
     
      <th scope="col">Date</th>
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

$sql = "SELECT * FROM dates where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $crew = json_decode($row["crew"]);
      $crewdec = array();
        foreach ($crew as &$v){
           
            array_push($crewdec, querys("select firstname from crew where id=".$v, "firstname").' '.querys("select lastname from crew where id=".$v, "lastname"));
        }
        echo '<tr><td style="border-top:1px solid #fff;">'.$row["type"].'</td>';
        echo '<td style="border-top:1px solid #fff;">'.implode(', ', $crewdec).'</td>';
     
        echo '<td style="border-top:1px solid #fff;">'.date("m/d/Y", strtotime($row["date"])).'</td>';
        echo '<td style="border-top:1px solid #fff;"><a href="deletedate.php?id='.$_GET["id"].'&&pid='.$row["id"].'" class="text-danger"><i class="fas fa-trash-alt"></i></a></td></tr>';
    
    }
} else {
    echo "<td>It appears you don't have a dates..</td><td></td><td></td><td></td>";
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
