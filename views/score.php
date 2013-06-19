<script type="text/javascript" src="views/socket/swfobject.js"></script>
<script type="text/javascript" src="views/socket/web_socket.js"></script>
<script>

function start(){
		//conn
		var number = 1;
		var ws;
		var feed;
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
	updatescore(event.data);
    },


    onError = function() {
        console.log("We got an error.");
    },

    
    socket = new WebSocket("ws://10.10.0.46:8083/");

socket.onopen = onOpen;
socket.onclose = onClose;
socket.onerror = onError;
socket.onmessage = onMessage;
		
		//logic
		function updatescore(data)
		{
			feed = eval('('+data+')');
			if(feed.CODE == "200")
			{
				document.getElementById("ci").innerHTML  = feed.LAST.toFixed(3);
				if(feed.LAST.toFixed(3) > document.getElementById("prev").innerHTML)
				{
				document.getElementById("ci").style.color = "#00CCFF";
				}
				if(feed.LAST.toFixed(3) == document.getElementById("prev").innerHTML)
				{
				document.getElementById("ci").style.color = "#00FF33";
				}
				if(feed.LAST.toFixed(3) < document.getElementById("prev").innerHTML)
				{
				document.getElementById("ci").style.color = "#900";
				}
				//chg
				document.getElementById("chg").innerHTML  = feed.CHG.toFixed(3);
				if(feed.CHG.toFixed(3) > 0)
				{
				document.getElementById("chg").style.color = "#00CCFF";
				}
				if(feed.CHG.toFixed(3) == 0)
				{
				document.getElementById("chg").style.color = "#00FF33";
				}
				if(feed.CHG.toFixed(3) < 0)
				{
				document.getElementById("chg").style.color = "#900";
				}
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
			if(feed.NOTTRADED != undefined)
			{
				document.getElementById("not").innerHTML  = feed.NOTTRADED;
			}
			if(feed.UNCHANGE != undefined)
			{
				document.getElementById("unchg").innerHTML  = feed.UNCHANGE;
			}
			feed = null;
			data = null;
		}
}
start();
</script>
<style>
body {
	background-color: #333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	background-image: url(views/img/bg.png);
	background-repeat: repeat;
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
	font-size:14px;
	color:#FFFFFF;
	/*background-image: url(views/img2/bgTitleTest.jpg);
	background-repeat: repeat-x;*/
	background-position: top;
	padding: 3px;
	}
</style>
<table border="1" width="100%" cellspacing="0" cellpadding="0" id="score">
  <tr>
    <td id="FMPcontent">PREVIOUS</td>
    <td id="FMPcontent">FBMKLCI</td>
    <td id="FMPcontent">CHANGE</td>
    <td id="FMPcontent">UP</td>
    <td id="FMPcontent">DOWN</td>
    <td id="FMPcontent">UNCHANGED</td>
    <td id="FMPcontent">NOTTRADED</td>
    <td id="FMPcontent">TVOL</td>
    <td id="FMPcontent">VALUE</td>
    </tr>
    <tr bgcolor="#000000" id="FMPvalue" align="right">
    <td><span id="prev"><?php echo $views[1][2]; ?></span></td>
    <td><span id="ci"><?php echo $views[1][3]; ?></span></td>
     <td><span id="chg"><?php echo round($views[1][4],4); ?></span></td>
    <td><span id="up"><?php echo $views[0][2]; ?></span></td>
    <td><span id="down"><?php echo $views[0][3]; ?></span></td>
        <td><span id="unchg"><?php echo $views[0][4]; ?></span></td>
    <td><span id="not"><?php echo $views[0][3]; ?></span></td>
	 <td><span id="tvol"><?php echo $views[0][1]; ?></span></td>
    <td ><span id="tval"><?php echo $views[0][0]; ?></span></td>


  </tr>
</table>