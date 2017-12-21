<?php
$event = $this->event;
function isNullDate($date){
	$intDate = (int)str_replace("-", "", $date);
	if ($intDate == 0) {
		return "";
	}else {
		return $date;
	}
}
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


								<form action="<?php echo URL ?>events/edit" method="post" id="edit-event-form" enctype="multipart/form-data">

									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Event Name</label>

										<div class="controls">
											<input type="text" name="eventname" value="<?php echo $event['name']?>" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event Date</label>

										<div class="controls">
											<input type="text" name="eventdate" value="<?php echo isNullDate($event['date']);?>" class="form-control" >
										</div>
									</div>
									<div class="form-group" >
										<label class="form-label">Event Category</label>

										<div class="controls">
											<select name="eventcategory" required>
												<option value="">Select..</option>
												<option <?php if($event['category'] == "core") echo 'selected="selected"'; ?> value="core">Core Team </option>
												<option <?php if($event['category'] == "minority") echo 'selected="selected"'; ?> value="minority">Minority Morcha </option>
												<option <?php if($event['category'] == "kisan") echo 'selected="selected"'; ?> value="kisan">Kisan Morcha </option>
												<option <?php if($event['category'] == "mahila") echo 'selected="selected"'; ?> value="mahila">Mahila Morcha </option>
												<option <?php if($event['category'] == "yuva") echo 'selected="selected"'; ?> value="yuva">Yuva Morcha </option>
												<option <?php if($event['category'] == "alpsankhyak") echo 'selected="selected"'; ?> value="alpsankhyak">Alpsankhyak </option>
												<option <?php if($event['category'] == "sc") echo 'selected="selected"'; ?> value="sc">SC </option>
												<option <?php if($event['category'] == "st") echo 'selected="selected"'; ?> value="st">ST </option>
												<option <?php if($event['category'] == "obc") echo 'selected="selected"'; ?> value="obc">OBC </option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event Description</label>

										<div class="controls">
											<textarea rows="10" cols="60" name="eventdesc"><?php echo $event['description']?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event location </label>

										<div class="controls">
											<input type="text" name="location" value="<?php echo $event['location']?>"  class="form-control" >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Event location </label>

										<div class="controls" id="files-input">
											<?php
											$images = unserialize($event['images']);
											foreach ( $images as $image ) {
												echo '<div><input type="text" name="images[]" value="' . $image . '" class="form-control" ><span class="cancle" onclick="removeIt(this)">X</span></div>';
											}
											?>

										</div>
										<div><span onclick="addNewFile();">Add new</span></div>
										<div id="images_preview">

										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Read More </label>

										<div class="controls">
											<input type="text" name="readmore" value="<?php echo $event['readmore']?>" class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Status</label>
										<div class="controls">
											<select name="status" required>												 
												<option <?php if($event['status'] == "publish") echo 'selected="selected"'; ?> value="publish">Publish</option>
												<option <?php if($event['status'] == "archive") echo 'selected="selected"'; ?> value="archive">Archive</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="controls">
											<input type="hidden" name="action" value="editevent">
											<input type="hidden" name="id" value="<?php echo $event['id']?>">
											<input type="submit" class="btn btn-block btn-success" value="Update" >
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
