<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="views/js/crawler.js"></script>    
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="views/js/fadeslideshow.js">

/***********************************************
* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>

<script type="text/javascript">

var mygallery=new fadeSlideShow({
	wrapperid: "fadeshow1", //ID of blank DIV on page to house Slideshow
	dimensions: [190, 140], //width/height of gallery in pixels. Should reflect dimensions of largest image
	imagearray: [
		["views/img/slide01.jpg", "", "", "FIS brings you the latest in financial technology"],
		["views/img/slide02.jpg", "#", "_new", "Our product is parrallel to time and time is gold"],
		["views/img/slide03.jpg"]//<--no trailing comma after very last image element!
	],
	displaymode: {type:'auto', pause:2500, cycles:0, wraparound:false},
	persist: false, //remember last viewed slide and recall within same session?
	fadeduration: 500, //transition duration (milliseconds)
	descreveal: "ondemand",
	togglerid: ""
})

</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Financial Information System</title>

<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="views/css/cssO.css" rel="stylesheet" type="text/css" />
<link href="views/css/class.css" rel="stylesheet" type="text/css"/>
</head>

<body background="views/img/hole.jpg" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload="MM_preloadImages('views/img/moreButtonMO.png','img/ctc_us_MO.png')">

<div id="background">
<div id="container1">
<div id="container2">
<div style=" background:url(views/img/header.jpg) no-repeat; height:139px; position:relative;"> <a href="#">
<img style="position:absolute; right: 167px; top: 16px;" src="views/img/poweredByBessar.png" width="99" height="56" /></a>
</div>
        
<iframe name="crawler" src="views/crawler.html" width="1000" frameborder="0" height="22" ></iframe>
<br />
        
   	  <div id="navMenu">
      	<div id="HomeSelect"></div>
        <a id="buttonProducts" href="views/Products.html"></a>
        <a id="buttonSubs" href="views/Subs.html"></a>
        <a id="buttonAbout" href="views/About.html"></a>
        <a id="buttonContact" href="views/Contact.html"></a>
      </div>
      
   	  <div id="date" class="Arial11">
        Thursday, 10 May 2012
    </div>
        
        <br clear="all"/>
            
<div  style="width:200px; float:left; margin:0px 15px 20px 10px; ">        
<div style="      background:url(views/img/navyHeight.jpg) repeat-x;
        		  width:180px; 
                  float:left; 
                  padding:10px 10px 20px 10px;  
                  margin-bottom:20px;
                  position:relative;
                  -moz-border-radius: 5px;
                  border-radius: 5px;                 
                  ">
                    <img src="views/img/title_login.png" width="114" height="18" />
                	<br/><br/>
               	  <span class="Arial12"><form action="index.php?watch=login" method="post">
                  <?php if($_GET['watch'] == "login") { echo $views[0]."<br/ >"; } ?>
                  Username <input name="username" type="text" size="20" />
                  <br/><br/>
                  Password &nbsp;<input name="password" type="password" size="20"  />
                  <br/>
                  <input style="margin-top:10px; float:right;" name="Login" type="submit" value="&nbsp;Login&nbsp;"  /></form>
                  </span>
        </div>        
        <br/><br/>
        <a href="#"><img style="float:left; margin-bottom:10px;" src="views/img/bannerFISterm.jpg" width="200" height="80" alt="MSQ" /></a>
        <a href="#"><img style="float:left; margin-bottom:10px;" src="views/img/bannerFISweb.jpg" width="200" height="80" alt="MSQ" /></a>
        <a href="#"><img style="float:left; margin-bottom:10px;" src="views/img/banner_MSQ.jpg" width="200" height="80" alt="MSQ" /></a>
      
      

    <div style="width:190px; height:140px; border: 5px solid #333; float:left;">	
        <div id="fadeshow1"><img src="views/img/slide01.jpg" width="190" height="140" /></div>    
    </div>

      </div>

<div  style="width:440px; float:left; margin-bottom:20px; margin-left:10px;" class="Arial12"> 
<H3 style="margin: 0px; color:#0C9">MALAYSIA MARKET OVERVIEW</H3>
<br/>

<div style="float:left;">
<img src="views/img/graph.jpg" width="280" height="280" />
</div>

<table width="145" border="0" cellpadding="5" cellspacing="0"style="float: right; margin-left:5px;" class="Arial11">
  <tr>
    <td height="50" colspan="2" id="table_head_MSum"><strong>Market Summary</strong></td>
    </tr>
  <tr id="table_body_A">
    <td width="60%" >Gainers</td>
    <td width="40%">168</td>
  </tr>
  <tr id="table_body_B">
    <td>Losers</td>
    <td>198</td>
  </tr>
  <tr id="table_body_A">
    <td>Unchanged</td>
    <td>256</td>
  </tr>
  <tr id="table_body_B">
    <td>Untraded</td>
    <td>1774</td>
  </tr>
  <tr id="table_body_A">
    <td>Volume (MII)</td>
    <td>686</td>
  </tr>
  <tr id="table_body_B">
    <td>Value (RM MII)</td>
    <td>220</td>
  </tr>
  <tr class="Arial10">
  <td colspan="2">Chart has been provided by BSKL</td>
  </tr>
</table>

<br style="clear:both;" />
<div style="margin:10px auto; float:inherit;"><strong>IJMLAND</strong> TRANSACTIONS (CHAPTER 10 OF LISTING REQUIREMENTS)</div>
<br style="clear:both;" />
<span class="Arial11"> <a href="#">Stock</a> | <a href="#">Warrants</a> | <a href="#">ETF</a> | <a href="#">MDEX</a> </span> 
<br style="clear:both;" /> <br/>

<table width="48%" border="0" cellspacing="0" cellpadding="5" class="Arial11" style="float:left;" >
  <tr id="table_head_Gainers">
    <td width="45%"><strong>GAINERS</strong></td>
    <td width="30%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td style="background-color: #013ADF">Top 10 Gainers</td>
    <td colspan="2" style="background-color: #0040FF">Top 5 Gainers %</td>
  </tr>
  <tr id="table_body_A">
    <td>&nbsp;</td>
    <td>Lost</td>
    <td>Chg</td>
  </tr>
  <tr id="table_body_B">
    <td style="border-right: 1px dotted  #CCC;">JTIASA</td>
    <td style="border-right: 1px dotted  #CCC;">8.20</td>
    <td>0.510</td>
  </tr>
  <tr id="table_body_A">
    <td style="border-right: 1px dotted  #CCC;">BAT</td>
    <td style="border-right: 1px dotted  #CCC;">53.62</td>
    <td>0.320</td>
  </tr>
  <tr id="table_body_B">
    <td style="border-right: 1px dotted  #CCC;">SUBUR</td>
    <td style="border-right: 1px dotted  #CCC;">2.75</td>
    <td>0.260</td>
  </tr>
  <tr id="table_body_A">
    <td style="border-right: 1px dotted  #CCC;" >GENTING</td>
    <td style="border-right: 1px dotted  #CCC;">10.94</td>
    <td>0.180</td>
  </tr>
  <tr id="table_body_B">
    <td style="border-right: 1px dotted  #CCC;">LIPO</td>
    <td style="border-right: 1px dotted  #CCC;">1.19</td>
    <td>0.150</td>
  </tr>
  <tr>
    <td colspan="2">*15 mins delayed</td>
    <td><a href="#">more&gt;&gt;</a></td>
  </tr>
</table>

<table width="48%" border="0" cellspacing="0" cellpadding="5" class="Arial11" style="float: right;" >
  <tr id="table_head_Losers">
    <td width="45%"><strong>LOSERS</strong></td>
    <td width="30%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td style="background-color: #CA0F13">Top 10 Gainers</td>
    <td colspan="2" style="background-color: #A50C10">Top 5 Losers %</td>
  </tr>
  <tr id="table_body_A">
    <td>&nbsp;</td>
    <td>Lost</td>
    <td>Chg</td>
  </tr>
  <tr id="table_body_B">
    <td style="border-right: 1px dotted  #CCC;">JTIASA</td>
    <td style="border-right: 1px dotted  #CCC;">8.20</td>
    <td>0.510</td>
  </tr>
  <tr bgcolor="#424242">
    <td style="border-right: 1px dotted  #CCC;">BAT</td>
    <td style="border-right: 1px dotted  #CCC;">53.62</td>
    <td>0.320</td>
  </tr>
  <tr id="table_body_B">
    <td style="border-right: 1px dotted  #CCC;">SUBUR</td>
    <td style="border-right: 1px dotted  #CCC;">2.75</td>
    <td>0.260</td>
  </tr>
  <tr bgcolor="#424242">
    <td style="border-right: 1px dotted  #CCC;" >GENTING</td>
    <td style="border-right: 1px dotted  #CCC;">10.94</td>
    <td>0.180</td>
  </tr>
  <tr id="table_body_B">
    <td style="border-right: 1px dotted  #CCC;">LIPO</td>
    <td style="border-right: 1px dotted  #CCC;">1.19</td>
    <td>0.150</td>
  </tr>
  <tr>
    <td colspan="2">*15 mins delayed</td>
    <td><a href="#">more&gt;&gt;</a></td>
  </tr>
</table>

<br clear="all";/>

<table width="450" border="0" cellpadding="5" cellspacing="0" style=" float:left; margin-top:10px;" class="Arial11">
  <tr>
    <td colspan="6"><strong>ACTIVE</strong></td>
    </tr>
  <tr>
    <td colspan="3" width="50%" bgcolor="#04B45F"  style="border-right:1px dotted #999;">Top 10 Active</td>
    <td colspan="3" width="50%" bgcolor="#088A4B">Top 10 Active by Value</td>
  </tr>
  <tr id="table_body_B">
    <td></td>
    <td>Last</td>
    <td style="border-right:1px dotted #999;">Chg</td>
    <td></td>
    <td>Last</td>
    <td>Chg</td>
  </tr>
  <tr id="table_body_A">
    <td>SAAG</td>
    <td>0.080</td>
    <td style="border-right:1px dotted #999;">0.005</td>
    <td>FLONIC</td>
    <td>0.165</td>
    <td>0.005</td>
  </tr>
  <tr id="table_body_B">
    <td>TRINITY</td>
    <td>0.080</td>
    <td style="border-right:1px dotted #999;">0.010</td>
    <td>JCY-CE</td>
    <td>0.205</td>
    <td>0.055</td>
  </tr>
  <tr id="table_body_A">
    <td>INGENS</td>
    <td>686</td>
    <td style="border-right:1px dotted #999;">686</td>
    <td>ASUPREM</td>
    <td>0.220</td>
    <td>0.010</td>
  </tr>
  <tr id="table_body_B">
    <td>AGLOBAL</td>
    <td>220</td>
    <td style="border-right:1px dotted #999;">686</td>
    <td>UTOPIA</td>
    <td>0.090</td>
    <td>0.000</td>
  </tr>
  <tr id="table_body_A">
    <td>INGENS</td>
    <td>686</td>
    <td style="border-right:1px dotted #999;">686</td>
    <td>ASUPREM</td>
    <td>0.220</td>
    <td>0.010</td>
  </tr>
  <tr>
  <td colspan="6">*15 mins delayed</td>
  </tr>
</table>
</div>

<div style="float: right; padding-right:10px;">
  <table width="200" border="0" cellspacing="0" cellpadding="0" class="Arial12">
    <tr>
      <td><img src="views/img/topBNews.png" width="247" height="11" /></td>
    </tr>
    <tr style="background-color: #666;">
      <td><H3 style=" margin:0px; padding-left:5px; color: #06C;"><img src="views/img/bernamaNews.png" width="131" height="27" /></H3></td>
    </tr>
    <tr id="BNews" class="Arial11">
      <td style="padding:5px;">
      <ul>
      <li>
      <strong>Sydney Airport Upgrade Plan Going Well, Says Chief Executive</strong>
      <br/>
      MELBOURNE, June 15 (Bernama) -- Talks between Sydney Airport and  airlines to reconfigure 
      the airport are going well, said Sydney Airport  chief executive, Kerrie Mather.
      </li>
      <li>
      <strong>Khazanah To Rake In RM4.9 Billion In Unrealised Profit From IHH Listing</strong>
      <br/>
	  KUALA LUMPUR, June 15 (Bernama) -- The listing of Integrated Healthcare Holdings Sdn Bhd (IHH) 
      next month will see the government's investment holding company, Khazanah Nasional Bhd, raking 
      in RM4.9 billion in the form of unrealised profit via the 62 per cent stake held in the international 
      health services provider company.
      </li>
      <li>
      <strong>Singapore's Unemployment Up Slightly, Job Vacancies Decline In Q1 2012</strong>
      <br/>
	  SINGAPORE, June 15 (Bernama) -- Singapore's unemployment rose slightly and employment creation 
      eased and in the first quarter of 2012.
      </li>
      </ul>
      </td>
    </tr>
     <tr>
      <td><img src="views/img/bottomBNews.png" width="247" height="11" /></td>
    </tr>
  </table>
  
<div style="float:left; margin-top:20px; width:200px;">
  <img src="views/img/know.png" style="margin-bottom: 5px; width:200px;" />
  
  <div style="float:right;">
	<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Contact us','','views/img/ctc_us_MO.png',1)"><img src="views/img/ctc_us.png" alt="Contact us" name="Contact us" width="136" height="43" border="0" id="Contact us" /></a></div>  
</div>
    
</div>

<br clear="all";/>
        
    <div id="footer">
    	<div style="width:50%; margin-left: 20px; padding:5px auto; float:left;" class="Arial11">
        <font color="#999999">
        <a href="http://bessar.com.my/bessar/default.html">Bessar</a>  |
        <a href="Products.html">Products</a> |
        <a href="Subs.html">Subscription</a> |
        <a href="About.html">About Us</a> |
        <a href="SiteMap.html">Sitemap</a> |
        </font>
        </div>
        
    	<br clear="all">
        <br/><br/>
        
        <div style="padding:5px auto; margin:0px auto; width:500px;" class="Arial11">
        <font color="#FFFFFF">
		Copyright reserved | Bernama Systems & Solutions Advisor Sdn Bhd © 2012 | Privacy Policy
        </font>
        <br/>
        </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>
