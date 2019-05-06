<?php
include "database.php";
queryi("DELETE FROM `admin_flxscript`.`usertoken` WHERE `usertoken`.`token` = '".$_COOKIE["user"]."'");
 setcookie("user", "", time() - 3200, "/");
 header("Location: index.php");

?>