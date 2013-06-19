	<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="views/js/highstock.js"></script>
    <script src="views/js/themes/gray.js"></script>
<script src="views/js/modules/exporting.js"></script>
	<script type="text/javascript">
$(function() {
	$.getJSON('http://<?php echo SERVER_IP ?>:8080/fisonweb/index.php?watch=json&c=<?php echo $views[4][0];?>&callback=?', function(data) {

		// create the chart
		$('#container').highcharts('StockChart', {
			

			rangeSelector : {
				selected : 0
			},

			title : {
				text : '<?php echo $views[4][1];?> Stock Price'
			},
			
			series : [{
				name : '<?php echo $views[4][0];?>',
				data : data,
				tooltip: {
					valueDecimals: 3
				}
			}]
		});
	});
});
		</script>

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
<div id="container" style="height: 500px; min-width: 500px"></div>
   
    <br clear="all" />
</div>
    <script>
	function showResult(str)
{
if (str.length==0)
  { 
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="0px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","index.php?watch=search&code="+str,true);
xmlhttp.send();
}
		</script>

<div id="rightContainer2">	
<div id="clear"></div>
<table width="100%" border="0">
  <tr>
    <td align="Left"><h3>COMPANY</h3></td>
  </tr>
  <tr>
    <td align="Left"><div align="right"><form>
<input type="text" size="30" onkeyup="showResult(this.value)" border="0">
<div id="livesearch" style="width:200px; z-index:5000; position:absolute; right:10px; border:none; background-color:#CCCCCC"></div>
</form></div></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
        <td width="60%"><h4><?php echo $views[4][1];?></h4></td>
        <td width="40%"><div align="center"><?php if($views[4][4] < 0) {?><img src="views/img/arrowRed.png" /><?php } else if($views[4][4] == 0){} else {}?></div></td>
      </tr>
      <tr id="flip">
        <td>Last Done</td>
        <td ><?php echo $views[4][3];?></td>
      </tr>
      <tr>
        <td>Change</td>
        <td><?php echo $views[4][4];?></td>
      </tr>
    </table>
<br clear="all" /><p/><p/>



<table width="160" border="0" align="center" cellpadding="2" cellspacing="0" >
      <tr>
    <td colspan="2" id="bgTable"><strong>MARKET SUMMARY</strong></td>
    </tr>
  <tr id="flip">
    <td>Change %</td>
    <td class="bold"><?php echo round(($views[4][4]/$views[4][2]*100),3);?></td>
  </tr>
  <tr>
    <td>Volume (Lot)</td>
    <td class="bold"><?php echo $views[4][11];?></td>
  </tr>
  <tr id="flip">
    <td>DHigh</td>
    <td class="bold"><?php echo $views[4][9];?></td>
  </tr>
  <tr>
    <td>DLow</td>
    <td class="bold"><?php echo $views[4][10];?></td>
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



