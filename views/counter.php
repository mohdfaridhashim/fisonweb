		<style type="text/css" title="currentStyle">
			@import "views/media/css/demo_page.css";
			@import "views/media/css/jquery.dataTables.css";
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#counter').dataTable({"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": false,"sScrollY": "400px"});
			} );
		</script>
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
    </tr>
  </thead>
  <tbody>
  <?php for($i = 0; $i < $allc_rows ; $i++) { if($view[$i][19] != "1") { ?>
    <tr >
      <td><?php echo $view[$i][0]; ?></td>
      <td><?php echo $view[$i][1]; ?></td>
      <td><?php echo $view[$i][2]; ?></td>
      <td class="center"><?php echo $view[$i][3]; ?></td>
      <td class="center"><?php echo $view[$i][4]; ?></td>
      <td class="center"><?php echo $view[$i][5]; ?></td>
      <td class="center"><?php echo $view[$i][6]; ?></td>
      <td class="center"><?php echo $view[$i][7]; ?></td>
      <td class="center"><?php echo $view[$i][8]; ?></td>
      <td class="center"><?php echo $view[$i][9]; ?></td>
      <td class="center"><?php echo $view[$i][10]; ?></td>
      <td class="center"><?php echo $view[$i][11]; ?></td>
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
    </tr>
  </tfoot>
</table>
