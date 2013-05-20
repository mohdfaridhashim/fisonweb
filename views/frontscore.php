<script type="text/javascript" src="views/socket/swfobject.js"></script>
<script type="text/javascript" src="views/socket/web_socket.js"></script>
<script>
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
		updatescore(e.data);
		e.data = null;
  		};
  		ws.onclose = function() {
    	//alert("closed");
  		};
		//logic
		function updatescore(data)
		{
			feed = eval('('+data+')');
			if(feed.CODE == "200")
			{
				document.getElementById("ci").innerHTML  = feed.LAST;
				document.getElementById("chg").innerHTML  = feed.CHG.toFixed(3);
			}
			if(feed.TOTALVOL != undefined)
			{
				document.getElementById("tvol").innerHTML  = feed.TOTALVOL;
			}
			if(feed.TOTALVAL != undefined)
			{
				document.getElementById("tval").innerHTML  = feed.TOTALVAL;
			}
			if(feed.LOSER != undefined)
			{
				document.getElementById("down").innerHTML  = feed.LOSER;
			}
			if(feed.GAINER != undefined)
			{
				document.getElementById("up").innerHTML  = feed.GAINER;
			}
			feed = null;
			data = null;
		}
</script>
<style>
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	/*
	background: url(views/img2/bg2.jpg) no-repeat center center fixed;  */
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
}
#FMPcontent {
	font-size:10px;
	color:#FFFFFF;
	background-image: url(views/img2/bgTitleTest.jpg);
	background-repeat: repeat-x;
	background-position: top;
	background-color: #333;
	padding: 3px;
	}	

#FMPvalue {
	font-size:10px;
	color:#FFFFFF;
	/*background-image: url(views/img2/bgTitleTest.jpg);
	background-repeat: repeat-x;*/
	background-position: top;
	padding: 3px;
	}
</style>
<table border="0"  width="150px" cellspacing="0" cellpadding="0" id="score">
  <tr>
    <td id="FMPcontent">PREVIOUS</td>
    <td bgcolor="#CC0000" id="FMPvalue"><span id="prev"><?php echo $views[1][2]; ?></span></td>
  </tr>
  <tr>
    <td id="FMPcontent">CHANGE</td>
    <td bgcolor="#0066CC" id="FMPvalue"><span id="chg"><?php echo round($views[1][4],4); ?></span></td>
  </tr>
  <tr>
    <td id="FMPcontent">UP</td>
    <td bgcolor="#0066CC" id="FMPvalue"><span id="up"><?php echo $views[0][2]; ?></span></td>
  </tr>
  <tr>
    <td id="FMPcontent">DOWN</td>
    <td bgcolor="#FF9900" id="FMPvalue"><span id="down"><?php echo $views[0][3]; ?></span></td>
  </tr>
  <tr>
    <td id="FMPcontent">TVOL</td>
    <td bgcolor="#FF9900" id="FMPvalue"><span id="tvol"><?php echo $views[0][1]; ?></span></td>
  </tr>
  <tr>
    <td id="FMPcontent">VALUE</td>
    <td bgcolor="#009900" id="FMPvalue"><span id="tval"><?php echo $views[0][0]; ?></span></td>
  </tr>
  <tr>
    <td id="FMPcontent">FBMKLCI</td>
    <td bgcolor="#009900" id="FMPvalue"><span id="ci"><?php echo $views[1][3]; ?></span></td>
  </tr>
</table>