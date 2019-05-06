<div class="container">
<div class="row" style="padding-top: 6%;">

<div class="col-md-2">
    </div>
    <div class="col-md-8">
<?php

$proj = querys("Select count(id) from projects where userid=".$userid, "count(id)");
if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 0){
    $pro = '/2&nbsp;BASIC</span>';
}
if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 1){
    $pro = '/∞&nbsp;STUDENT</span>';
}
if(querys("SELECT account FROM users WHERE id=".$userid, "account") == 2){
    $pro = '/∞&nbsp;PRO</span>';
}
$pro = '<span class="text-info float-right">'.$proj.$pro;

?>


        <div class="card text-white bg-primary">
  <div class="card-header">Projects <?php  echo $pro; ?></div>
  <div class="card-body">
        <?php  if(querys("Select count(id) from projects where userid=".$userid, "count(id)") == 0) {echo '

    <h4 class="card-title">It appears your are projectless.</h4><span style="text-transform:uppercase;">Don\'t be projectless. Get started now!</span><br><br>


        ';
}else{
    echo '<div class="list-group">';


$conn = new mysqli("localhost", "admin_flix", "Zaq1xsw2", "admin_flix");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM projects where userid=".$userid;
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


$conn2 = new mysqli("localhost", "admin_flix", "Zaq1xsw2", "admin_flix");
// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

$sql = "SELECT * FROM sharedproject where user=".$userid;
$result = $conn2->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo '<a href="project.php?id='.$row["projectid"].'" class="list-group-item list-group-item-action">'.querys("select name from projects where id=".$row["projectid"], "name").'<span class="text-muted float-right"><i class="fas fa-share-alt-square"></i></span>
  </a>';
    }
} else {
    echo "0 results";
}
$conn2->close();

    echo '</div><br>';
}
        ?>
      <a href="#" class="btn btn-info pull-left" data-toggle="modal" data-target="#newproject"><i class="fas fa-plus"></i> New Project</a>

        </div>
</div>
    </div>
    <div class="col-md-2">
    </div>
</div>
    </div>
