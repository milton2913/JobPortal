<html>
<head>
    <title>How to Export HTML to Word Document with JavaScript</title>
    <style>
        body {
            width: 550px;
            font-family: Arial;
            line-height: 25px;
        }

        #btn-export {
            background: #484848;
            color: #FFF;
            border: #000 1px solid;
            padding: 10px 20px;
            font-size: 12px;
            border-radius: 3px;
        }

        .content-footer {
            text-align: center;
        }
        .source-html-outer {
            border: #d0d0d0 1px solid;
            border-radius: 3px;
            padding: 100px 200px 200px 200px;
        }
        #source-html{background: red}
    </style>
</head>
<body>
<div class="source-html-outer">
    <div id="source-html">
        <h1>
            <center>Artificial Intelligence</center>
        </h1>
        <h2>Overview</h2>
        <p>
            Artificial Intelligence(AI) is an emerging technology
            demonstrating machine intelligence. The sub studies like <u><i>Neural
                    Networks</i>, <i>Robatics</i> or <i>Machine Learning</i></u>
            are the parts of AI. This technology is expected to be a
            prime part of the real world in all levels.

        </p>
    </div>
    <div class="content-footer">
        <button id="btn-export" onclick="exportHTML();">Export to word
            doc</button>
    </div>
</div>
<script>
    function exportHTML(){
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
        var footer = "</body></html>";
        var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'document.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }
</script>
</body>
</html>