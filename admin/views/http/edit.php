<?php
$team= $this->member;
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
								<form action="<?php echo URL ?>http/edit" method="post" id="edit-http-form" enctype="multipart/form-data">
									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">CODE</label>
										<div class="controls">
											<input type="text" name="code" value="<?php echo $team['code']; ?>" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Title</label>
										<div class="controls">
											<input type="text" name="title" value="<?php echo $team['title']; ?>" class="form-control" required >
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Description</label>
										<div class="controls">
											<textarea rows="15" cols="60" name="description"><?php echo $team['description']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">type</label>
										<div class="controls">
											<input type="text" name="type" value="<?php echo $team['type']; ?>" class="form-control" required >
										</div>
									</div>

									<div class="form-group">
										<div class="controls">
											<!-- <div id="adas">submit</div> -->
											<input type="hidden" name="action" value="edithttp"> 
											<input type="hidden" name="id" value="<?php echo $team['id']?>">
											<input type="submit" class="btn btn-block btn-success" value="update" >											
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
 
<script>
$("textarea").jqte();
</script>