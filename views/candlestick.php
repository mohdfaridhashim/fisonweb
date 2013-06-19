<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<style type="text/css">
<!--
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

	
-->
</style>
<link href="views/css/MWcss.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div style="width:800px;">

<div id="leftContainer2">
     <div id="chart2" style="height:300px; width:100%;"></div>


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
      series: [{renderer:$.jqplot.OHLCRenderer, rendererOptions:{candleStick:true}}],
	  //series:[{lineWidth:1,showMarker: false,shadow: false}],
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
    <br clear="all" />
</div>
    

<div id="rightContainer2">	
<div id="clear"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
        <td width="60%"><h4>MMCCORP</h4></td>
        <td width="40%"><div align="center"><img src="views/img/arrowRed.png" /></div></td>
      </tr>
      <tr id="flip">
        <td>Last Done</td>
        <td>1092.12091</td>
      </tr>
      <tr>
        <td>Change</td>
        <td>0340392.09</td>
      </tr>
    </table>
<br clear="all" /><p/><p/>



<table width="160" border="0" align="center" cellpadding="2" cellspacing="0" >
      <tr>
    <td colspan="2" id="bgTable"><strong>MARKET SUMMARY</strong></td>
    </tr>
  <tr id="flip">
    <td>Change %</td>
    <td class="bold">-2.37%</td>
  </tr>
  <tr>
    <td>Volume (Lot)</td>
    <td class="bold">72430</td>
  </tr>
  <tr id="flip">
    <td>DHigh</td>
    <td class="bold">2.940</td>
  </tr>
  <tr>
    <td>DLow</td>
    <td class="bold">2.870</td>
  </tr>
  <tr id="flip">
    <td>Avg Price</td>
    <td class="bold">2.888</td>
  </tr>
</table>
<br clear="all" /><p/><p/>

<table width="95%" border="0" align="center" cellpadding="3" cellspacing="0" style="text-align:center;">

  <tr>
    <td id="bgTable" style="border-right:none;">Data</td>
    <td id="bgTable" style="border-right:none;">Price</td>
    <td id="bgTable">Volume</td>
  </tr>
  <tr id="flip">
    <td>Yesterday</td>
    <td>2.950</td>
    <td>113254</td>
  </tr>
  <tr>
    <td>2 Days Ago </td>
    <td>2.800</td>
    <td>2320</td>
  </tr>
  <tr id="flip">
    <td>3 Days Ago</td>
    <td>2.790</td>
    <td>3179</td>
  </tr>
  <tr>
    <td>4 Days Ago</td>
    <td>2.800</td>
    <td>36657</td>
  </tr>
  <tr id="flip">
    <td>5 Days Ago</td>
    <td>2.840</td>
    <td>3781</td>
  </tr>
</table>
<br clear="all" /><p/><p/>

<a href="#" id="buttonNews" >News</a>

</div>
    
<br clear="all" />
</div>


</body>
</html>
