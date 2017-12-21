<?php
$news= $this->news;
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
						<div class="row">
							<div class="col-md-8 col-sm-8 col-xs-8">
								<button type="button" onclick="showEdit()">Edit</button>
							</div>
						</div>
					</div>

					<div class="grid-body no-border">
						<br>
						<div class="row"> 
						<div class="col-md-8 col-sm-8 col-xs-8">

							<form action="<?php echo URL ?>president/edit" method="post" id="update-news-form" enctype="multipart/form-data">

								<div class="form-notify"> </div>
								<div class="form-group">
									<label class="form-label">president</label>

									<div class="controls">
										<input type="text" name="title" class="form-control" value="<?php echo $news['President']?>" required >
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Date_of_birth </label>

									<div class="controls">
										<textarea rows="8" cols="60" name="description" class="form-control" ><?php echo $news['Date_of_birth']?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="form-label">images</label>

									<div class="controls" id="files-input">
										<?php
										$images = unserialize($news['images']);
										foreach($images as $image) {
											echo '<div><input type="text" name="images[]" value="'.$image.'" class="form-control" ><span onclick="removeIt(this)">X</span></div>';
										}
										?>

									</div>
									<div><span onclick="addNewFile();">Add new</span></div>
									<div id="images_preview">

									</div>
								</div>


								<div class="form-group">
									<label class="form-label">Media</label>

									<div class="controls" id="media-input">
										<?php
										$media = unserialize($news['media']);
										foreach($media as $singl_meedia) {
											echo '<div><input type="text" name="media[]" value="'.$singl_meedia.'" class="form-control" ><span onclick="removeIt(this)">X</span></div>';
										}
										?>

									</div>
									<div><span onclick="addNewMedia();">Add new</span></div>
									<div id="images_preview">

									</div>
								</div>

								<div class="form-group">
										<label class="form-label">Read More </label>

										<div class="controls" id="media-input">
											<input type="text" name="readmore" value="<?php echo $news['readmore'] ?>" class="form-control" >
										</div>										
									</div>

								<div class="form-group">
									<label class="form-label">Status</label>
									<div class="controls">
										<select name="status" required>												 
											<option <?php if($news['status'] == "publish") echo 'selected="selected"'; ?> value="publish">Publish</option>
											<option <?php if($news['status'] == "archive") echo 'selected="selected"'; ?> value="archive">Archive</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<div class="controls">
										<!-- 											<div id="adas">submit</div> -->
										<input type="hidden" name="action" value="editnews">
										<input type="hidden" name="id" value="<?php echo $news['id']?>">
										<input type="submit" class="btn btn-block btn-success" value="Uppdate" >

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