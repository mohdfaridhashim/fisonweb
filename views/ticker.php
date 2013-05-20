<script type="text/javascript" src="views/js/crawler.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link href="views/css/cssO.css" rel="stylesheet" type="text/css" />
<link href="views/css/class.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
        $(document).ready(function() {
            setInterval("location.reload(true)", 20000);
        });   
    </script>
    <div id="crawler" class="Arial12" style="color: #FFF;">
    <div class="marquee" id="mycrawler">
   <?php $finish=15; for($start = 0; $start < $finish; $start++) {  ?>
  <span id="<?php echo $start; ?>"><?php echo $views[0][$start][1]; ?></span><span style="color:<?php echo $views[0][$start][14]; ?>"><?php echo " ".$views[0][$start][4]." "; ?></span>
        <?php }?>
    </div>
  <script type="text/javascript">
    marqueeInit({
        uniqueid: 'mycrawler',
        style: {
            'padding': '0px',
            'width': '1200px',
            'background': 'none',
            'border': 'none'
        },
        inc: 3, //speed - pixel increment for each iteration of this marquee's movement
        mouse: 'pause', //mouseover behavior ('pause' 'cursor driven' or false)
        moveatleast: 4,
        neutral: 150,
        savedirection: true
    });
    </script>
</div>
<div align="right" class="Arial12"><a href="index.php?watch=ticker&tick=gain">Gain</a> <a href="index.php?watch=ticker&tick=active"> Active </a><a href="index.php?watch=ticker&tick=lose">Loser</a></div>

