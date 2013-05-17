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
				$('#counter').dataTable({ "bProcessing": true,"bDeferRender": true,"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": false,"aaSorting": [[ "0", "asc" ]],"bSort": true,"sScrollY": "500px"
				
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
				var ws;
				var feed;
		 // Let the library know where WebSocketMain.swf is:
  		WEB_SOCKET_SWF_LOCATION = "views/socket/WebSocketMain.swf";

  		// Write your code in the same way as for native WebSocket:
  		ws = new WebSocket("ws://10.10.0.99:8083/");
  		ws.onopen = function() {
    	//ws.send("Hello");  // Sends a message.
  		};
  		ws.onmessage = function(e) {
    	// Receives a message.
    	//alert(e.data);
		update(e.data);
		
  		};
  		ws.onclose = function() {
    	alert("closed");
  		};
					
			/* view logic */
function update(data)
{
	feed = eval('('+data+')');

	
	//var feed = eval(data);
	//console.log(data);
	//var color = eval(data);
	//var chg = eval(data3);
	//note: this loop is temporary, need optmization
	for(var i= 1; i <= 1635; i++)
	{
		//var  list = document.getElementById('counter');
		var  list = document.getElementById("counter").tBodies[0].rows[i];
		if (typeof(list) != 'undefined' && list != null)
		{
  		// exists.
		
		if(list.getElementsByTagName("td")[0].innerHTML == feed.CODE )
		{
			//console.log(list.getElementsByTagName("td")[0].innerHTML);
			if(feed.LAST != undefined)
			{
				//list.getElementsByTagName("td")[3].innerHTML = feed.LAST.toFixed(3);
				list.getElementsByTagName("td")[3].innerHTML = feed.LAST;
				chg = feed.LAST - list.getElementsByTagName("td")[2].innerHTML;
				list.getElementsByTagName("td")[4].innerHTML = chg.toFixed(3);
				//blinkColor3(i, 3, color.lsc);
				//list.getElementsByTagName("td")[4].innerHTML = chg.chg.toFixed(3);
				//list.getElementsByTagName("td")[4].innerHTML = chg.chg;
				//blinkColor3(i, 4, color.chgc);
				
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
				//blinkColor3(i, 6, color.byc);
			}
			if(feed.SELL != undefined)
			{
				//list.getElementsByTagName("td")[7].innerHTML = feed.SELL.toFixed(3);
				list.getElementsByTagName("td")[7].innerHTML = feed.SELL;
				//blinkColor3(i, 7, color.slc);
			}
			if(feed.SCUM != undefined)
			{
				list.getElementsByTagName("td")[8].innerHTML = feed.SCUM;
				//blinkColor2(i, 8);
			}
			if(feed.HIGH != undefined)
			{
				//list.getElementsByTagName("td")[9].innerHTML = feed.HIGH.toFixed(3);
				list.getElementsByTagName("td")[9].innerHTML = feed.HIGH;
				//blinkColor3(i, 9, color.hc);
			}
			if(feed.LOW != undefined)
			{
				//list.getElementsByTagName("td")[10].innerHTML = feed.LOW.toFixed(3);
				list.getElementsByTagName("td")[10].innerHTML = feed.LOW;
				//blinkColor3(i, 10, color.lwc);
			}
			if(feed.VOL != undefined)
			{
				list.getElementsByTagName("td")[11].innerHTML = feed.VOL;
				blinkColor2(i, 11);
				//if(pilihan == 11)
				//{
				//alert("sort by active");
				//sorting(i);
				//}//end sort
			}
			break;
			
		}
		}
		
	}
	list = null;
	feed = null;
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
	bgcolor = null;
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
    setTimeout(function () { setblinkColor3(r, c,d,bgcolor) }, 400);
}
function setblinkColor3(r, c,d,bgcolor) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = d;
    list.getElementsByTagName("td")[c].style.background = bgcolor;
}
//

		</script>
<table width="100%" border="1" bgcolor="#FFFFFF">
  <tr>
    <td align="Left">All Counters</td>
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
  <tbody>
  <?php for($i = 0; $i < $allc_rows ; $i++) { if($allc[$i][19] != "1") {?>
    <tr id=<?php echo $i; ?>>
      <td><?php echo $allc[$i][0]; ?></td>
      <td><?php echo $allc[$i][1]; ?></td>
      <td><?php echo $allc[$i][2]; ?></td>
      <td ><?php echo $allc[$i][3]; ?></td>
      <td ><?php echo $allc[$i][4]; ?></td>
      <td ><?php echo $allc[$i][5]; ?></td>
      <td ><?php echo $allc[$i][6]; ?></td>
      <td ><?php echo $allc[$i][7]; ?></td>
      <td ><?php echo $allc[$i][8]; ?></td>
      <td ><?php echo $allc[$i][9]; ?></td>
      <td ><?php echo $allc[$i][10]; ?></td>
      <td ><?php echo $allc[$i][11]; ?></td>
      <td><a href='index.php?watch=detail&c=<?php echo $allc[$i][0]; ?>'>Detail</a>&nbsp;<a href='#' onclick="addtofav('<?php echo $allc[$i][1];  ?>')">ADD</a></td>
    </tr>
    <?php }} ?>
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

