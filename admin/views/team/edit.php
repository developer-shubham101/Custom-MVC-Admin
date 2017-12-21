<?php
$team= $this->member;
$place_list = $this->place_list;
sort($place_list);
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
								<form action="<?php echo URL ?>team/edit" method="post" id="edit-member-form" enctype="multipart/form-data">
									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Member's Name</label>
										<div class="controls">
											<input type="text" name="fname" value="<?php echo $team['name']; ?>" class="form-control" required >
										</div>
									</div>									
									<div class="form-group">
										<label class="form-label">Category</label>
										<div class="controls">
											<div class="radio">
												<?php //echo $team['category']; ?>
												<input id="state" type="radio" name="category" value="state"
												<?php if( $team['category'] == 'state' ) echo 'checked'; ?> required />
												<label for="state">State</label>
												<input id="district" type="radio" name="category"
												<?php if( $team['category'] == 'district' ) echo 'checked'; ?> value="district" required />
												<label for="district">District</label>
											</div>
										</div>
									</div>
									<div class="form-group" id="placedistrict">
										<label class="form-label">Place (District)</label>
										<div class="controls">
											<?php echo "distic" .$team['place'] ?>
											<div>
												<select name="place" >
													<option <?php if( $team['place'] == '' ) echo 'selected="selected"'; ?>  value="">Select</option>
													<?php 
													foreach ($place_list as $place) {
														echo '<option ';
														if( $team['place'] == $place ) echo 'selected="selected"';
														echo ' value="'.$place.'">'.$place.'</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group" >
										<label class="form-label">Designation</label>
										<div class="controls">
											<?php //echo "designation" .$team['designation'] ?>
											<div>
												<input type="text" name="designation" value="<?php echo $team['designation']; ?>" class="form-control designation-text-box" >
												<!-- <select name="designation" >
													<option <?php if( $team['designation'] == '' ) echo 'selected="selected"'; ?>  value="">Select</option>
													<option <?php if( $team['designation'] == 'ADHYAKSH' ) echo 'selected="selected"'; ?> value="ADHYAKSH">ADHYAKSH</option>
													<option <?php if( $team['designation'] == 'MAHAMANTRI' ) echo 'selected="selected"'; ?> value="MAHAMANTRI">MAHAMANTRI</option>
													<option <?php if( $team['designation'] == 'UPADHYAKSH' ) echo 'selected="selected"'; ?> value="UPADHYAKSH">UPADHYAKSH </option>
													<option <?php if( $team['designation'] == 'MANTRI' ) echo 'selected="selected"'; ?> value="MANTRI">MANTRI </option>
													<option <?php if( $team['designation'] == 'SANYOJAK' ) echo 'selected="selected"'; ?> value="SANYOJAK">SANYOJAK </option>
													<option <?php if( $team['designation'] == 'MEMBERS' ) echo 'selected="selected"'; ?> value="MEMBERS">MEMBERS </option>
												</select> -->
											</div>
										</div>
									</div>
									<div class="form-group" >
										<label class="form-label">Department</label>
										<div class="controls">
											<select name="department" required>
												<option value="">Select..</option>
												<option <?php if($team['department'] == "core") echo 'selected="selected"'; ?> value="core">Core </option>
												<option <?php if($team['department'] == "minority") echo 'selected="selected"'; ?> value="minority">Minority Morcha </option>
												<option <?php if($team['department'] == "kisan") echo 'selected="selected"'; ?> value="kisan">Kisan Morcha </option>
												<option <?php if($team['department'] == "mahila") echo 'selected="selected"'; ?> value="mahila">Mahila Morcha </option>
												<option <?php if($team['department'] == "yuva") echo 'selected="selected"'; ?> value="yuva">Yuva Morcha </option>
												<option <?php if($team['department'] == "alpsankhyak") echo 'selected="selected"'; ?> value="alpsankhyak">Alpsankhyak </option>
												<option <?php if($team['department'] == "sc") echo 'selected="selected"'; ?> value="sc">SC</option>
												<option <?php if($team['department'] == "st") echo 'selected="selected"'; ?> value="st">ST</option>
												<!-- <option <?php if($team['department'] == "obc") echo 'selected="selected"'; ?> value="obc">OBC </option> -->
												<option <?php if($team['department'] == "media") echo 'selected="selected"'; ?> value="media">Media </option>
												<option <?php if($team['department'] == "it") echo 'selected="selected"'; ?> value="it">IT </option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Contact no </label>
										<div class="controls">
											<input type="text" value="<?php echo $team['contact']; ?>" name="mobile" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Email</label>
										<div class="controls">
											<input type="email" value="<?php echo $team['email']; ?>" name="email" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Facebook Id</label>
										<div class="controls">
											<input type="text" value="<?php echo $team['fb']; ?>" name="fb" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Twitter Id</label>
										<div class="controls">
											<input type="text" value="<?php echo $team['twitter']; ?>" name="twitter" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Address </label>
										<div class="controls">
											<input type="text" value="<?php echo $team['address']; ?>" name="address" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">social media icons </label>
										<div class="controls" id="files-input">
											<?php
											$icons = unserialize($team['icons']);
											foreach($icons as $icon) {
												echo '<div><input type="text" name="icons[]" value="' . $icon . '" class="form-control" ><span onclick="removeIt(this)">X</span></div>';
											}
											?>
										</div>
										<div><span onclick="addNewFile();">Add new</span></div>
										<div id="images_preview">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Order </label>
										<div class="controls">
											<input type="text" value="<?php echo $team['d_order']; ?>" name="d_order" class="form-control d_order" >
										</div>
									</div>
									<div class="form-group">
										<div class="controls">
											<!-- <div id="adas">submit</div> -->
											<input type="hidden" name="action" value="editmember">
											<input type="hidden" name="id" value="<?php echo $team['id']?>">
											<input type="submit" class="btn btn-block btn-success" value="update" >
											<input type="hidden" name="action" value="editmember">
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