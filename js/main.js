$(document).ready(function(){
    $("#infopanel").hide();
    $(".infobtn,.tranbtn").click(function(){ $("#infopanel").toggle(500); });

    // Enable plugins like cursor and highlighter by default.
    $.jqplot.config.enablePlugins = true;
    // For these examples, don't show the to image button.
    $.jqplot._noToImageButton = true;
    
    // To use PHP instead of a local JSON source move this script to the index.php page,
    // uncomment these two lines and move opts and plot1 out of the $.getJSON function
    // series0 = <?php echo $ret; ?>
    // series1 = <?php echo $ret2; ?> 

    $.getJSON("data/funnel.json", 
        function (data) {            
            let series0 = Array();
            let series1 = new Array;

            series0 = data.seriesa;
            series1 = data.seriesb;

            opts = {
                title: '',
                grid: { drawBorder: false, shadow: true, background: 'rgba(0,0,0,0)' },
                highlighter: {
                sizeAdjust: 12,shadowAlpha: 0.1, shadowDepth: 2, fillToZero: true,
                tooltipLocation: 'n', tooltipAxes: 'both', useAxesFormatters: true },
                series: [{
                    color: 'rgba(198,88,88,1)', negativeColor: 'rgba(100,50,50,.6)', showMarker: true, showLine: true, fill: false, fillAndStroke: true,
                    markerOptions: { style: 'filledCircle', size: 8 },
                    rendererOptions: { smooth: true }
                },{
                    color: 'rgba(92,184,92,1)', showMarker: true,
                    rendererOptions: { smooth: true, },
                    markerOptions: { style: 'filledSquare', size: 8 },
                }],
                axes: {
                    xaxis: {
                        renderer:$.jqplot.DateAxisRenderer, min:'August 19, 2017', tickInterval: "6 months", tickOptions:{formatString:"%Y/%#m/%#d"}
                    },
                    yaxis: {
                        renderer: $.jqplot.LogAxisRenderer,
                        tickOptions:{ prefix: '&pound;' }
                    }
                },
                cursor:{zoom:true, 
                showTooltipOutsideZoom: true, 
                constrainOutsideZoom: true, 
                showTooltip:false,
                followMouse: false }
            };

            plot1 = $.jqplot('chart1', [series0,series1], opts);
        }
    );
        
    $('#chart1').bind('jqplotDataClick', 
        function (ev, seriesIndex, pointIndex, data) {
        data2 = data[1];
        $('#info1').slideUp(250,function(){$(this).html('Series: '+seriesIndex+', Point: '+pointIndex+', Data: &pound;'+data2);}).slideDown(250);
        $('#footer').slideUp(250,function(){$(this).html('Page co-ordinates: '+ 'X: '+ev.pageX+', Y: '+ev.pageY);}).slideDown(250);
        }
    );
});
