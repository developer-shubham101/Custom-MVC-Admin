<?php
$gallery = $this->gallery;
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


								<form action="<?php echo URL ?>gallery/edit" method="post" id="edit-gallery-form" enctype="multipart/form-data">

									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Image </label>

										<div class="controls" id="files-input">

										<span><img style="width: 100px;" src="<?php echo $gallery['links']?>" /></span>

											<div><input type="text" name="image" value="<?php echo $gallery['links']?>" class="form-control" ></div>
										</div>

									</div>
									
									
									<div class="form-group">
										<label class="form-label">Discription </label>

										<div class="controls">
											
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Status</label>
										<div class="controls">
											<select name="status" required>
												<option <?php if($gallery['status'] == "publish") echo 'selected="selected"'; ?> value="publish">Publish</option>
												<option <?php if($gallery['status'] == "archive") echo 'selected="selected"'; ?> value="archive">Archive</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="controls"> 
											<input type="hidden" name="action" value="editmember">
											<input type="hidden" name="id" value="<?php echo $gallery['id']?>">
											<input type="submit" class="btn btn-block btn-success" value="update" >
											<input type="hidden" name="action" value="editgallery">
											<input type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
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