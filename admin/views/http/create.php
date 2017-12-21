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
								<form action="<?php echo URL ?>http/create" method="post" id="create-news-form" enctype="multipart/form-data">
									<div class="form-notify"> </div>
									<table id="users-list" class="table table-striped table-bordered no-more-tables">
										<caption>Sites list </caption>
										<input type="button" id="add_box_row" value="Add row" class="btn btn-block btn-success">
										<input type="button" id="add_box_row" value="Set" onclick="createTexeditor()" class="btn btn-block btn-success">
										
										<thead>
											<tr>
												<th>Code</th>
												<th>Title</th> 
												<th>Description</th>												
											</tr>
										</thead>
										<tbody id="tbody-box-form">									
											 
										</tbody>
									</table>
									<input type="submit" class="btn btn-block btn-success" value="Create" >
									<input type="hidden" name="action" value="createhttp">
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
	jQuery(function(){
		var counter = 1;
		jQuery('#add_box_row').click(function(event){
			event.preventDefault();
			var newRow = jQuery(<?php 
				echo '\'<tr class="id">';		 
				echo '<td><div class="controls">';
				echo '<input type="text" name="values[\'+counter+\'][code]" class="form-control"  required >';
				echo '</td></div>';
				echo '<td><div class="controls">';
				echo '<input type="text" name="values[\'+counter+\'][title]" class="form-control" >';
				echo '</td></div>';
				echo '<td><div class="controls">';
				echo '<textarea name="values[\'+counter+\'][description]" class="form-control" ></textarea>';
				echo '</td></div>';
				echo '<td><div class="controls">';
				echo '<input type="text" name="values[\'+counter+\'][type]" class="form-control" >';
				echo '</td></div>';
				echo '</tr>\'';
				?>);
			counter++;
			jQuery('table#users-list #tbody-box-form').append(newRow);
		});
	});
 
 function createTexeditor () {
 	$("textarea").jqte();
 }
	
</script>