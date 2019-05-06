<script>
var QuillDeltaToHtmlConverter = require('quill-delta-to-html').QuillDeltaToHtmlConverter;

// TypeScript / ES6:
// import { QuillDeltaToHtmlConverter } from 'quill-delta-to-html';

var deltaOps =  [
    {insert: "Hello\n"},
    {insert: "This is colorful", attributes: {color: '#f00'}}
];

var cfg = {};

var converter = new QuillDeltaToHtmlConverter(deltaOps, cfg);

var html = converter.convert();
</script>
