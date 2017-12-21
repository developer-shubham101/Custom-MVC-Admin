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
<div class="container">
	<div class="row">

		<div class="col s12 m3">
			<form action="<?php echo URL ?>gallery/create" method="post" id="create-gallery-form" enctype="multipart/form-data">
				<div class="form-notify"> </div>
				<div class="form-group">
					<label class="form-label">Image</label>
					<div class="controls" id="files-input">
						<div><input type="text" name="image" class="form-control" ></div>
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Discription </label>

					<div class="controls">
						<input type="text" name="discription" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="form-label">Status</label>
					<div class="controls">
						<select name="status" required>
							<option value="publish">Publish</option>
							<option value="archive">Archive</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="controls">
						<input type="submit" class="btn btn-block btn-success" value="Create" >
						<input type="hidden" name="action" value="creatimage">
						 
					</div>
				</div>
				<div id="responsed-image"></div>
			</form>
		</div>

	</div>
</div>