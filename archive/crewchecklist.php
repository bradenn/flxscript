<?php
include "database.php";
$action = $_GET["action"];
$projectid = $_GET["id"];
$crewid = $_GET["cid"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
    if($action == 1){
        queryi("INSERT INTO `crewchecklist` (`crewid`, `projectid`, `userid`, `id`) VALUES ('$crewid', '$projectid', '$userid', NULL);");
    }else{
      queryi("DELETE FROM crewchecklist WHERE projectid=".$projectid."&&crewid=".$crewid."&&userid=".$userid);  
    }

header("Location: checklist.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
