		<style type="text/css" title="currentStyle">
			@import "views/media/css/demo_page.css";
			@import "views/media/css/jquery.dataTables.css";
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#counter').dataTable({"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": false,"bSort": true,"sScrollY": "500px"});
			} );
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
			
			//logic
			
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
		 list = document.getElementById("counter").tBodies[0].rows[i];
		if (typeof(list) != 'undefined' && list != null)
		{
  		// exists.
		
		if(list.getElementsByTagName("td")[0].innerHTML == feed.CODE )
		{
			bgcolor = list.getElementsByTagName("td")[0].style.background;
			//console.log(list.getElementsByTagName("td")[0].innerHTML);
			if(feed.LAST != undefined)
			{
				//list.getElementsByTagName("td")[3].innerHTML = feed.LAST.toFixed(3);
				list.getElementsByTagName("td")[3].innerHTML = feed.LAST;
				//blinkColor3(i, 3, color.lsc);
				//list.getElementsByTagName("td")[4].innerHTML = chg.chg.toFixed(3);
				//list.getElementsByTagName("td")[4].innerHTML = chg.chg;
				//blinkColor3(i, 4, color.chgc);
			}
			if(feed.HIGH != undefined)
			{
				//list.getElementsByTagName("td")[9].innerHTML = feed.HIGH.toFixed(3);
				list.getElementsByTagName("td")[5].innerHTML = feed.HIGH;
				//blinkColor3(i, 5, color.hc);
			}
			if(feed.LOW != undefined)
			{
				//list.getElementsByTagName("td")[10].innerHTML = feed.LOW.toFixed(3);
				list.getElementsByTagName("td")[6].innerHTML = feed.LOW;
				//blinkColor3(i, 10, color.lwc);
			}
			break;
		}
		}
		
	}
}

//blink
function blinkColor2(r, c) {
	list = document.getElementById("counter").tBodies[0].rows[r];
	bgcolor = list.getElementsByTagName("td")[0].style.background;
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate";
    setTimeout(function () { setblinkColor2(r, c,bgcolor) }, 400);
}
function setblinkColor2(r, c,bgcolor) {
	list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = bgcolor;
}
//
function blinkColorvol(r, c) {
	list = document.getElementById("counter").tBodies[0].rows[r];
	//var bgcolor = document.getElementById("counter").tBodies[0].rows[r].style.background;
	bgcolor = list.getElementsByTagName("td")[0].style.background;
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate";
    setTimeout(function () { setblinkColorvol(r, c,bgcolor) }, 400);
}
function setblinkColorvol(r, c,bgcolor) {
	list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = bgcolor;
	sorting(r);
}
//
function blinkColor3(r, c,d) {
	list = document.getElementById("counter").tBodies[0].rows[r];
	bgcolor = document.getElementById("counter").tBodies[0].rows[r].style.background;
	//var bgcolor = oddeven(r);
    list.getElementsByTagName("td")[c].style.color = "chocolate";
    list.getElementsByTagName("td")[c].style.background = d;
    setTimeout(function () { setblinkColor3(r, c,d,bgcolor) }, 400);
}
function setblinkColor3(r, c,d,bgcolor) {
	list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = d;
    list.getElementsByTagName("td")[c].style.background = bgcolor;
}
		</script>

		<table width="100%" border="1" bgcolor="#FFFFFF"  >
  <tr>
    <td align="Left">All Index</td>
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
      <th>HIGH</th>
      <th>LOW</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php for($i = 0; $i < $views[1] ; $i++) { if($views[0][$i][19] != "0"){ ?>
    <tr >
      <td><?php echo $views[0][$i][0]; ?></td>
      <td><?php echo $views[0][$i][1]; ?></td>
      <td><?php echo $views[0][$i][2]; ?></td>
      <td class="center"><?php echo $views[0][$i][3]; ?></td>
      <td class="center"><?php echo $views[0][$i][4]; ?></td>
      <td class="center"><?php echo $views[0][$i][9]; ?></td>
      <td class="center"><?php echo $views[0][$i][10]; ?></td>
      <td><a href='index.php?watch=detail&c=<?php echo $views[0][$i][0]; ?>'>Detail</a>&nbsp;<a href='#' onclick="addtofav('<?php echo $views[0][$i][1];  ?>')">ADD</a></td>
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
      <th>HIGH</th>
      <th>LOW</th>
      <th></th>
    </tr>
  </tfoot>
</table>

