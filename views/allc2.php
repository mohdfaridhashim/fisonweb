		<style type="text/css" title="currentStyle">
			/*@import "views/media/css/demo_page.css";*/
			@import "views/media/css/jquery.dataTables.css";
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			// define grid table
			$(document).ready(function() {
				$('#counter').dataTable({"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": false,"aaSorting": [[ "0", "asc" ]],"bSort": true,"sScrollY": "500px"
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
			$(function(){
    var socket = io.connect('http://<?php echo SERVER_IP?>:8083');
   io.transports = ['websocket', 'flashsocket', 'htmlfile', 'xhr-multipart', 'xhr-polling', 'jsonp-polling'];
   
    socket.on('connect', function () {
      socket.on('fis', function(data,data2,data3) {
		//console.log(data2);
		//var msg2 = eval('('+data2+')');
		//var msg = eval(data);
		//$('#messages').append(msg.chgc+msg2.CODE);
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

   
  });
			
			//logic
			
			/* view logic */
function update(data,data2,data3)
{
	//var feed = eval('('+data2+')');
	var feed = eval(data2);
	var color = eval(data);
	var chg = eval(data3);
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
}
//blink
//
function blinkColor2(r, c) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate ";
    setTimeout(function () { setblinkColor2(r, c) }, 400);
}
function setblinkColor2(r, c) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "white";
    list.getElementsByTagName("td")[c].style.background = "#000";
}
//
function blinkColor3(r, c,d) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "chocolate";
    list.getElementsByTagName("td")[c].style.background = d;
    setTimeout(function () { setblinkColor3(r, c,d) }, 400);
}
function setblinkColor3(r, c,d) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = d;
    list.getElementsByTagName("td")[c].style.background = "#000";
}
//
		</script>
<table width="100%" border="1" bgcolor="#FFFFFF">
  <tr>
    <td align="Left">Most Actives</td>
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
  <?php for($i = 0; $i < $allc_rows ; $i++) { ?>
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
      <td><input name="a" type="button" class="button-link" value="ADD" style="font-size:10px;" title="Add to favourite" onclick="addtofav('<?php echo $allc[$i][1];  ?>')"/></td>
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

