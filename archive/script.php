<?php include "header.php"; ?>
<script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
<div class="container">
    <div class="row" style="padding-top: 6%;">
        <h2>
            <?echo querys("SELECT name from projects where id=".$_GET["id"], "name"); ?>
            <button href="#" class="btn btn-info" onclick="formatDoc('bold');">SCENE HEADER</button>
        </h2>
    </div>
    <div class="row" style="">

    </div>

</div>

<?php include "footer.php"; ?>