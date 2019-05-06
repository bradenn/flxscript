<?php
include "database.php";
$itemid = $_GET["cid"];
$action = $_GET["action"];
$projectid = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id=$projectid&&userid=".$userid, "COUNT(id)") > 0){
    if($action == 1){
        queryi("INSERT INTO `userchecklist` (`itemid`, `projectid`, `userid`, `id`) VALUES ('$itemid', '$projectid', '$userid', NULL);");
    }else{
      queryi("DELETE FROM userchecklist WHERE projectid=".$projectid."&&itemid=".$itemid."&&userid=".$userid);  
    }

header("Location: checklist.php?id=".$projectid);
}else{
    header("Location: index.php");
}
?>
