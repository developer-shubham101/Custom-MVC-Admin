<?php
$db = new Database ();
?>
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
								<table>
									<caption>Booth Team</caption>
									<thead>
										<tr>										
											<th style="width: 150px;">constituency</th>
											<th style="width: 150px;">Mandal No</th>
											<th style="width: 150px;">Mandal Name</th>

											<th style="width: 150px;">Ward No</th>
											<th style="width: 150px;">Ward Name</th>
											 
											<th style="width: 150px;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$boothteam = $db->get ( Help::MANDAL_TABLE );

										foreach ( $boothteam as $booth ) {
											echo "<tr>";
											echo "<td>" . $booth ['constituency'] . " </td> ";
											echo "<td>" . $booth ['mandal_no'] . " </td> ";
											echo "<td>" . $booth ['mandal_name'] . " </td> ";

											echo "<td>" . $booth ['ward_no'] . " </td> ";											
											echo "<td>" . $booth ['ward_name'] . " </td> ";
											echo "<td><a href=" . URL . 'mandal/delete?mandalid='. $booth['id'] . ">Delete</a></td>";
											echo "</tr>";

										}
										?>

									</tbody>
								</table>

								<br>
								<form action="<?php echo URL ?>mandal/create" method="post" id="" enctype="multipart/form-data">

									<div class="form-notify"> </div>

									<div class="form-group">
										<label class="form-label">Constituency</label>
									
										<div class="controls">
											<?php 
											$constituencies = $db->get(Help::CONSTITUENCY_TABLE);
											echo '
											<select name="constituency" required>
												<option value="">Select</option>';
											foreach ($constituencies as $constituency) {
												$constituency_name = str_replace(" ", "_", str_replace("-", "_", strtolower(trim($constituency['name'])) ) );
												echo '<option value="'.$constituency_name.'">'.$constituency['name'].'</option>';
											}
											echo '</select>';
											?>
									
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Mandal no</label>
									
										<div class="controls">
											<input type="text" name="mandalno" class="form-control" required >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Mandal Name</label>
									
										<div class="controls">
											<input type="text" name="mandalname" class="form-control" required >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Ward no</label>

										<div class="controls">
											<input type="text" name="wardno" class="form-control" required >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Ward Name</label>

										<div class="controls">
											<input type="text" name="wardname" class="form-control" required >
										</div>
									</div>
									 

									<div class="form-group">
										<div class="controls">
								 
											<input type="submit" name="submit" value="Create">

										</div>
									</div>

								</form>
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