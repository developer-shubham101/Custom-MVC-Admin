<?php
$db = new Database ();
$records_per_page = 5;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;

if (Help::isUserLogedin()) {
	$ids = $db->subQuery ();
	$ids->where ("user_id", Help::getUserId(), "=");
	$ids->get (Help::TERMS_TABLE, null, "admin_id");	 
	$db->where ("admin_id", $ids, '=');
	$db->orWhere ("admin_id = 1 ");	
}else if (Help::isAdminLogedin()) {
	$db->where ("admin_id", Help::getAdminId(), '=');
}



// $res = $db->get ("users");

$questions = $db->arraybuilder()->paginate(Help::QUESTIONS_TABLE, $current_page);


// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records($db->totalCount);
$pagination->variable_name("p");
// records per page
$pagination->records_per_page($records_per_page);
// render the pagination links


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
							<div class="pages">
								<?php  echo $pagination->render(); ?>
							</div>
							 <ul>
									<?php 
									foreach ($questions as $question) {
										
										 
										echo '<li class="id-'. $question ['id'] .'">';
										//if(Help::isAdminLogedin()){
										if(0){
											echo '<h2><span><a href="'.URL."question/edit?id=".$question ['id']. '"> '. $question ['question'] .' .</a></span> ';
										}else {
											echo '<h2><span>'. $question ['question'] .'. </span> ';
										}
										
										echo '<small><a href="'.URL."answers/?qid=".$question ['id']. '"> Answers </a></small> <h2>';
										echo '<small class="delete" data-type="deletequestion" data-id="'. $question ['id'] .'">Delete</small>';
										echo '</li>';
										 
									}
									 ?>
								 </ul>
								 

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