<?php
$db = new Database ();
?>
<!-- END SIDEBAR -->
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div id="portlet-config" class="modal hide">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button"></button>
			<h3>Widget Settings</h3>
		</div>
		<div class="modal-body">Widget settings form goes here</div>
	</div>
	<div class="clearfix"></div>
	<div class="content">
		<!-- BEGIN UPDATE FORM-->
		<div class="row">
			<div class="col-md-12">
				<div class="grid simple">
					<div class="grid-body no-border">
						<table>
							<caption>Connections</caption>
							<thead>
								<tr>
									<th style="width: 200px;">Admin</th>
									<th style="width: 200px;">User</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$terms = $db->get ( Help::TERMS_TABLE );
								$i = 0;
								foreach ( $terms as $term ) {
									echo "<tr>";
									$db->where ( " id = " . $term ["admin_id"] );
									$admin = $db->getOne ( Help::TABLE_ADMIN );
									echo "<td>" . $admin ['username'] . " </td> ";
									$db->where ( " id = " . $term ["user_id"] );
									$user = $db->getOne ( Help::USERS_TABLE );
									echo "<td>" . $user ['id'] . ' ' .  $user ["username"] . " </td> <td><a href=" . URL . 'connection/delete?termsid=' . $term ['id'] . ">Delete</a></td>";
									echo "</tr>";
									$i ++;
								}
								?>
								
							</tbody>
						</table>
						<form action="<?php echo URL ?>connection/create" method="post" id="create-connection-form" enctype="multipart/form-data">
							<select name="admins" required>
								<option value="">Select...</option>
								<?php
								
								$db->where(" role != 'superadmin'");
								$admins = $db->get ( Help::TABLE_ADMIN );
								foreach ( $admins as $admin ) {
									echo '<option  value="' . $admin ['id'] . '">' . $admin ['username'] . '</option>';
								}
								?>
							</select>
							<select name="users" required>
								<option value="">Select...</option>
								<?php
								$subquery = $db->subQuery ();
								$subquery->get ( Help::TERMS_TABLE, null, array (
									"user_id" 
									) );
								$db->where ( "id", $subquery, "NOT IN" );
								$users = $db->get ( Help::USERS_TABLE );
								print_r ( $users );
								foreach ( $users as $user ) {
									echo '<option  value="' . $user ['id'] . '">' . $user ['id'] . ' ' . $user ['username'] . '</option>';
								}
								?>
							</select> <input type="submit" name="submit" value="Submit">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- END UPDATE FORM-->
		<!-- END PAGE -->
	</div>
</div>