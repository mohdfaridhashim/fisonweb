	<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
	<script type="text/javascript" src="views/js/jquery.chromatable.js"></script>
    <link class="include" rel="stylesheet" type="text/css" href="views/js/jquery.jqplot.min.css" />
   <link rel="stylesheet" type="text/css" href="views/js/examples.css" />
    <!-- Don't touch this! -->
    <script type="text/javascript" src="views/js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="views/js/syntaxhighlighter/scripts/shCore.min.js"></script>
    <script type="text/javascript" src="views/js/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
    <script type="text/javascript" src="views/js/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
     <script type="text/javascript" src="views/js/plugins/jqplot.dateAxisRenderer.min.js"></script>
	<script type="text/javascript" src="views/js/plugins/jqplot.ohlcRenderer.min.js"></script>
	<script type="text/javascript" src="views/js/plugins/jqplot.highlighter.min.js"></script>

<script>
$(document).ready(function(){
	
			
		$("#yourTableID2").chromatable({
		
				width: "100%",
				height: "200px",
				scrolling: "yes"
				
			});	
			
		
	});
</script>

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color:#FFF;
}
	
h3 {
	padding: 0px;
	margin: 0px;
	font-size:14px;
	color:#ffcc00;
	}
	
h4 {
	padding: 0px;
	margin: 0px;
	font-size: 24px;
	}
table.imagetable {
	font-family: verdana,arial,sans-serif;
	text-align:left;
	font-size:9px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}
table.imagetable th {
	background:#b5cfd2 ;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
table.imagetable td {
	background:#dcddc0 ;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
</style>
<link href="css/MWcss.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0">
<tr>
<td valign="top" width="60%">
<table class="imagetable" width="100%" border="1" >
<TR>
<th valign="top" style="font:Verdana">Tracking&nbsp;  CODE: <?php echo $views[4][0];?></th>
</TR>
</table>
  <table class="imagetable" width="100%" border="1">
   <tr>
    <td>
    
    <div id="chart2" style="height:250px; width:100%;"></div>


<script class="code" language="javascript" type="text/javascript">

var ohlc = [
 <?php 
 //$str =  $views[0][0][0];
 //$tarikh = (explode(" ",$str));
 $latest = $views[3] -1 ;
  ?>
 <?php
	//LIST DATA
	
  for($i = 0; $i < $views[3]; $i++)
  {//$tarikh2 = (explode(" ",$list_hl[$i][1]));
  $time = explode(" ",$views[2][$i][1]);
  if($i != $views[3] -1 )
  {
  
  //time,last
  ?>
  ['<?php echo $time[0]//echo $views[2][$i][1]; ?>', <?php echo $views[2][$i][0]; ?>],
  <?php
  }
  else
  { ?>
  ['<?php echo $time[0]//echo $views[2][$i][1]; ?>', <?php echo $views[2][$i][0]; ?>]
  <?php 
  }
  //end for
  } ?>
];
$(document).ready(function(){ 
      
    //var ticks = ['Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue'];
     $.jqplot.config.enablePlugins = true;    
    plot4 = $.jqplot('chart2',[ohlc],{
	seriesDefaults:{yaxis:'y2axis'},
      axes: {
          xaxis: {
		     renderer:$.jqplot.DateAxisRenderer,
        //tickOptions:{formatString:'%b %e'}, 
             // renderer:$.jqplot.CategoryAxisRenderer,
              //ticks:ticks
		  //renderer:$.jqplot.DateAxisRenderer,
          tickOptions:{formatString:'%H:%M:%S'},
          tickInterval:'30 minute'
          },
		  y2axis: {
		  //3 decimal places
        tickOptions:{formatString:'RM%.3f'}
      }
      },
      //series: [{renderer:$.jqplot.OHLCRenderer, rendererOptions:{candleStick:true}}],
	  series:[{lineWidth:1,showMarker: false,shadow: false}],
      highlighter: {
          showMarker:true,
          tooltipAxes: 'xy',
          yvalues: 4,
          formatString:'<table class="jqplot-highlighter"> \
          <tr><td>Time</td><td>%s</td></tr> \
          <tr><td>Last</td><td>%s</td></tr> \
          </table>'
      }
    });
});

</script>
    </td>
  </tr>
</table>
  </td>
  </tr>
  <tr>
  <td colspan="2">

  </td>
  </tr>
</table>
