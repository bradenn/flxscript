<?php
include "database.php";

$name = $_POST["name"];

queryi("INSERT INTO `projects` (`name`, `type`, `date`, `userid`, `id`) VALUES ('$name', 'film', '".date("Y-m-d", time())."', '$userid', NULL);");
$projectid = querys("select id from projects where name='$name'&&userid='$userid'&&date='".date("Y-m-d", time())."'", "id");
queryi("INSERT INTO `scripts` (`user`, `title`, `content`, `lastsave`, `projectid`, `id`) VALUES ('$userid', '$name', '', '0', $projectid, NULL);");
header("Location: project.php?id=".$projectid);


?>
