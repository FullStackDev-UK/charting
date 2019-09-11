<?php 
/* These were used for demonstration before the move to a local JSON source. 
To use PHP instead, move the javascript back onto this PHP page (so any PHP will be parsed) and
add your PHP data source here...
include "data/funnel.php"; include "data/funnel2.php"; */ 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Graphing App</title>
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/jquery.jqplot.min.css" class="include" />
    <link type="text/css" rel="stylesheet" href="css/shCoreDefault.min.css" />
    <link type="text/css" rel="stylesheet" href="css/shThemejqPlot.min.css" />
	<link type="text/css" rel="stylesheet" href="css/graphapp.css" media="screen" />
</head>
<body><div class="bodyBG"></div>

    <div class="container">
        <div class="row">
            <nav class="navbar" role="navigation">
                <div class="container">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#"><span class='white'>Graphing</span><span class='red'>App</span></a>
                </div>&nbsp;&nbsp;<a class="btn btn-default infobtn"><i class="glyphicon glyphicon-info-sign"></i></a>
                </div>
            </nav>
        </div>
    </div>

    <div class="container datapanel">
      <div class="jumbotron rounded glow">
        <div class="row">
            <h4>Choose data source/channel...</h4>
            <a href='#' class="btn btn-success tranbtn startbtn"><span class="glyphicon glyphicon-play"></span>&nbsp;&nbsp;Start</a>&nbsp;&nbsp;<a href='#' class="btn btn-danger tranbtn stopbtn"><span class="glyphicon glyphicon-stop"></span>&nbsp;&nbsp;Stop</a>

            <form name="searchForm" id="searchForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"><input type="file" name="tag" id="uploadbox" placeholder="Upload data" disabled /><button type="submit" class="btn btn-default disabled"><i class="glyphicon glyphicon-open"></i></button></form>
        </div><!-- /.row -->

        <div class="row" id="infopanel">
            <div class="infobox">
                <h3><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Technologies used:</h3>
                <p><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;PHP | JSON, Javascript, jQuery & jqPlot</p>
                <p><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;HTML5, Bootstrap & CSS</p>
                <h2>Information</h2><p>1. This graph displays either a local JSON file or PHP array depending on which input method you choose (funnel.php | funnel.json). I've added snippets of both source-types to the repo and am using the JSON source here for demonstration. Usually, the data source will be some kind of API rather than a static local file.</p><p>2. Linking backend data to visualisation is simply a matter of substituting local values for server-generated JSON-encoded values, and decoding them back into a local array.</p><p>3. As the transport controls (Start & Stop) need to be linked to an active data source to make sense, they have had their functionality disabled.<br />The file upload function, which requires securing and parsing to be useful, has also been disabled.</p><p align='right'><a href='#' class='btn btn-default infobtn'>Close</a></p>
            </div>
        </div>
      </div><!-- /.jumbotron -->

        <div class="chartcontainer glow">
            <div class="row">
                <div id="info1">Select a point for data (point details below)</div>
                <div id="chart1"></div>
                <button value="reset" type="button" onclick="plot1.resetZoom();" class="btn btn-primary rstbtn">Reset Zoom</button>
           </div>
            <div id='footer' class='roundedWhite'><p>Select area to zoom in. Double-click chart, or use reset button, to reset to original zoom.</p></div>
        </div>
    </div>

    <script type="text/javascript" class="include" src="js/jquery.min.js"></script>
	<script type="text/javascript" class="include" src="js/jquery.jqplot.min.js"></script>
	<script type="text/javascript" class="include" src="js/plugins/jqplot.dateAxisRenderer.min.js"></script>
	<script type="text/javascript" class="include" src="js/plugins/jqplot.cursor.min.js"></script>
	<script type="text/javascript" class="include" src="js/plugins/jqplot.highlighter.min.js"></script>
	<script type="text/javascript" src="js/shCore.min.js"></script>
	<script type="text/javascript" src="js/shBrushJScript.min.js"></script>
	<script type="text/javascript" src="js/shBrushXml.min.js"></script>
	<script type="text/javascript" src="js/main.js" class="code"></script>
</body>
</html>