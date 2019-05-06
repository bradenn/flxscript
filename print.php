<?php include "database.php"; ?>
<html>
<head>
<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
<style>

.ql-editor {
      line-height: 17px;
}
.printme{
  margin-top: 1in;
  margin-left: 1in;
  margin-right: 0.5in;
font-family: "Courier 10 Pitch", "Courier", monospace;
font-size: 16px !important;
line-height: 1.42 !important;
word-wrap: break-word;
white-space: pre-wrap;

border:none;
color: #000;
background-color: #fff;
}

.ql-tooltip, .ql-hidden{
  display:none;
}

.ql-editor p, .ql-editor ol, .ql-editor ul, .ql-editor pre, .ql-editor blockquote, .ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6{
  margin: revert !important;
}

body{
  color: #000;
  background-color: #fff;
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



</style>
</head>
<body>
<div class="printme">
  <?php
  echo querys("SELECT content from scripts where id=".querys("select `id` from scripts where `projectid`=".$_GET["s"], "id"), "content");
  ?>
</div>
</body>
</html>
