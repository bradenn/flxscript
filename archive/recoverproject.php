<?php
include "database.php";

$name = $_POST["name"];
$id = $_GET["pid"];

    queryi("INSERT INTO projects select * from archivedproject where `id`=".$id);
queryi("DELETE FROM archivedproject WHERE id=".$id);
    header("Location: index.php");




?>
