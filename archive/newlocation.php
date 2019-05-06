<?php
include "database.php";
$loc = $_POST["location"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
queryi("INSERT INTO `locations` (`name`, `projectid`, `id`) VALUES ('$loc', '$projectid', NULL);");
header("Location: pitch.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
