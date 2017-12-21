<?php 
$place_list = $this->place_list;
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


								<form action="<?php echo URL ?>team/create" method="post" id="create-member-form" enctype="multipart/form-data">

									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Member's Name</label>

										<div class="controls">
											<input type="text" name="fname" class="form-control" required >
										</div>
									</div>

                                    <!--script>
										$(document).ready(function(){
											$("#statelable").click(function(){
												$("#placeid").hide();
											});
											});
										</script-->

										<div class="form-group">
											<label class="form-label" required>Category</label>
											<div class="controls">
												<div class="radio">
													<input id="state" type="radio" name="category" value="state"  required />
													<label for="state" id="statelable">State</label>
													<input id="district" type="radio" name="category" value="district" required />
													<label for="district">District</label>
												</div>
											</div>
										</div>

										<div class="form-group" id="placedistrict">
											<label class="form-label">Place (District)</label>
											<div class="controls">
												<div>
													<select name="place" >
													<option value="">Select</option>
													<?php
													foreach ($place_list as $place) {
														echo '<option value="'.$place.'">'.$place.'</option>';
													}
													?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group" >
											<label class="form-label">Designation</label>
											<div class="radio">

												<input type="text" name="designation"  class="form-control designation-text-box" >
													<!-- <select name="designation" >
														<option value="">Select</option>
														<option value="ADHYAKSH">ADHYAKSH</option>
														<option value="MAHAMANTRI">MAHAMANTRI</option>
														<option value="UPADHYAKSH">UPADHYAKSH</option>
														<option value="MANTRI">MANTRI</option>
														<option value="SANYOJAK">SANYOJAK</option>
														<option value="MEMBERS">MEMBERS</option>
													</select> -->
											</div>
										</div>

										<div class="form-group" >
											<label class="form-label">Department</label>

											<div class="controls">
												<select name="department" required>
													<option value="">Select..</option>
													<option value="core">Core </option>
													<option value="minority">Minority Morcha </option>
													<option value="kisan">Kisan Morcha </option>
													<option value="mahila">Mahila Morcha </option>
													<option value="yuva">Yuva Morcha</option>
													<option value="alpsankhyak">Alpsankhyak </option>
													<option value="sc">SC</option>
													<option value="st">ST</option>
													<!-- <option value="obc">OBC </option> -->
													<option value="media">Media </option>
													<option value="it">IT </option>
												</select>
											</div>
										</div>


										<div class="form-group">
											<label class="form-label">Your contact no </label>

											<div class="controls">
												<input type="text" name="mobile" class="form-control" >
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Email</label>

											<div class="controls">
												<input type="email" name="email" class="form-control" >
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Facebook Id</label>

											<div class="controls">
												<input type="text" name="fb" class="form-control" >
											</div>
										</div>

										<div class="form-group">
											<label class="form-label">Twitter Id</label>

											<div class="controls">
												<input type="text" name="twitter" class="form-control" >
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Address </label>

											<div class="controls">
												<input type="text" name="address" class="form-control" >
											</div>
										</div>

										<div class="form-group">
											<label class="form-label">social media icons </label>

											<div class="controls" id="files-input">
												<div><input type="text" name="icons[]" class="form-control" ><span onclick="removeIt(this)">X</span></div>
											</div>
											<div><span onclick="addNewFile();">Add new</span></div>
											<div id="images_preview">

											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Order </label>
											<div class="controls">
												<input type="text" value="999" name="d_order" class="form-control d_order" >
											</div>
										</div>

										<div class="form-group">
											<div class="controls">
												<!-- 											<div id="adas">submit</div> -->
												<input type="submit" class="btn btn-block btn-success" value="Create" >
												<input type="hidden" name="action" value="createmember">
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