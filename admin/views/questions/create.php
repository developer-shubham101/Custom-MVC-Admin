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


								<form action="<?php echo URL ?>questions/create" method="post" id="create-question-form" enctype="multipart/form-data">

									<div class="form-notify"> </div>
									  
									<div class="form-group">
										<label class="form-label">Questions </label>

										<div class="controls">
											<textarea rows="5" name="question" cols="40"></textarea>										 
										</div>
									</div>

									 

									<div class="form-group">
										<div class="controls">
											<input type="hidden" name="action" value="createquestion">
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