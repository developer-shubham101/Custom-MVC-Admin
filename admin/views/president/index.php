<?php
$db = new Database ();
 

$records_per_page = 20;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;
$db->orderBy ( "id", "desc" );
$results = $db->arraybuilder()->paginate(Help::TABLE_PRESIDENT, $current_page);

  

// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records($db->totalCount);
$pagination->variable_name("p");
// records per page
$pagination->records_per_page($records_per_page);
// render the pagination links


?>

<!-- END SIDEBAR -->	<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div id="portlet-config" class="modal hide">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button">
			</button>
			<h3>Widget Settings
			</h3>
		</div>
		<div class="modal-body"> Widget settings form goes here
		</div>
	</div>
	<div class="clearfix">
	</div>
	<div class="content">


		<!-- BEGIN UPDATE FORM-->
		<div class="row">
			<div class="col-md-12">
				<div class="grid simple">

					<div class="grid-body no-border">
						<br>
						<div class="row">
							<div class="col-md-8 col-sm-8 col-xs-8">
							<div class="pages">
								<?php echo $pagination->render(); ?>
							</div>
							<table id="users-list" class="table table-striped table-bordered no-more-tables">
								<caption>News list <?php echo "showing $current_page out of " . $db->totalPages; ?></caption>
								<thead>
									<tr>
									 
										<th>PRESIDENT</th>
										<th>DOB</th>
										  <th>INAUGURATION"S DATE</th>
										<th>AGE_AT_INAUGURATION</th>  
										<th>LENGTH_OF_RETIREMENT</th> 
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($results as $row) {
										 
										echo '<tr class="id-'. $row ['id'] .'">';
										
										echo '<td><a href="'.URL."president/edit?id=".$row ['id']. '">'. $row ['President'] .'</a></td>';
										echo '<td>'.  $row ['Date_of_birth']  .'</td>';
									 
										echo '<td>'. $row ['Date_of_inauguration'] .'</td>';
										echo '<td>'. $row ['Age_at_inauguration'] .'</td>';
										echo '<td>'. $row ['Length_of_retirement'] .'</td>';
										echo '<td><span class="delete"  data-type="deletepresident" data-id="'. $row ['id'] .'">Delete</td>';
										echo '</tr>';
									}
									 ?>
								 
								</tbody>
							</table>

							 

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END UPDATE FORM-->
		<!-- END PAGE -->
	</div>
</div>