		<style type="text/css" title="currentStyle">
			@import "views/media/css/demo_page.css";
			@import "views/media/css/jquery.dataTables.css";
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#counter').dataTable({"sPaginationType": "full_numbers","bLengthChange": false,"bInfo": false,"bPaginate": true,"aaSorting": [[ "4", "asc" ]],"bSort": false,"sScrollY": "250px"});
			} );
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
		</script>

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
  <?php for($i = 0; $i < $views[1] ; $i++) { ?>
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
      <td class="center"><?php echo $views[0][$i][11]; ?></td>
      <td><a href='index.php?watch=detail&c=<?php echo $views[0][$i][0]; ?>'>Detail</a>&nbsp;<a href='#' onclick="addtofav('<?php echo $views[0][$i][1];  ?>')">ADD</a></td>
    </tr>
    <?php } ?>
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

