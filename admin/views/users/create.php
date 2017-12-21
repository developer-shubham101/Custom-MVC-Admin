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
								<form action="<?php echo URL ?>users/create" method="post" id="create-user-form" enctype="multipart/form-data">
									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Your Name</label>

										<div class="controls">
											<input type="text" name="fname" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Your Last Name </label>
										<div class="controls">
											<input type="text" name="lname" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Your mobile </label>

										<div class="controls">
											<input type="text" name="mobile" class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Your Email </label>

										<div class="controls">
											<input type="text" name="email" class="form-control" required >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Your Date Of Birth </label>
										<div class="controls">

										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Gender </label>
										<div class="controls">
											<div class="radio">
												<input id="male" type="radio" name="gender" value="Male" checked />
												<label for="male">Male</label>
												<input id="female" type="radio" name="gender" value="Female"  />
												<label for="female">Female</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Your Address </label>

										<div class="controls">
											<input type="text" name="address" placeholder="address" required  >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Your Address 2</label>

										<div class="controls">
											<input type="text" name="address2" placeholder="Address 2"  >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Village/Town/City</label>

										<div class="controls">
											<input type="text" name="city" placeholder="Village/Town/City"  >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">State/Province</label>

										<div class="controls">
											<input type="text" name="state" placeholder="State/Province"  >
										</div>
									</div>



									<div class="controls">
									</div>

									<div class="form-group">
										<label class="form-label">Postcode</label>

										<div class="controls">
											<input type="text" name="postcode" placeholder="Postcode"  >
										</div>
									</div>

									<div class="form-group">
										<div class="controls">
											<input type="submit" name="update" class="btn btn-block btn-success" value="Update" >
											<input type="hidden" name="action" value="createusers">
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
</div>
<!-- END CONTAINER -->