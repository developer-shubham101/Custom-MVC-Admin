<?php
$db = new Database ();


$records_per_page = 30;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;
$db->orderBy ( "id", "desc" );
$events = $db->arraybuilder()->paginate(Help::EVENTS_TABLE, $current_page);


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
								<caption>Event list</caption>
								<thead>
									<tr>
										<th>Name</th>
										<th>Caregory</th>
										<th>Date</th>
										<th>Location</th>
										<th>Status</th>
										<th>Create Date</th>
										<!-- <th>Images</th> -->
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($events as $event) {
										$images = array_filter(unserialize($event ['images']) );
										//print_r($images);

										echo '<tr class="id-'. $event ['id'] .'">';
										echo '<td><a href="'.URL."events/edit?id=".$event ['id']. '">'. $event ['name']  .'</a></td>';
										echo '<td>'. $event ['category'] .'</td>';
										echo '<td>'. $event ['date'] .'</td>';
										echo '<td>'. $event ['location'] .'</td>';
										echo '<td>'. $event ['status'] .'</td>';
										echo '<td>'. $event ['create_date'] .'</td>';
										/*echo '<td>';
											foreach ($images  as $image){
												$url = URL . 'libs/timthumb.php?src=' . $image . '&w=50&h=50';
												echo '<a target="_blank" href="' . $image . '"><img src="' . $url . '" /></a>';
											}
										echo '</td>';*/
										echo '<td><span class="delete" data-type="deleteevent" data-id="'. $event ['id'] .'">Delete</span></td>';
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