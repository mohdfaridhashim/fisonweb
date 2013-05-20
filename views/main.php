<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Financial Information System</title>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
    <script type="text/javascript">
        $(function() {
            var offset = $("#sidebar").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#sidebar").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#sidebar").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
		
		var auto_refresh = setInterval(
		function ()
		{
		$('#load_twickers').load('index.php?watch=ticker').fadeIn("slow");
		}, 10000); // refresh every 10000 milliseconds
    </script>

<style type="text/css">
<!--
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	background: url(views/img2/bg2.jpg) no-repeat center center fixed; 
  	-webkit-background-size: cover;
  	-moz-background-size: cover;
  	-o-background-size: cover;
  	background-size: cover;
}

h2 {
	color:#FFF;
	padding: 0px;
	margin: 3px;
	}
	
#left  {
	float:left;
	width: 100px;
	}	

#title_bar {
	color:#FFF;
	background: #099;
	border-bottom: 2px #0C9 double;
	}
	
#title_link {
	height: 19px;
	background:url(views/img2/top_menu_in.png) repeat-x;
	float:left;
	font-style: normal;
	font-size:11px;
	text-decoration: none;
	padding:5px 15px;
	color: #333;
	}
	
#title_link:hover {
	background:url(views/img2/50grey.png);
	color:#FFF;
	text-decoration: underline;
	}
	
#logout {
	float:right;
	margin-left:10px;
	font-style: normal;
	text-decoration: none;
	padding: 5px;
	color: #FFF;
	}	
	
#ticker {
	background: url(views/img2/tickerBG.png) #000 repeat-x;
	border-bottom: #333 1px solid;
	font-size:11px;
	color:#FFF;
	margin-bottom:1px;
	}
	
#profile {
	font-size:11px;
	width:100px;
	border-bottom:1px solid #CCC;
	}	
	
#profile_title {
	-webkit-border-radius: 0px 4px 0px 0px;
	-moz-border-radius: 0px 4px 0px 0px;
	border-radius: 0px 4px 0px 0px;
	background:url(views/img2/profileTitle.png)repeat-x top;
	margin: 0px;
	padding: 5px;
	height: 25px;
	}
	
#profile_info {
	background-color:#FFF;
	color:#333;
	padding:5px;
	-webkit-border-radius: 0px 0px 4px 0px;
	-moz-border-radius: 0px 0px 4px 0px;
	border-radius: 0px 0px 4px 0px;
	}
	
#FMPtitle {
	padding:3px;
	background-image: url(views/img2/bgTitleTest.png);
	background-repeat: repeat-x;
	background-position: top;
	background-color: #006666;
	-webkit-border-radius: 4px 4px 0px 0px;
	-moz-border-radius: 4px 4px 0px 0px;
	border-radius: 4px 4px 0px 0px;
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
	
#sidebar {
	float:left;
	color:#FFF;
	width:150px;
	}	

	
#clear {
	clear:both;
	}	
	
#ads {
	margin:10px 5px;
	}	
	
.adspic {
	border: 3px solid #CCC;
	margin: 0px auto;
	}	
	
	
	
	

-->
</style></head>

<body>
<div style="width:1200px; margin:0px auto; background-color:#FFF;">
  <div id="title_bar">
  
    <img src="views/img2/FBMlogo.png" width="143" height="30" style=" margin:10px; font-size:20px; float:left;" />  
      
    <div style="margin:0px auto; width:550px;">
    
    <img src="views/img2/top_menu_left.png" width="14" height="29" style="float:left;" />    
    <a href="index.php?watch=allc" id="title_link" target="stocktable">Allcounter</a>
    <a href="index.php?watch=fav" id="title_link" target="stocktable">Favourite</a>
    <a href="index.php?watch=active" id="title_link" target="stocktable">Most Actives</a>
    <a href="index.php?watch=gain" id="title_link" target="stocktable">Most Gainers</a>
    <a href="index.php?watch=loser" id="title_link" target="stocktable">Most Losers</a>
    <a href="index.php?watch=allindex" id="title_link" target="stocktable">All Index</a>     
    <img src="views/img2/top_menu_right.png" width="14" height="29" style="float:left;" />    
    </div>
            
    <div style="float:right; margin-top:10px; padding: 5px 30px 5px 5px; font-size:11px; background: url(views/img2/50grey.png); border-bottom:1px solid #0CC;"><?php echo date('l jS \of F Y '); ?></div>
    
    <br clear="all" />    
  </div>
  
<!--ticker-->  
<div id="ticker">

    <div style="float:left; padding:0px 0px; width:100%;">
    	
<iframe name="crawler" src="index.php?watch=ticker" width="1200" frameborder="0" height="50" scrolling="no" ></iframe>

    </div>

  <div id="clear"></div>
  </div>
  
 
<!--ticker-->   

<div id="left">

<div id="profile">
<h2 id="profile_title">&nbsp;PROFILE</h2>
<DIV id="profile_info">
<img src="views/img2/profile_pic.jpg" />
Name:<br/><strong><?php echo $userdata[3];?></strong><br/>
Company:<br/><strong><?php echo $userdata[8];?></strong><br/>
<br/>
Last login:<br/><strong><?php echo $userdata[9][0];?></strong><br/>
<br/><br/>
<a href="index.php?watch=logout" style="float:right">Log Out</a>
<br/>
</DIV>
</div><!--profile end--->

<div id="ads"><img class="adspic" src="views/img2/Ad02.jpg"/></div>

<div id="ads"><img class="adspic" src="views/img2/Ad03.jpg"/></div>

<div id="clear"></div>
</div><!--left end--->

<div style="float:left; background: url(views/img2/50grey.png); min-height:500px; width:950px;">
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
<iframe name="stocktable" src="index.php?watch=<?php echo $link; ?><?php if(isset($_GET['c'])){ echo "&c=".$_GET['c']; } ?>" width="100%" frameborder="0" height="500" scrolling="no" ></iframe>
</div>

<div id="sidebar">
<div id="FMPtitle">Final Market Report<br/></div>

<iframe name="crawler" src="index.php?watch=score" width="100%" frameborder="0" height="150" scrolling="no" ></iframe>
</div>
<div id="clear"></div>
<br clear="all" /> 
<div style="background:#099;">
	<div style="margin: 0px auto; width: 50%; clear:both; text-align:center; padding:10px 0px; color: #6FF; font-size:10px;">
    © 2013 BERNAMA Systems and Solutions Advisor. All rights reserved.
    <br/>
    Best viewed in Mozilla Firefox 8.0 or later with 1024 x 768 resolution
    </div>
</div>
</div>
</body>
</html>
