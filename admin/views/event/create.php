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


								<form action="<?php echo URL ?>events/create" method="post" id="create-event-form" enctype="multipart/form-data">

									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Event Name</label>

										<div class="controls">
											<input type="text" name="eventname" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event Date</label>

										<div class="controls">
											<input type="text" name="eventdate" placeholder="yyyy-mm-dd" class="form-control" >
										</div>
									</div>
									<div class="form-group" >
										<label class="form-label">Event Category</label>

										<div class="controls">
											<select name="eventcategory" required>
												<option value="">Select..</option>
												<option value="core">Core Team</option>
												<option value="minority">Minority Morcha </option>
												<option value="kisan">Kisan Morcha </option>
												<option value="mahila">Mahila Morcha </option>
												<option value="yuva">Yuva Morcha </option>
												<option value="alpsankhyak">Alpsankhyak</option>
												<option value="sc">SC</option>
												<option vlaue="st">ST</option>
												<option value="obc">OBC</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event Description</label>

										<div class="controls">
											<textarea name="eventdesc" rows="10" cols="60"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event location </label>

										<div class="controls">
											<input type="text" name="location" class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event Icon </label>

										<div class="controls" id="files-input">
											<div><input type="text" name="images[]" class="form-control" ><span class="cancle" onclick="removeIt(this)">X</span></div>
										</div>
										<div><span onclick="addNewFile();">Add new</span></div>
										<div id="images_preview">

										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Read More </label>

										<div class="controls">
											<input type="text" name="readmore" class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Status</label>
										<div class="controls">
											<select name="status" required>												
												<option value="publish" selected="selected">Publish</option>
												<option value="archive">Archive</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="controls">
											<input type="hidden" name="action" value="createevent">
											<input type="submit" class="btn btn-block btn-success" value="Create" >
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
