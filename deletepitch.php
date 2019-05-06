<?php
include "database.php";
$postid = $_GET["pid"];
$type = $_GET["type"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
if($type == 0){
	queryi("DELETE FROM characters WHERE id=".$postid);
}
if($type == 1){
	queryi("DELETE FROM locations WHERE id=".$postid);
}
if($type == 2){
	queryi("DELETE FROM pitches WHERE id=".$postid);
}
if($type == 3){
	queryi("DELETE FROM props WHERE id=".$postid);
}
header("Location: pitch.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
