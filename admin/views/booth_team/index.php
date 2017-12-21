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
											<!-- <th style="width: 150px;">constituency</th> -->
											<!-- <th style="width: 150px;">Mandal No</th> -->
											<th style="width: 150px;">Ward No</th>
											<th style="width: 150px;">Booth No</th>
											<th style="width: 150px;">Booth Name</th>
											<th style="width: 150px;">Name</th>
											<th style="width: 150px;">Address</th>
											<th style="width: 150px;">Designation</th>
											<th style="width: 150px;">Contact</th>
											<th style="width: 150px;">City</th>
											<th style="width: 150px;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$boothteam = $db->get ( Help::BOOTH_TEAM_TABLE );

										foreach ( $boothteam as $booth ) {
											echo "<tr>";
											// echo "<td>" . $booth ['constituency'] . " </td> ";
											// echo "<td>" . $booth ['mandal_no'] . " </td> ";
											echo "<td>" . $booth ['ward_no'] . " </td> ";
											echo "<td>" . $booth ['booth_no'] . " </td> ";
											echo "<td>" . $booth ['booth_name'] . " </td> ";

											echo "<td>" . $booth ['name'] . " </td> ";
											echo "<td>" . $booth ['address'] . " </td> ";
											echo "<td>" . $booth ['designation'] . " </td> ";
											echo "<td>" . $booth ['contact'] . " </td> ";
											echo "<td>" . $booth ['city'] . " </td><td><a href=" . URL . 'booth_team/delete?boothteamid='. $booth['id'] . ">Delete</a></td>";
											echo "</tr>";

										}
										?>

									</tbody>
								</table>

								<br>
								<form action="<?php echo URL ?>booth_team/create" method="post" id="" enctype="multipart/form-data">

									<div class="form-notify"> </div>

									<!-- <div class="form-group">
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
									</div> -->

									<!-- <div class="form-group">
										<label class="form-label">Mandal no</label>
									
										<div class="controls">
											<input type="text" name="mandalno" class="form-control" required >
										</div>
									</div> -->

									<div class="form-group">
										<label class="form-label">Ward no</label>

										<div class="controls">
											<!-- <input type="text" name="wardno" class="form-control" required > -->
											<?php 
											$constituencies = $db->get(Help::MANDAL_TABLE);
											echo '
											<select name="wardno" required>
												<option value="">Select</option>';
											foreach ($constituencies as $constituency) {
												$constituency_name =  $constituency['ward_no'] ;
												echo '<option value="'.$constituency_name.'">'.$constituency['ward_name'].'</option>';
											}
											echo '</select>';
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Booth no</label>

										<div class="controls">
											<input type="text" name="boothno" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Booth Name</label>

										<div class="controls">
											<input type="text" name="boothname" class="form-control" required >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Member's Name</label>

										<div class="controls">
											<input type="text" name="mname" class="form-control" required >
										</div>
									</div>

									

									<div class="form-group">
										<label class="form-label">Address</label>
										<div class="controls">
											<input type="text" name="maddress" value="" />
										</div>

									</div>



									<div class="form-group" >
										<label class="form-label">Designation</label>

										<div class="controls">
											<input type="text" name="mdesignation" value="" />
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Your contact no </label>

										<div class="controls">
											<input type="text" name="mcontact" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">City </label>

										<div class="controls">
											<input type="text" name="mcity" class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<div class="controls">
											<!-- 											<div id="adas">submit</div> -->
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