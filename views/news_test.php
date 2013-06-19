		<style type="text/css" title="currentStyle">
			/*@import "views/media/css/demo_page.css";*/
			@import "views/media/css/jquery.dataTables2.css";
			body,td,th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color:#FFFFFF;
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
h3 {
	padding: 0px;
	margin: 0px;
	font-size:14px;
	color:#ffcc00;
	}
		</style>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" language="javascript" src="views/media/js/jquery.dataTables.columnFilter.js"></script>
        <script type="text/javascript" charset="utf-8">
			// define grid table
			$(document).ready(function() {
				$('#counter').dataTable({ "bProcessing": true,"bDeferRender": true,"sPaginationType": "full_numbers","bFilter": true,"bLengthChange": false,"bInfo": false,"bPaginate": true,"aaSorting": [[ "1", "desc" ]],"bSort": true
						}).columnFilter(); 
						
							
			} );
			</script>
            <table width="100%" border="0">
  <tr>
    <td align="Left"><h3>NEWS</h3></td>
  </tr>
  <tr>
    <td align="Left"><A href="">BERNAMA</A> | <a href="">DOW JONES</a></td>
  </tr>
</table>
<div class="ex_highlight_row">
  <table id="counter" width="100%" border="0" class="display" cellpadding="0" cellspacing="0">
              <thead>
              <tr id="tableHeaders">
  				<th width="289">Source</th>
                <th width="489">Dateline</th>
                <th width="807">Headline</th>
              </tr>
              </thead>
              <tfoot>
			<tr>
  				<th>Source</th>
                <th>Dateline</th>
                <th>Headline</th>
			</tr>
		</tfoot>
			 <tbody >
               <?php for($i = 0; $i < $views[1]; $i++) { ?>
              <tr>
                <td><?php echo $views[0][$i][0] ?></td>
                <td><?php echo $views[0][$i][2]." ".$views[0][$i][1] ?></td>
                <td ><a href="#"><?php echo $views[0][$i][5] ?></a></td>
              </tr>
              <?php } ?>
               </tbody>
                           </table>
            </div>

