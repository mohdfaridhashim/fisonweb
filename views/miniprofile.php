<style>
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
</style>
<div id="profile">
<h2 id="profile_title">&nbsp;PROFILE</h2>
<DIV id="profile_info">
<img src="views/img2/profile_pic.jpg" />
Name:<br/><strong><?php echo $views[0][3];?></strong><br/>
Company:<br/><strong><?php echo $views[0][8];?></strong><br/>
<br/>
Last login:<br/><strong><?php echo $views[0][9][0];?></strong><br/>
<br/><br/>
<a href="index.php?watch=logout" target="_parent" style="float:right">Log Out</a>
<br/>
</DIV>
