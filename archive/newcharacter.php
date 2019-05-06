<?php
include "database.php";
$actor = $_POST["actor"];
$first = $_POST["first"];
$last = $_POST["last"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
queryi("INSERT INTO `characters` (`firstname`, `lastname`, `actorid`, `userid`, `projectid`, `id`) VALUES ('$first', '$last', '$actor', '$userid', '$projectid', NULL);");
header("Location: pitch.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
