<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
<style>
th{
  border-top:none;
  color: rgb(215, 218, 223) !important;
}
.table th, .table td{
  border-top:none;
}

</style>

    <div class="col-md-12">
        <div class="card text-white bg-primary" >
  <div class="card-header"><a href="project.php?id=<?php echo $_GET["id"]; ?>" class="text-secondary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;&nbsp;<?echo querys("SELECT name from projects where id=".$_GET["id"], "name"); ?> - Shotlist<span class="text-muted float-right">Organize your shots</span></div>
  <div class="card-body" style="width:100%;">
        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newshot"><i class="fas fa-plus"></i>&nbsp;&nbsp;New Shot</a> <br><br>
       <table class="table table-hover" style="color:#fff; font-size: 90%;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Scene</th>
      <th scope="col">Angle</th>
      <th scope="col">Motion</th>
      <th scope="col">Location</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-active">
      <?php
        $conn = new mysqli("localhost", "admin_flix", "Zaq1xsw2", "admin_flix");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM shotlists where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $cnt = 0;
    while($row = $result->fetch_assoc()) {
        $cnt++;
        echo '<tr ><td style="border-top:1px solid #fff;">'.$cnt.'</td>';
        echo '<td style="border-top:1px solid #fff;">'.$row["scene"].'</td>';
        echo '<td style="border-top:1px solid #fff;">'.$row["angle"].'</td>';
        echo '<td style="border-top:1px solid #fff;">'.$row["motion"].'</td>';
        echo '<td style="border-top:1px solid #fff;">'.$row["location"].'</td>';
        echo '<td style="border-top:1px solid #fff;">'.$row["desc"].'</td>';
        echo '<td style="border-top:1px solid #fff;"><a href="deleteshot.php?id='.$_GET["id"].'&&pid='.$row["id"].'" class="text-danger"><i class="fas fa-trash-alt"></i></a></td></tr>';
    }
} else {
    echo '<td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;">Your Shotlist is empty</td><td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;"></td><td style="border-top:1px solid #fff;"></td>';
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
