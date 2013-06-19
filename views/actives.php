		<style type="text/css" title="currentStyle">
			/*@import "views/media/css/demo_page.css";
			@import "views/media/css/jquery.dataTables.css"; */
			body {
	background-color: #333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(img/bg.png);
	background-repeat: repeat;
}

body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
	
			
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
		jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
	return ((x < y) ? -1 : ((x > y) ?  1 : 0));
};

jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
	return ((x < y) ?  1 : ((x > y) ? -1 : 0));
};
	// define grid table
			$(document).ready(function() {
				$('#counter').dataTable({"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": false,"bFilter":false,"aaSorting": [[ "11", "desc" ]],"bSort": false,"sScrollY": "500px"
				
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
    var socket = io.connect('http://10.10.0.100:8083');
   io.transports = ['websocket', 'flashsocket', 'htmlfile', 'xhr-multipart', 'xhr-polling', 'jsonp-polling'];
   
    socket.on('connect', function () {
      socket.on('fis', function(data,data2,data3) {
		//console.log(data2);
		//var msg2 = eval('('+data2+')');
		//var msg = eval(data);
		//$('#messages').append(msg.chgc+msg2.CODE);
		update(data,data2,data3);
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
				blinkColorvol(i, 11);
				//if(pilihan == 11)
				//{
				//alert("sort by active");
				
				//sortTheTable();
				//laddersort(i);
				//}//end sort
			}
			break;
		}
		}
		
	}
}
//blink
function blinkColor2(r, c) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
	var bgcolor = document.getElementById("counter").tBodies[0].rows[r].style.background;
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate";
    setTimeout(function () { setblinkColor2(r, c,bgcolor) }, 400);
}
function setblinkColor2(r, c,bgcolor) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = bgcolor;
}
//
function blinkColorvol(r, c) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
	var bgcolor = document.getElementById("counter").tBodies[0].rows[r].style.background;
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate";
    setTimeout(function () { setblinkColorvol(r, c,bgcolor) }, 400);
}
function setblinkColorvol(r, c,bgcolor) {
	var list = document.getElementById("counter").tBodies[0].rows[r];
    list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = bgcolor;
	sorting(r);
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
//sort
         
function sorting(value)
{
			var data = new Array();
			var color = new Array();
			var color2 = new Array();
			//var a = i;
			var a = parseInt(value);
			var b = parseInt(a -1);
			//var b = 3;
			while(a > 0)
			{
			b= parseInt(a-1);
			//var table = document.getElementById("example");
			var list3=document.getElementById("counter").tBodies[0].rows[a];

			var list4= document.getElementById("counter").tBodies[0].rows[b];
			//if(list3.getElementsByTagName("td")[4].innerHTML == 5)
			//{
			data[0] = list3.getElementsByTagName("td")[0].innerHTML;
			data[1] = list3.getElementsByTagName("td")[1].innerHTML;
			data[2] = list3.getElementsByTagName("td")[2].innerHTML;
			data[3] = list3.getElementsByTagName("td")[3].innerHTML;
			data[4] = list3.getElementsByTagName("td")[4].innerHTML;
			data[5] = list3.getElementsByTagName("td")[5].innerHTML;
			data[6] = list3.getElementsByTagName("td")[6].innerHTML;
			data[7] = list3.getElementsByTagName("td")[7].innerHTML;
			data[8] = list3.getElementsByTagName("td")[8].innerHTML;
			data[9] = list3.getElementsByTagName("td")[9].innerHTML;
			data[10] = list3.getElementsByTagName("td")[10].innerHTML;
			data[11] = list3.getElementsByTagName("td")[11].innerHTML;
			data[12] = list3.getElementsByTagName("td")[12].innerHTML;
			
			//color last,chg,buy,sell,high,low
			color[0] = list3.getElementsByTagName("td")[3].style.color;
			color[1] = list3.getElementsByTagName("td")[4].style.color;
			color[2] = list3.getElementsByTagName("td")[6].style.color;
			color[3] = list3.getElementsByTagName("td")[7].style.color;
			color[4] = list3.getElementsByTagName("td")[9].style.color;
			color[5] = list3.getElementsByTagName("td")[10].style.color;
			
			//color2 last,chg,buy,sell,high,low
			color2[0] = list4.getElementsByTagName("td")[3].style.color;
			color2[1] = list4.getElementsByTagName("td")[4].style.color;
			color2[2] = list4.getElementsByTagName("td")[6].style.color;
			color2[3] = list4.getElementsByTagName("td")[7].style.color;
			color2[4] = list4.getElementsByTagName("td")[9].style.color;
			color2[5] = list4.getElementsByTagName("td")[10].style.color;
			
			//sorting
			var c = parseInt(data[11]);
			var d = parseInt(list4.getElementsByTagName("td")[11].innerHTML);
			var e = parseInt(c - d);
			
			if (e > 0)
			{
			//replace
			//alert(e);
			list3.getElementsByTagName("td")[0].innerHTML=list4.getElementsByTagName("td")[0].innerHTML;
			list3.getElementsByTagName("td")[1].innerHTML=list4.getElementsByTagName("td")[1].innerHTML;
			list3.getElementsByTagName("td")[2].innerHTML=list4.getElementsByTagName("td")[2].innerHTML;
			list3.getElementsByTagName("td")[3].style.color = color2[0];
			list3.getElementsByTagName("td")[3].innerHTML=list4.getElementsByTagName("td")[3].innerHTML;
			list3.getElementsByTagName("td")[4].innerHTML=list4.getElementsByTagName("td")[4].innerHTML;
			list3.getElementsByTagName("td")[4].style.color = color2[1];
			list3.getElementsByTagName("td")[5].innerHTML=list4.getElementsByTagName("td")[5].innerHTML;
			list3.getElementsByTagName("td")[6].innerHTML=list4.getElementsByTagName("td")[6].innerHTML;
			list3.getElementsByTagName("td")[6].style.color = color2[2];
			list3.getElementsByTagName("td")[7].innerHTML=list4.getElementsByTagName("td")[7].innerHTML;
			list3.getElementsByTagName("td")[7].style.color = color2[3];
			list3.getElementsByTagName("td")[8].innerHTML=list4.getElementsByTagName("td")[8].innerHTML;
			list3.getElementsByTagName("td")[9].innerHTML=list4.getElementsByTagName("td")[9].innerHTML;
			list3.getElementsByTagName("td")[9].style.color = color2[4];
			list3.getElementsByTagName("td")[10].innerHTML=list4.getElementsByTagName("td")[10].innerHTML;
			list3.getElementsByTagName("td")[10].style.color = color2[5];
			list3.getElementsByTagName("td")[11].innerHTML=list4.getElementsByTagName("td")[11].innerHTML;
			list3.getElementsByTagName("td")[12].innerHTML=list4.getElementsByTagName("td")[12].innerHTML;
			//new value			
			//new value fix
			list4.getElementsByTagName("td")[0].innerHTML = data[0];  //code
			list4.getElementsByTagName("td")[1].innerHTML = data[1];  //symbol
			list4.getElementsByTagName("td")[2].innerHTML = data[2];  // last
			list4.getElementsByTagName("td")[3].style.color = color[0];
			list4.getElementsByTagName("td")[3].innerHTML = data[3];  //prev
			list4.getElementsByTagName("td")[4].innerHTML = data[4];  //chg
			list4.getElementsByTagName("td")[4].style.color = color[1];
			list4.getElementsByTagName("td")[5].innerHTML = data[5];  //bcum
			list4.getElementsByTagName("td")[6].innerHTML = data[6];  //buy
			list4.getElementsByTagName("td")[6].style.color = color[2];
			list4.getElementsByTagName("td")[7].innerHTML = data[7];  //sell
			list4.getElementsByTagName("td")[7].style.color = color[3];
			list4.getElementsByTagName("td")[8].innerHTML = data[8];  //scum
			list4.getElementsByTagName("td")[9].innerHTML = data[9];  //high
			list4.getElementsByTagName("td")[9].style.color = color[4];
			list4.getElementsByTagName("td")[10].innerHTML = data[10]; //low
			list4.getElementsByTagName("td")[10].style.color = color[5];
			list4.getElementsByTagName("td")[11].innerHTML = data[11];  //vol
			list4.getElementsByTagName("td")[12].innerHTML = data[12];  //link
			a--;
			}
			else
			{
				break;
			}
		
		}
	
}
		</script>
        <div id="message"></div>
		<table width="100%" border="1" bgcolor="#FFFFFF"  >
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
  <?php for($i = 0; $i < $views[1] ; $i++) { if($views[0][$i][19] != "1"){?>
    <tr >
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
      <td class="center" ><?php echo $views[0][$i][11]; ?></td>
      <td class="center"><input name="a" type="button" class="button-link" value="ADD" style="font-size:10px;" title="Add to favourite" onclick="addtofav('<?php echo $views[0][$i][1];  ?>')"/></td>
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

