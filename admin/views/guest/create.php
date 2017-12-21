<!-- END SIDEBAR -->	<!-- BEGIN PAGE CONTAINER-->
<style>
<!--
.responed-image-icon img {
    width: 100px;
    margin-right: 3px;
    margin-top: 3px;
}
-->
</style>
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
								<form action="<?php echo URL ?>guest/create" method="post" id="create-guest-form" enctype="multipart/form-data">
									<div class="form-notify"> </div>
									<div class="form-group">
										<label class="form-label">Title </label>
										<div class="controls" id="files-input">
											<div><input type="text" required name="title" class="form-control" ></div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-label">Discription </label>

										<div class="controls">
											<input type="text" name="discription" class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<label class="form-label">Link </label>

										<div class="controls">
											<input type="url" name="link" class="form-control" >
										</div>
									</div>

									<div class="form-group">
										<div class="controls">
											<input type="submit" class="btn btn-block btn-success" value="Create" >
											<input type="hidden" name="action" value="createguest">
											 
										</div>
									</div>
									<div id="responsed-image"></div>
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