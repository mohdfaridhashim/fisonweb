		<style type="text/css" title="currentStyle">
			@import "views/media/css/demo_page.css";
			@import "views/media/css/jquery.dataTables.css";
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#counter').dataTable({"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": false,"sScrollY": "400px"});
			} );
			function deltofav(str,id)
			{
				$.ajax({
  				type: "GET",
  				url: "index.php?watch=delfav&com="+str
  				//data: { com: "str" }
				}).done(function( msg ) {
		  		alert(  msg );
				document.getElementById(id).remove();
				});
			}
			
			//conn

	$(function(){
			var data = new Array();
			var color = new Array();
			var color2 = new Array();
			var list3 = null;
			var list4 = null;
			var list = null;
			var list2 = null;
			var a = 0;
			var feed = 0;
			var color = 0;
			var chg = 0;
			var bgcolor = null;
			
   		 	var socket = io.connect('http://<?php echo SERVER_IP?>:8083');
   			io.transports = ['websocket', 'flashsocket', 'htmlfile', 'xhr-multipart', 'xhr-polling', 'jsonp-polling'];
   
    		socket.on('connect', function () {
      			socket.on('fis', function(data,data2,data3) {
				update(data,data2,data3);
      			});
				socket.on('refresh', function(msg) {
				setTimeout("location.reload(true);",1500);		
      			});
	  			socket.on('ping', function(data){
	  			});
      			socket.on('disconnect', function() {
        		document.getElementById("messages").innerHTML = 'disconnect';
      			});
	  			socket.on('error', function() {
        		document.getElementById("messages").innerHTML = 'error';
      			});
    		});
			
						/* view logic */
function update(data,data2,data3)
{
	//var feed = eval('('+data2+')');
	feed = eval(data2);
	color = eval(data);
	chg = eval(data3);
	bgcolor = null;
	/*
			var data = new Array();
			var color = new Array();
			var color2 = new Array();
			var list3 = null;
			var list4 = null;
			var list = null;
			*/
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
				blinkColor3(i, 3, color.lsc);
				//list.getElementsByTagName("td")[4].innerHTML = chg.chg.toFixed(3);
				list.getElementsByTagName("td")[4].innerHTML = chg.chg;
				blinkColor3(i, 4, color.chgc);
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
				blinkColor3(i, 6, color.byc);
			}
			if(feed.SELL != undefined)
			{
				//list.getElementsByTagName("td")[7].innerHTML = feed.SELL.toFixed(3);
				list.getElementsByTagName("td")[7].innerHTML = feed.SELL;
				blinkColor3(i, 7, color.slc);
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
				blinkColor3(i, 9, color.hc);
			}
			if(feed.LOW != undefined)
			{
				//list.getElementsByTagName("td")[10].innerHTML = feed.LOW.toFixed(3);
				list.getElementsByTagName("td")[10].innerHTML = feed.LOW;
				blinkColor3(i, 10, color.lwc);
			}
			if(feed.VOL != undefined)
			{
				list.getElementsByTagName("td")[11].innerHTML = feed.VOL;
				blinkColorvol(i, 11);
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

});
		</script>
		<table width="100%" border="1" bgcolor="#FFFFFF"  >
  		<tr>
    	<td align="center">Favourite</td>
  		</tr>
		</table>        
        <?php  if($views[1] == 0) {  ?>
		<table width="100%" border="1" bgcolor="#FFFFFF"  >
  		<tr>
    	<td align="center">No Record</td>
  		</tr>
		</table>
		<?php  } else {?>
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
  <?php for($i = 0; $i < $views[1] ; $i++) { ?>
    <tr  id="<?php echo $i; ?>">
      <td><?php echo $views[0][$i][0]; ?></td>
      <td><?php echo $views[0][$i][1]; ?></td>
      <td><?php echo $views[0][$i][2]; ?></td>
      <td class="center"><?php echo $views[0][$i][3]; ?></td>
      <td class="center"><?php echo $views[0][$i][4]; ?></td>
      <td class="center"><?php echo $views[0][$i][5]; ?></td>
      <td class="center"><?php echo $views[0][$i][6]; ?></td>
      <td class="center"><?php echo $views[0][$i][7]; ?></td>
      <td class="center"><?php echo $views[0][$i][8]; ?></td>
      <td class="center"><?php echo $views[0][$i][9]; ?></td>
      <td class="center"><?php echo $views[0][$i][10]; ?></td>
      <td class="center"><?php echo $views[0][$i][11]; ?></td>
      <td><a href='index.php?watch=detail&c=<?php echo $views[0][$i][0]; ?>'>Detail</a>&nbsp;<a href='#' onclick="deltofav('<?php echo $views[0][$i][1];  ?>')">DELETE</a></td>
    </tr>
    <?php } ?>
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
<?php  }?>
