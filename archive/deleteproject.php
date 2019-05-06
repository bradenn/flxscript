<?php
include "database.php";

$name = $_POST["name"];
$id = $_GET["id"];
if(querys("SELECT COUNT(id) FROM projects where id='$id'&&userid=".$userid, "COUNT(id)") > 0){
    queryi("INSERT INTO archivedproject select * from projects where `id`=".$id);
queryi("DELETE FROM projects WHERE id=".$id);
    header("Location: index.php");
}else{
    echo "YOU'VE DISCOVERED THE MAGIC POTATO!!!".querys("SELECT COUNT(id) FROM projects where id='$id'&&userid=".$userid, "COUNT(id)");
}



?>
