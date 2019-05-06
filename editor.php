<?php include "header.php"; ?>

<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">


<style>

.ql-editor {
      line-height: 17px;
}
.ql-container.ql-snow{
  border:none;
}
.bg-dark{
  color: rgb(215, 218, 223) !important;
  background-color: rgb(41, 44, 52) !important;
}
div.feditor{
  font-family: "Courier 10 Pitch", "Courier", monospace;
font-size: 16px !important;
line-height: 17px !important;
outline: none;

min-height: 11in;
margin: auto;
max-width: 8.5in;
padding-top: 1in;
padding-bottom: 1in;
padding-right: 1in;
padding-left: 1.5in;
word-wrap: break-word;
white-space: pre-wrap;
font-size: 100%;
border:none;
box-shadow: 0 0 4px 0 rgba(0,0,0,0.3);
color: rgb(215, 218, 223);
background-color: rgb(41, 44, 52);
}

.ql-editor p, .ql-editor ol, .ql-editor ul, .ql-editor pre, .ql-editor blockquote, .ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6{
  margin: revert !important;
}

div.fcontainer{

}

div.fbody{

}
div#toolbar{
  display: none;
  margin: auto;
  max-width: 8.5in;
}
div.ftoolbar{
  font-family: "Courier 10 Pitch", "Courier", monospace;
  font-size: 16px;
  line-height: 17px;
  outline: none;
  margin: auto;
  max-width: 8.5in;
  padding:15px;
  border:none;
  box-shadow: 0 0 4px 0 rgba(0,0,0,0.3);
  color: rgb(215, 218, 223);
  background-color: rgb(41, 44, 52);

}
body{
  background-color: rgb(34, 37, 43);
}
p.ql-editor{
  max-width:6in;
}
p.ql-indent-3{
  margin:0 !important;
  padding-left: 2in !important;
  max-width: 6in;
}
p.ql-indent-2{
  margin:0 !important;
  padding-left: 1in !important;
  max-width: 6in;
  padding-right: 1.5in;
}

p.ql-indent-4{
  margin:0 !important;
  padding-left: 1.5in !important;
  max-width: 6in;
  padding-right:2in !important;
}
a.hlt{
  text-decoration: none;
  color: #868e96 !important;
}
a.hlt:hover{
  text-decoration: none;
  color: #868e96 !important;
}





</style>

<?php

$save = "Not Saved";
$last = querys("select lastsave from scripts where id=".querys("select `id` from scripts where `projectid`=".$_GET["s"], "id"), "lastsave");
if($last != 0) $save = dateDiff($last, date('m/d/Y h:i:s a', time()));

?>
<!-- Create the editor container -->
<body>


<div class="container" id="fcontainer">
  <div id="toolbar">

  </div>
  <div class="ftoolbar">
    <p style="display: inline; vertical-align: center;"><?php
    echo querys("select `title` from scripts where `projectid`=".$_GET["s"], "title");
     ?>&nbsp;</p><span class="text-muted" id="pgC">1 page</span> // <span class="text-muted" id="saveInd">Saved: <?php echo $save; ?></span>

<a class="text-primary float-right hlt" id="save" href="#">&nbsp;<i class="fas fa-save">&nbsp;</i></a>
<a class="text-primary float-right hlt" id="print" href="print.php?s=<?php echo $_GET["s"];?>">&nbsp;<i class="fas fa-print"></i></a>

  </div>
  <br>

<div id="editor" class="feditor">
<?php
echo querys("SELECT content from scripts where id=".querys("select `id` from scripts where `projectid`=".$_GET["s"], "id"), "content");
?>
</div>

</div>
</body>


<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Initialize Quill editor -->
<script>

//1056 == 11inch


$( document ).ready(function() {
  paginate();
});

  var editor = new Quill('#editor', {
    modules: { toolbar: "#toolbar" },
    theme: 'snow'
  });

  editor.keyboard.addBinding({ key: 'escape' }, function(range) {
    //console.log(ln.length);
    //  console.log("SMALL");
     editor.removeFormat(range.index, 4);
    return true;
  });


function paginate(){
var ed = $("#editor");
  if(ed.outerHeight() >= 1057){
$("#pgC").html(Math.ceil(ed.outerHeight()/1056) + " pages");
var fc = $("#editor");
var offset = fc.offset()
var yoff = offset.top;
var y = ed.outerHeight();
var xoff = offset.top;
var x = ed.outerWidth();
for(var i = 1; i <= (ed.outerHeight())/1056; i++){
    if ($("#fcontainer "+"#pg"+(i+2)).length <= 0){
//$("#fcontainer").append("<p class='pg"+(i+2)+"' style='color: #868e96 !important; position: absolute; top: "+((yoff/96) + ((1056 * i)/96) + 0.25)+"in; left:"+((xoff/96)+9.5)+"in; color:#fff;'>Pg. "+(i+1)+"</p>");
}
}



}else{
$("#pgC").html("1 page");

}
}

  editor.on('text-change', function(delta, oldDelta, source) {
  paginate();

    var range = editor.getSelection();
    if (range) {
      if (range.length == 0) {
//console.log(delta);
try{
  let [line, offset] = editor.getLine(range.index);
  var ln = line.children.head.text;

  if(typeof delta.ops[1].insert != 'undefined'){

  if(delta.ops[1].insert.charCodeAt(0) == 10){

    if(ln.includes("FADE IN:") || ln.includes("FADE OUT:") || ln.includes("CUT TO:") || ln.includes("DISOLVE TO:")){

      console.log("'FADE IN:' Located and formatted to right. " + range.index + " / " + offset);
      editor.formatLine(range.index-1, 4, "align", "right");
      editor.removeFormat(range.index+1, 4);
    //  console.log(line);

    }
    if (ln.includes("INT.")) {

      console.log("'INT.' Located and formatted to align left & bolded. " + range.index + " / " + offset);
      editor.formatText(range.index-offset, offset, "bold", true);



    }
    if (ln.includes("(") && ln.includes(")")) {

      console.log("'(ex)' Panrenthetical line parsed. " + range.index + " / " + offset);
        editor.removeFormat(range.index-1, 4);
      editor.formatLine(range.index-1, 4, "indent", +4);
    //  editor.removeFormat(range.index+1, 4);
      editor.formatLine(range.index+1, 4, "indent", +2);
    //  console.log(line);

    }
    if (ln == ln.toUpperCase() && !ln.includes("INT.") && !ln.includes("EXT.") && !ln.includes("FADE IN:") && !ln.includes("FADE OUT:") && !ln.includes("CUT TO:") && !ln.includes("DISSOLVE TO:")) {

      console.log("'"+ln+"' Located and parsed as 'CHARACTER', center aligned. " + range.index + " / " + offset);
      editor.formatLine(range.index-1, 4, "indent", +3);
    //  editor.removeFormat(range.index+1, 4);
      editor.formatLine(range.index+1, 4, "indent", +2);
      //indent
    //  console.log(line);

    }




  }
  //  editor.removeFormat(range.index, 0);

}
}catch{

}

        //console.log(delta);



      }
    }

  });

  $(window).bind('beforeunload', function(){
  saveFile();
});

  editor.keyboard.addBinding({ key: 'S', metaKey: true }, function(range) {
    saveFile();
    return false;   // return false will prevent other listeners from receiving the event
  });

  $("#save").click(saveFile);






  window.setInterval(function(){
    saveFile();
  }, 30000);

  function saveFile(){


    $.post( "scripts/save.php", { data: $("#editor").html(), id: <?php echo querys("select `id` from scripts where `projectid`=".$_GET["s"], "id"); ?> } );

    $("#saveInd").html("Saved: Just now");
  }





</script>
