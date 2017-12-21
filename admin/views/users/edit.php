<?php 
$user = $this->user?>
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
								<form action="<?php echo URL ?>users/edit" method="post" id="update-user-form" enctype="multipart/form-data">
									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Your Name</label>

										<div class="controls">
											<input type="text" name="fname" value="<?php echo $user['name']?>" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Your Last Name </label>
										<div class="controls">
											<input type="text" name="lname" value="<?php echo $user['lname']?>" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Your mobile </label>

										<div class="controls">
										
											+91<input type="text" name="mobile" value="<?php echo str_replace("+91", "", $user['mobile'])?>"  class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Your Email </label>

										<div class="controls">
											<input type="text" name="email" value="<?php echo $user['email']?>" class="form-control" required >
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
												<input id="male" type="radio" name="gender" value="Male" <?php if ( $user['gender'] == 'Male')echo 'checked ';?>/>
												<label for="male">Male</label>
												<input id="female" type="radio" name="gender" value="Female" <?php if ( $user['gender'] == 'Female')echo 'checked ';?> />
												<label for="female">Female</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Your Address </label>

										<div class="controls">
											<input type="text" name="address" placeholder="address" value="<?php echo $user['address']?>" required  >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Your Address 2</label>

										<div class="controls">
											<input type="text" name="address2" value="<?php echo $user['address2']?>" placeholder="Address 2"  >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Village/Town/City</label>

										<div class="controls">
											<input type="text" name="city" value="<?php echo $user['city']?>" placeholder="Village/Town/City"  >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">State/Province</label>

										<div class="controls">
											<input type="text" name="state" value="<?php echo $user['state']?>" placeholder="State/Province"  >
										</div>
									</div>



									<div class="controls">
									</div>

									<div class="form-group">
										<label class="form-label">Postcode</label>

										<div class="controls">
											<input type="text" name="postcode" value="<?php echo $user['postcode']?>" placeholder="Postcode"  >
										</div>
									</div>

									<div class="form-group">
										<div class="controls">
											<input type="hidden" name="action" value="editusers">
											<input type="hidden" name="id" value="<?php echo $user['id']?>">
											<input type="submit" name="update" class="btn btn-block btn-success" value="Update" >
											
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