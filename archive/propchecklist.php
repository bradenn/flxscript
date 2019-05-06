<?php
include "database.php";
$action = $_GET["action"];

$projectid = $_GET["id"];
$propid = $_GET["pid"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
    if($action == 1){
        queryi("UPDATE props SET obtained=1 WHERE id=".$propid);
    }else{
        queryi("UPDATE props SET obtained=0 WHERE id=".$propid); 
    }

header("Location: checklist.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
