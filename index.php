<?php include "header.php"; ?>
<?php if($_GET["dat"] == "new"){ echo '<br><br><div class="container">
<div class="alert alert-dismissible alert-info">
  <a href="index.php" class="close" data-dismiss="alert">&times;</a>
  <strong>Heads up!</strong> FLIXSCRIPT got a new domain! It is flixscript.com. You have been redicted from the old domain (flxscript.thefilmsmen.com).
  In the future, remeber to use flixscript.com instead!
</div></div>';}
if($_GET["dat"] == "wel"){ echo '<br><br><div class="container">
<div class="alert alert-dismissible alert-success">
  <a href="index.php" class="close" data-dismiss="alert">&times;</a>
  <strong>Welcome!</strong> Thank you for chosing FlixScript for your film making!
</div></div>';}?>
<?php if(!$logged) include "welcome.php"; ?>
<?php if($logged) include "projects.php"; ?>
<br>
<?php include "footer.php"; ?>

