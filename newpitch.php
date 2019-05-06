<?php
include "database.php";
$desc = $_POST["desc"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
queryi("INSERT INTO `pitches` (`desc`, `projectid`, `id`) VALUES ('".str_replace("'", "''", $desc)."', '$projectid', NULL);");
header("Location: pitch.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
