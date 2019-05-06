<?php
include "../database.php";

if(isset($_GET["action"]) && $_GET["action"] == "delete"){
  queryi("DELETE FROM `projects` WHERE id=".$_GET["id"]);
  header("Location: ../");
}
?>
