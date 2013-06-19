 <?php header('content-type: application/json; charset=utf-8 '); ?>
?([
 <?php
  for($i = 0; $i < $views[1]; $i++)
  {//$tarikh2 = (explode(" ",$list_hl[$i][1]));
  $time = explode(" ",$views[0][$i][0]);
  $tarikh = explode("/",$time[1]);
  $milliseconds = 1000 * strtotime($tarikh[0]."-".$tarikh[1]."-".$tarikh[2]);
  if($i != $views[1] -1 )
  {
  //smtp,last,bcum,scum,buy,sell,high,low,qty,vol,trade_id echo $views[0][$i][0];
  ?>
  [<?php /*echo $time[0]*/ echo $milliseconds; ?>,<?php echo $views[0][$i][1]; ?>,<?php echo $views[0][$i][6]; ?>,<?php echo $views[0][$i][7]; ?>,<?php echo $views[0][$i][11]; ?>,<?php echo $views[0][$i][8]; ?>],
  <?php 
  }
  else
  { ?>
  [<?php /*echo $time[0]*/ echo $milliseconds; ?>,<?php echo $views[0][$i][1]; ?>,<?php echo $views[0][$i][6]; ?>,<?php echo $views[0][$i][7]; ?>,<?php echo $views[0][$i][11]; ?>,<?php echo $views[0][$i][8]; ?>]
  <?php 
  }
  //end for
  } ?>
]);

