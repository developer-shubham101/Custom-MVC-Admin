
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


								<form action="<?php echo URL ?>news/create" method="post" id="create-news-form" enctype="multipart/form-data">

									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">NEWS Title</label>

										<div class="controls">
											<input type="text" name="title" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">NEWS Description</label>

										<div class="controls">
											<textarea rows="5" cols="60" name="description" class="form-control" ></textarea>											
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">social media icons </label>

										<div class="controls" id="files-input">
											<div><input type="text" name="images[]" class="form-control" ><span onclick="removeIt(this)">X</span></div>												
										</div>
										<div><span onclick="addNewFile();">Add new</span></div>
										<div id="images_preview">
											
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="form-label">Media icons </label>

										<div class="controls" id="media-input">
											<div><input type="text" name="media[]" class="form-control" ><span onclick="removeIt(this)">X</span></div>												
										</div>
										<div><span onclick="addNewMedia();">Add new</span></div>
										<div id="images_preview">
											
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Read More </label>

										<div class="controls" id="media-input">
											<input type="text" name="readmore" class="form-control" >
										</div>
										
										<div id="images_preview">
											
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
 
											<input type="submit" class="btn btn-block btn-success" value="Create" >
											<input type="hidden" name="action" value="createnews">
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