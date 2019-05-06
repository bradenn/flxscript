<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
    

    <div class="col-md-12">
       
        <div class="card text-white bg-primary" >
  <div class="card-header"><a href="project.php?id=<?php echo $_GET["id"]; ?>" class="text-secondary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;&nbsp;<?echo querys("SELECT name from projects where id=".$_GET["id"], "name"); ?> - Notifications<span class="text-muted float-right">Send reminder notifcations to crew</span></div>
  <div class="card-body" style="width:100%;">
        <table class="table table-hover" style="">
  <thead>
    <tr>
        <th scope="col">Dates</th>
      <th scope="col">Email</th>
     
    
        <th scope="col">Crew Members</th>
      
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
        $crewe = json_decode($row["crew"]);
      $crewdece = array();
        foreach ($crewe as &$ve){
           
            array_push($crewdece, querys("select contact from crew where id=".$ve, "contact"));
        }
        echo '<tr><td style="border-top:1px solid #fff;">'.date("m/d/Y", strtotime($row["date"])).'</td>';
        echo '<td style="border-top:1px solid #fff;">'.implode(', ', $crewdece).'</td>';
       
         echo '<td style="border-top:1px solid #fff;">'.implode(', ', $crewdec).'</td>';
        echo '<td style="border-top:1px solid #fff;"><a href="#" class="btn btn-info">Send Email</a></td></tr>';
    }
}else{
     echo '<td style="border-top:1px solid #fff;">It appears you don\'t have a dates..</td><td style="border-top:1px solid #fff;"></td style="border-top:1px solid #fff;"><td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;"></td>';

 
   
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
    </div>

<?php include "footer.php"; ?>
