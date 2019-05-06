<?php
include "database.php";
$prop = $_POST["prop"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
queryi("INSERT INTO `props` (`name`, `obtained`, `projectid`, `id`) VALUES ('$prop', 0, '$projectid', NULL);");
header("Location: pitch.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
