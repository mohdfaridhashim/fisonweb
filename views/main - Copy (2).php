<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FIS ON WEB</title>
<style type="text/css">
<!--
body {
	background-color: #333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(views/img/bg.png);
	background-repeat: repeat;
}

body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
	
h3 {
	padding: 0px;
	margin: 0px;
	font-size:14px;
	color:#ffcc00;
	}
	
-->
</style>

<link href="views/css/MWcss.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="mainContainer">

<div id="leftContainer">

	<div>
    <img src="views/img/FBMlogo.png" />
    <p/><p/>
    
<div id="statusContainer">
    
	<h3>CONNECTION STATUS</h3>
   	  <div style="padding: 5px;">
        <div id="statusOffline"></div>
        &nbsp;
        <span class="offline">Offline</span>
        <br clear="all" />
        </div>
      </div>
        <p/>
        
<div id="accountContainer">
    <h3>ACCOUNT</h3>
    <div id="profile">
        <DIV id="profile_info">
        	<div align="center"><img class="imej" src="views/img/profile_pic.jpg" /></div>
       		 <p/>
        	<span class="greyfont">Name:</span><br/><strong><?php echo $userdata[3];?></strong><br/>
        	<span class="greyfont">Company:</span><br/><strong><?php echo $userdata[8];?></strong><br/>
        	<span class="greyfont">Package:</span><br/><strong>FISlite</strong><br/>
        	<span class="greyfont">Last login:</span><br/><strong><?php echo $userdata[9][0];?></strong><br/>
        </DIV>
     </div>
</div>
<p/>
    
    <div id="marketContainer"> 
   <h3>MARKET</h3>
   
   <ul id="ulmarket">
   	<li><a href="index.php?watch=allc" target="stocktable">EQUITIES</a></li>
    	<li id="ulmarketin"><a href="index.php?watch=active" target="stocktable">Most Active</a></li>
        <li id="ulmarketin"><a href="index.php?watch=gain" target="stocktable">Top Gainers</a></li>
        <li id="ulmarketin"><a href="index.php?watch=loser" target="stocktable">Top Losers</a></li>   
    </ul>
    <p/>
    
       <ul id="ulmarket">
       <li><a href="#">DERITATIVES</a></li>
            <li id="ulmarketin"><a href="#" target="stocktable">FKLI</a></li>
            <li id="ulmarketin"><a href="#" target="stocktable">FCPO</a></li>
            <li id="ulmarketin"><a href="#" target="stocktable">FPKO</a></li>
            <li id="ulmarketin"><a href="#" target="stocktable">OKLI</a></li>   
    </ul>
    <p/>
     <ul id="ulmarket">
       <li><a href="index.php?watch=allindex" target="stocktable">INDICES</a></li>
    </ul>
    <p/>
    </div>
    <p/>
    
    
    <p/>
    
    <a href="index.php?watch=logout" style="color:#ffcc00;">Log Out</a>    </div>
    
</div>

<div id="rightContainer">

    <ul id='menubar'>
    <li><img src="views/img/corner.png"/></li>
    <li><a  href='#'>MARKET WATCH</a></li>
    <li><a  href='index.php?watch=fav' target="stocktable">FAVOURITE</a></li>
    <li><on>CHART</on></li>
    <li><a href='#'>NEWS</a></li>
    <li><a href='#' style="border-right:none;">ALERT</a></li>
    <li><img src="views/img/corner2.png"/></li>
    </ul>
<br clear="all" /><br/>
<?php
 if(isset($_GET['p']))
 { 
 	//if($_GET['pilih'] != "home")
	//{
 	$link = $_GET['p']; 
	//}
	//else
	//{
	//$link = "allindex" ;
	//}
 }
 else { 
 $link = "allc" ;
 }

 ?>
<table align="left">
<tr><td>
<iframe name="stocktable" src="index.php?watch=<?php echo $link; ?><?php if(isset($_GET['c'])){ echo "&c=".$_GET['c']; } ?>" height="500" width="805" frameborder="0" scrolling="no"></iframe></td>
</tr>
<tr><td>
<iframe name="crawler" src="index.php?watch=ticker" width="805" frameborder="0" height="50" scrolling="no" ></iframe></td>
</tr>
<tr><td>
<iframe name="crawler" src="index.php?watch=score" width="800" frameborder="0" height="40" scrolling="no" ></iframe>
</td></tr>
</table>
<br clear="all" />
<div id="footer">
	<div id="footerText">
    2013 BERNAMA Systems and Solutions Advisor. <br />
    All rights reserved.<br />
Best viewed in Mozilla Firefox 8.0 or later with 1024 x 768 resolution </div>
    
<br clear="all" />
</div>

<br clear="all" />
</div>

</body>
</html>
