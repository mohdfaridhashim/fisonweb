		<style type="text/css" title="currentStyle">
			/*@import "views/media/css/demo_page.css";*/
			@import "views/media/css/jquery.dataTables2.css";
			body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color:#FFFFFF;
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
h3 {
	padding: 0px;
	margin: 0px;
	font-size:14px;
	color:#ffcc00;
	}
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.columnFilter.js"></script>
        <!-- Import JavaScript Libraries. -->
		<script type="text/javascript" src="views/socket/swfobject.js"></script>
		<script type="text/javascript" src="views/socket/web_socket.js"></script>
		<script type="text/javascript" charset="utf-8">
			// define grid table-----------
			var chg;
			$(document).ready(function() {
				$('#counter').dataTable({ "bProcessing": true,"bDeferRender": true,"sPaginationType": "full_numbers","bFilter": true,"bLengthChange": false,"bInfo": false,"bPaginate": false,"aaSorting": [[ "0", "asc" ]],"bSort": true,"sScrollY": "400px"}).columnFilter({aoColumns:[{ sSelector: "#CODE" }]});
						
			} );
			// add to favourite------------------
			function addtofav(str)
			{
				$.ajax({
  				type: "GET",
  				url: "index.php?watch=andfav&com="+str
  				//data: { com: "str" }
				}).done(function( msg ) {.
		  		alert(  msg );
				});
			}
function start()
{
			//conn
			var number = 1;
			var chg = 0;
			var ws;
			var feed;
			var list3 = null;
			var list4 = null;
				var onOpen = function() {
        console.log("Socket opened.");
        //socket.send("Hi, Server!");
    },
    onClose = function() {
        console.log("Socket closed.");
    },


    onMessage = function(data) {
       // console.log("We get signal:");
       // console.log(data);
	//document.getElementById("test").innerHTML = event.data;
	update(event.data);
    },


    onError = function() {
        console.log("We got an error.");
    },

    
    socket = new WebSocket("ws://10.10.0.46:8083/");

socket.onopen = onOpen;
socket.onclose = onClose;
socket.onerror = onError;
socket.onmessage = onMessage;
			/* view logic */
function update(data)
{

	
	//feed =  eval('(' + message + ')');		
	var feed = JSON.parse(data);
	//console.log(data);
	//var feed = eval(data);
	//var color = eval(data);
	//var chg = eval(data3);
	//note: this loop is temporary, need optmization
	if(feed.CODE != undefined)
	{
	for(var i= 0; i < <?php echo $views[1]; ?>; i++)
	{
		
		//var  list = document.getElementById('counter');
		var  list = document.getElementById("counter").tBodies[0].rows[i];
		if (typeof(list) != 'undefined' && list != null)
		{
  		// exists.

		if(list.getElementsByTagName("td")[0].innerHTML == feed.CODE )
		{
			var prev = list.getElementsByTagName("td")[2].innerHTML;
			//console.log(list.getElementsByTagName("td")[0].innerHTML);
			if(feed.LAST != undefined)
			{
				//list.getElementsByTagName("td")[3].innerHTML = feed.LAST.toFixed(3);
				list.getElementsByTagName("td")[3].innerHTML = feed.LAST.toFixed(3);
				chg = feed.LAST - prev;
				lc = setcolor(feed.LAST,prev);
				blinkColor3(i, 3, lc);
				list.getElementsByTagName("td")[4].innerHTML = chg.toFixed(3);
				lcc = setcolor(chg,0);
				blinkColor3(i, 4, lcc);
			}
			if(feed.BCUM != undefined)
			{
				list.getElementsByTagName("td")[5].innerHTML = feed.BCUM;
				blinkColor2(i, 5);
			}
			if(feed.BUY != undefined)
			{
				//list.getElementsByTagName("td")[6].innerHTML = feed.BUY.toFixed(3);
				list.getElementsByTagName("td")[6].innerHTML = feed.BUY.toFixed(3);
				bc = setcolor(feed.BUY,prev);
				blinkColor3(i, 6, bc);
			}
			if(feed.SELL != undefined)
			{
				//list.getElementsByTagName("td")[7].innerHTML = feed.SELL.toFixed(3);
				list.getElementsByTagName("td")[7].innerHTML = feed.SELL.toFixed(3);
				sc = setcolor(feed.SELL,prev);
				blinkColor3(i, 7, sc);
			}
			if(feed.SCUM != undefined)
			{
				list.getElementsByTagName("td")[8].innerHTML = feed.SCUM;
				blinkColor2(i, 8);
			}
			if(feed.HIGH != undefined)
			{
				//list.getElementsByTagName("td")[9].innerHTML = feed.HIGH.toFixed(3);
				list.getElementsByTagName("td")[9].innerHTML = feed.HIGH.toFixed(3);
				hc = setcolor(feed.HIGH,prev);
				blinkColor3(i, 9,hc);
			}
			if(feed.LOW != undefined)
			{
				//list.getElementsByTagName("td")[10].innerHTML = feed.LOW.toFixed(3);
				list.getElementsByTagName("td")[10].innerHTML = feed.LOW.toFixed(3);
				lwc =  setcolor(feed.LOW,prev);
				blinkColor3(i, 10, lwc);
			}
			if(feed.VOL != undefined)
			{
				list.getElementsByTagName("td")[11].innerHTML = feed.VOL;
				blinkColor2(i, 11);
			}
			break;
		}
		}
		list = null;
		//feed = null;
		chg = null;
		data = null;
		lc = null;
		lcc = null;
		bc = null;
		sc = null;
		hc = null;
		lwc = null;
		prev = null;
	}

	//end if
		list = null;
		//feed = null;
		chg = null;
		data = null;
		lc = null;
		lcc = null;
		bc = null;
		sc = null;
		hc = null;
		lwc = null;
		prev = null;
	}
		function setcolor(first,second)
	{
		if(first > second)
		{
		return "#00CCFF";
		}
		if(first == second)
		{
		return "#00FF33";
		}
		if(first < second)
		{
		return "red";
		}
	}
}
//blink
//
//odd and even 
//function oddeven(someNumber){
//    return (someNumber%2 == 0) ? "#E2E4FF" : "white";
//};


function blinkColor2(r, c) {
list = document.getElementById("counter").tBodies[0].rows[r];
	bgcolor = list.getElementsByTagName("td")[0].style.background;
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate";
	
    setTimeout(function () { setblinkColor2(r, c,bgcolor) }, 300);
	list = null;//bgcolor = null;
}
function setblinkColor2(r, c,bgcolor) {
	list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "#FFFFFF";
    list.getElementsByTagName("td")[c].style.background = bgcolor;
	list = null;
}
//
function blinkColor3(r, c,d) {
	list = document.getElementById("counter").tBodies[0].rows[r];
	var bgcolor = document.getElementById("counter").tBodies[0].style.border;
	//var bgcolor = oddeven(r);
    list.getElementsByTagName("td")[c].style.color = "chocolate";
    list.getElementsByTagName("td")[c].style.background=  d;
    setTimeout(function () { setblinkColor3(r, c,d,bgcolor) }, 300);
	list = null;
	bgcolor = null;
}
function setblinkColor3(r, c,d,bgcolor) {
	list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = d;
    list.getElementsByTagName("td")[c].style.background= bgcolor;
	list = null;
}
//
//end start();
}
start();

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
        
<table width="100%" border="0" >
  <tr>
    <td align="Left"><h3>ALL COUNTERS</h3></td>
  </tr>
 <tr id="filter_global">
					<td align="center">Rendering engine</td>
					<td align="center"><input id="CODE" type="text" /></td>
				</tr>                
</table>
<div class="ex_highlight_row">
<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="counter">
  <thead>
    <tr id="tableHeaders">
      <th>CODE</th>
      <th>SYMBOL</th>
      <th>PREV</th>
      <th>LAST</th>
      <th>CHG</th>
      <th>BCUM</th>
      <th>BUY</th>
      <th>SELL</th>
      <th>SCUM</th>
      <th>HIGH</th>
      <th>LOW</th>
      <th>VOL</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
 <tbody >
  <?php for($i = 0; $i < $views[1] ; $i++) { if($views[0][$i][19] != "1"){?>
    <tr >
      <td><?php echo $views[0][$i][0]; ?></td>
      <td><?php echo $views[0][$i][1]; ?></td>
      <td><?php echo $views[0][$i][2]; ?></td>
      <td  style="color:<?php echo $views[0][$i][13]; ?>"><?php echo $views[0][$i][3]; ?></td>
      <td  style="color:<?php echo $views[0][$i][16]; ?>"><?php echo $views[0][$i][4]; ?></td>
      <td class="center"><?php echo $views[0][$i][5]; ?></td>
      <td  style="color:<?php echo $views[0][$i][14]; ?>"><?php echo $views[0][$i][6]; ?></td>
      <td  style="color:<?php echo $views[0][$i][15]; ?>"><?php echo $views[0][$i][7]; ?></td>
      <td class="center"><?php echo $views[0][$i][8]; ?></td>
      <td  style="color:<?php echo $views[0][$i][18]; ?>"><?php echo $views[0][$i][9]; ?></td>
      <td  style="color:<?php echo $views[0][$i][17]; ?>"><?php echo $views[0][$i][10]; ?></td>
      <td class="center" ><?php echo $views[0][$i][11]; ?></td>
      <td class="center">&nbsp;<a href='#' onclick="addtofav('<?php echo $views[0][$i][1];  ?>')"><img src="views/media/images/addButton.gif" alt="Details"/></a></td>
    </tr>
    <?php } } ?>
  </tbody>

</table>

</div>