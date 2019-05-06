<?php
include "database.php";
$type = $_POST["type"];
$crew = json_encode($_POST["Actors"]);
$date = $_POST["date"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){

  queryi("INSERT INTO `admin_flxscript`.`dates` (`type`, `crew`, `date`, `projectid`, `id`) VALUES ('$type', '$crew', '$date', '$projectid', NULL);");  
    
header("Location: schedule.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
