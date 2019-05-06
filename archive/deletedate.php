<?php
include "database.php";
$postid = $_GET["pid"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
queryi("DELETE FROM dates WHERE id=".$postid);
header("Location: schedule.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
