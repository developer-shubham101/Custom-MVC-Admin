<?php

$db = new Database ();
$records_per_page = 10;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;

// $res = $db->get ("users");

$questions = $db->arraybuilder ()->paginate ( Help::QUESTIONS_TABLE, $current_page );

// instantiate the pagination object
$pagination = new Zebra_Pagination ();

// the number of total records is the number of records in the array
$pagination->records ( $db->totalCount );
$pagination->variable_name ( "p" );
// records per page
$pagination->records_per_page ( $records_per_page );
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
								<?php echo $pagination->render(); ?>
							</div>
							<div class="dashbord">
								Total queries are <strong><?php echo $db->count; ?>.</strong>
							</div>
							 <ul>
									<?php
									foreach ( $questions as $question ) {
										
										$db->where(" que_id = " . $question ['id']);
										$answer = $db->getOne (Help::ANSWERS_TABLE, " count(*) as count")['count'];
										
										echo '<li class="id-' . $question ['id'] . '">';
										// if(Help::isAdminLogedin()){
										
										echo '<h2><span><a href="' . URL . "dashbord/status?qid=" . $question ['id'] . '"> ' . $question ['question'] . ' .</a></span></h2> Total answers ' . $answer;
										
																				
										echo '<small><a href="' . URL . "answers/?qid=" . $question ['id'] . '"> Answers </a></small> <h2>';
										echo '</li>';
									}
									
									$assemblies = $db->get ( Help::USERS_TABLE );
									echo "=========<br />";
									foreach ( $assemblies as $assembly ) {
										echo $assembly ['id'] . ": " . $assembly ['username'] ;
										$ids = $db->subQuery ();
										$ids->where ( "user_id", $assembly ['id'], "=" );
										$ids->get ( Help::TERMS_TABLE, null, "admin_id" );
										$db->where ( "admin_id", $ids, '=' );
										$questions_of_assembly = $db->get ( Help::QUESTIONS_TABLE );
										$total_asked =  $db->count;
										echo " Total asked " . $db->count;
										
										$total_number_of_andwers = 0;
										foreach ($questions_of_assembly as $questions_of){
											$db->where(" que_id = ". $questions_of['id'] . " AND user_id = " . $assembly ['id'] );
											$db->getOne(Help::ANSWERS_TABLE);
											//echo " total answer = ".$db->count ."  ";
											$total_number_of_andwers += $db->count; 
										}
										echo "/".$total_number_of_andwers  ;
										if ($total_asked != 0 )
										echo " == " . (($total_number_of_andwers * 100) / $total_asked ) ." % ";
										echo "<br />";
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