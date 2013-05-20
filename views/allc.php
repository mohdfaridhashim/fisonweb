		<style type="text/css" title="currentStyle">
			/*@import "views/media/css/demo_page.css";*/
			@import "views/media/css/jquery.dataTables.css";
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
        <!-- Import JavaScript Libraries. -->
		<script type="text/javascript" src="views/socket/swfobject.js"></script>
		<script type="text/javascript" src="views/socket/web_socket.js"></script>
		<script type="text/javascript" charset="utf-8">
			// define grid table
			var chg;
			$(document).ready(function() {
				$('#counter').dataTable({ "bProcessing": true,"bDeferRender": true,"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": false,"aaSorting": [[ "0", "asc" ]],"bSort": true,"sScrollY": "400px"
				
						});
			} );
			// add to favourite
			function addtofav(str)
			{
				$.ajax({
  				type: "GET",
  				url: "index.php?watch=andfav&com="+str
  				//data: { com: "str" }
				}).done(function( msg ) {
		  		alert(  msg );
				});
			}
			//conn
			var chg = 0;
			var ws;
			var feed;
			var list3 = null;
			var list4 = null;
			var data = new Array();
		 // Let the library know where WebSocketMain.swf is:
  		WEB_SOCKET_SWF_LOCATION = "views/socket/WebSocketMain.swf";

  		// Write your code in the same way as for native WebSocket:
  		ws = new WebSocket("ws://10.10.0.99:8083/");
  		ws.onopen = function() {
    	//ws.send("Hello");  // Sends a message.
		document.getElementById("connection").innerHTML = "Connected";
		document.getElementById("connection").style.color = "green";
  		};
  		ws.onmessage = function(e) {
    	// Receives a message.
    	//alert(e.data);
		if(data != "Connected to Feed Server.")
		{
		update(e.data);
		}
  		};
  		ws.onclose = function() {
    	//alert("closed");
		document.getElementById("connection").innerHTML = "close";
		document.getElementById("connection").style.color = "red";
		
  		};
			
			//logic
			
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
				list.getElementsByTagName("td")[3].innerHTML = feed.LAST;
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
				list.getElementsByTagName("td")[6].innerHTML = feed.BUY;
				bc = setcolor(feed.BUY,prev);
				blinkColor3(i, 6, bc);
			}
			if(feed.SELL != undefined)
			{
				//list.getElementsByTagName("td")[7].innerHTML = feed.SELL.toFixed(3);
				list.getElementsByTagName("td")[7].innerHTML = feed.SELL;
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
				list.getElementsByTagName("td")[9].innerHTML = feed.HIGH;
				hc = setcolor(feed.HIGH,prev);
				blinkColor3(i, 9,hc);
			}
			if(feed.LOW != undefined)
			{
				//list.getElementsByTagName("td")[10].innerHTML = feed.LOW.toFixed(3);
				list.getElementsByTagName("td")[10].innerHTML = feed.LOW;
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
	function setcolor(first,second)
	{
		if(first > second)
		{
		return "blue";
		}
		if(first == second)
		{
		return "green";
		}
		if(first < second)
		{
		return "red";
		}
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
}
//blink
//
//odd and even 
//function oddeven(someNumber){
//    return (someNumber%2 == 0) ? "#E2E4FF" : "white";
//};


function blinkColor2(r, c) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
	var bgcolor = document.getElementById("counter").tBodies[0].rows[r].style.background;
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate";
	list = null;
	//bgcolor = null;
    setTimeout(function () { setblinkColor2(r, c,bgcolor) }, 400);
}
function setblinkColor2(r, c,bgcolor) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = bgcolor;
	list = null;
}
//
function blinkColor3(r, c,d) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
	var bgcolor = document.getElementById("counter").tBodies[0].rows[r].style.background;
	//var bgcolor = oddeven(r);
    list.getElementsByTagName("td")[c].style.color = "chocolate";
    list.getElementsByTagName("td")[c].style.background = d;
	list = null;
    setTimeout(function () { setblinkColor3(r, c,d,bgcolor) }, 400);
}
function setblinkColor3(r, c,d,bgcolor) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = d;
    list.getElementsByTagName("td")[c].style.background = bgcolor;
	list = null;
}
//

		</script>
<table width="100%" border="1" bgcolor="#FFFFFF">
  <tr>
    <td align="Left">All Counters</td>
    <td align="right" id="connection" width="50px">&nbsp;</td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="counter">
  <thead>
    <tr>
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
      <th></th>
    </tr>
  </thead>
 <tbody >
  <?php for($i = 0; $i < $views[1] ; $i++) { if($views[0][$i][19] != "1"){?>
    <tr >
      <td><?php echo $views[0][$i][0]; ?></a></td>
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
      <td class="center"><a href='index.php?watch=detail&c=<?php echo $views[0][$i][0]; ?>'>Detail</a>&nbsp;<a href='#' onclick="addtofav('<?php echo $views[0][$i][1];  ?>')">ADD</a></td>
    </tr>
    <?php } } ?>
  </tbody>
  <tfoot>
    <tr>
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
      <th></th>
    </tr>
  </tfoot>
</table>

