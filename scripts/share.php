<?php

include "../database.php";

$id = $_GET["id"];
$user = $_POST["user"];
$sharewith = querys("SELECT id from users where username='$user'", "id");
$owner = querys("SELECT userid from projects where id=$id", "userid");

queryi("INSERT INTO `sharedproject` (`projectid`, `user`, `owner`, `id`) VALUES ($id, $sharewith, $owner, NULL);");

header("Location: ../index.php");


?>
