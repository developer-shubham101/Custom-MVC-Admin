<?php
$db = new Database ();

$qid = Model::getValue($_GET, "qid");

$records_per_page = 10;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;
$db->where(" que_id = ". Model::getValue($_GET, "qid") );
$answers = $db->arraybuilder()->paginate(Help::ANSWERS_TABLE, $current_page);


// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records($db->totalCount);
$pagination->variable_name("p");
// records per page
$pagination->records_per_page($records_per_page);
// render the pagination links


$db->where ( " id = " . $qid );
$question = $db->getOne ( Help::QUESTIONS_TABLE );

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
								<?php echo $pagination->render(); ?>
							</div>
							<h1><?php echo $question['question']?></h1>
							 <ul id="answers-list">
									<?php 
									foreach ($answers as $answer) {
										 
										echo '<li class="id-'. $answer ['id'] .'">';
										 
										echo '<h2><span>'. $answer ['answer'] .'. </span> </h2>';

										echo '<small>By ' . Help::getUserDetails($answer['user_id'])['username']. "</small>";
										if($answer['attachments'] != ""){
											echo ' <small>Attachment: <a href="' .  $answer['attachments'] . '">Download</a></small>';
										}
										
										echo '</li>';
										 
									}
									 ?>
								 </ul>
								 
								 <?php 
								 if (Help::isUserLogedin()) {
								 	?>
									 <h5>Give Answer</h5>
									 <form id="make-answer" action="<?php echo URL?>answers/make" method="post" enctype="multipart/form-data">
									 	<div class="form-notify"></div>
									 	<textarea rows="5" cols="40" class="answer-box" name="answer"></textarea>
									 	<input type="file" name="files">
									 	<input type="hidden" name="qid" value="<?php echo $qid;?>" />								 	
									 	<input type="hidden" value="makeanswer" name="action" />
									 	<input type="submit"  class="btn btn-block" value="give an answer">
									 </form>
									 <?php 
								 }?>

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