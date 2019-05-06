<?php include "header.php"; ?>

<div class="container">
<div class="row" style="padding-top: 6%;">
  <div class="col-md-2">

  </div>

    <div class="col-md-8">

        <div class="card text-white bg-primary" >
  <div class="card-header"><a href="index.php" class="text-secondary"><i class="fas fa-angle-left"></i></a>&nbsp;&nbsp;&nbsp;<?echo querys("SELECT name from projects where id=".$_GET["id"], "name"); ?></div>
  <div class="card-body" style="width:100%;">
      <div class="list-group">
        <a href="editor.php?s=<?php echo $_GET["id"]; ?>" class="list-group-item list-group-item-action"><i class="fas fa-file-alt"></i>&nbsp;&nbsp;Script</a>
          <a href="shotlist.php?id=<?php echo $_GET["id"]; ?>" class="list-group-item list-group-item-action"><i class="fas fa-list-ul"></i>&nbsp;&nbsp;Shotlist</a>
            <a href="#"  data-toggle="modal" data-target="#share" class="list-group-item list-group-item-action"><i class="fas fa-share-alt-square"></i>&nbsp;&nbsp;Share</i></a>

      <a href="scripts/projectmanager.php?action=delete&&id=<?php echo $_GET["id"]; ?>" id="delete" class="list-group-item list-group-item-action"><i class="fas fa-trash-alt text-danger"></i>&nbsp;&nbsp;Archive Project</a>


        </div>

      </div>
</div>
    </div>
    <div class="col-md-2">

    </div>

</div>
    </div>



<?php include "footer.php"; ?>
