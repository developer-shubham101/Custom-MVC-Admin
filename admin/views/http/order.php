<?php
$db = new Database ();
 
 
 
$members = $db->query("SELECT DISTINCT `designation` , `d_order` FROM `".Help::TEAM_TABLE."` WHERE 1");

 

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
							 
							<table id="users-list" class="table table-striped table-bordered no-more-tables">
								<caption>Team list  </caption>
								<thead>
									<tr>	
										<th>Designation</th>										 
										<th>Order</th>									
										 
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($members as $member) {
										 
										echo '<tr>';
										echo '<td>'.  $member ['designation'] . '</td>';
										echo '<td><input type="text" value="'.$member ['d_order'].'" name="order"></td>';
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