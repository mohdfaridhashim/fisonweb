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
        <script type="text/javascript" charset="utf-8">
			// define grid table
			var asInitVals = new Array();
			$(document).ready(function() {
				var oTable = $('#news').dataTable({ "bProcessing": true,"bDeferRender": true,"sPaginationType": "full_numbers","bFilter": true,"bLengthChange": false,"bInfo": false,"bPaginate": true,"aaSorting": [[ "0", "asc" ]],"bSort": true,"sScrollY": "200px"
				
						});
						
		$("thead input").keyup( function () {
		/* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, $("thead input").index(this) );
	} );
	
	/*
	 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
	 * the footer
	 */
	$("thead input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("thead input").focus( function () {
		if ( this.className == "search_init" )
		{
			this.className = "";
			this.value = "";
		}
	} );
	
	$("thead input").blur( function (i) {
		if ( this.value == "" )
		{
			this.className = "search_init";
			this.value = asInitVals[$("thead input").index(this)];
		}
	} );
						
			} );
			</script>
            <table id="news" width="100%" border="0">
              <thead>
              <tr>
  				<th>Source</th>
                <th>Dateline</th>
                <th>Headline <input type="text" name="search_platform" value="Search Headline" class="search_init" /></th>
              </tr>
              </thead>
              <tbody >
               <?php foreach($views[0] as $new) { ?>
              <tr>
                <td>Dow Jones</td>
                <td><?php echo $new->E_DATE." ".$new->E_TIME ?></td>
                <td colspan="3"><?php echo $new->NEWS_HEADLINE?></td>
              </tr>
              <?php } ?>
               </tbody>
               </table>
            