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
				$('#news').dataTable({ "bProcessing": true,"bDeferRender": true,"sPaginationType": "full_numbers","bFilter": true,"bLengthChange": false,"bInfo": false,"bPaginate": true,"aaSorting": [[ "0", "asc" ]],"bSort": true
						}).columnFilter(); 
						
							
			} );
			</script>
            <table width="100%" border="0">
  <tr>
    <td align="Left"><h3>NEWS</h3></td>
  </tr>
</table>
            <table id="news" width="100%" border="0">
              <thead>
              <tr>
  				<th>Source</th>
                <th>Dateline</th>
                <th>Headline</th>
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
               <?php foreach($views[0] as $new) { ?>
              <tr>
                <td><?php echo $new->getName(); ?></td>
                <td><?php echo $new->E_DATE." ".$new->E_TIME ?></td>
                <td colspan="3"><?php echo $new->NEWS_HEADLINE?></td>
              </tr>
              <?php } ?>
               </tbody>
                           </table>
            