<?php
$db = new Database ();
// $users = $db->get('users');

$records_per_page = 30;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;
$users = $db->arraybuilder()->paginate(Help::USERS_TABLE, $current_page);


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
								<caption>Users list <?php echo "showing $current_page out of " . $db->totalPages; ?></caption>
								<thead>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>E-mail</th>
										<th>Mobile</th>
										<th>Gender</th>
										<th>Address</th>
										
										<th>City</th>
										<th>State</th>
										<th>Postcode</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($users as $user) {
										echo '<tr class="id-'. $user ['id'] .'">';
										echo '<td><a href="'.URL."users/edit?id=".$user ['id']. '">'. $user ['name'] .'</a></td>';
										echo '<td>'. $user ['lname'] .'</td>';
										echo '<td>'. $user ['email'] .'</td>';
										echo '<td>'. $user ['mobile'] .'</td>';
										echo '<td>'. $user ['gender'] .'</td>';
										echo '<td>'. $user ['address'] .'</td>';
										// echo '<td>'. $user ['address2'] .'</td>';
										echo '<td>'. $user ['city'] .'</td>';
										echo '<td>'. $user ['state'] .'</td>';
										echo '<td>'. $user ['postcode'] .'</td>';
										echo '<td><span class="delete"  data-type="deleteuser" data-id="'. $user ['id'] .'">Delete</td>';
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