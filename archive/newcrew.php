<?php
include "database.php";
$first = $_POST["first"];
$last = $_POST["last"];
$pos = $_POST["pos"];
$phone = $_POST["phone"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
queryi("INSERT INTO `admin_flxscript`.`crew` (`firstname`, `lastname`, `position`, `contact`, `userid`, `projectid`, `id`) VALUES ('$first', '$last', '$pos', '$phone', '$userid', '$projectid', NULL);");
header("Location: crew.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
