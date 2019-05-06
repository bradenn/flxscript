<?php
include "database.php";
$scene = strtoupper($_POST["scene"]);
$angle = $_POST["angle"];
$motion = $_POST["motion"];
$location = $_POST["location"];
$desc = $_POST["desc"];
$projectid = $_GET["id"];

queryi("INSERT INTO shotlists (`projectid`, `scene`, `angle`, `motion`, `location`, `desc`, `id`) VALUES ($projectid, '$scene', '$angle', '$motion', '$location', '$desc', NULL)");
header("Location: shotlist.php?id=".$projectid);
?>
