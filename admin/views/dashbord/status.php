<?php
$db = new Database ();
$question_id = Model::getValue ( $_GET, "qid" );

?>

<!-- END SIDEBAR -->
<!-- BEGIN PAGE CONTAINER-->
<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div id="portlet-config" class="modal hide">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button"></button>
			<h3>Widget Settings</h3>
		</div>
		<div class="modal-body">Widget settings form goes here</div>
	</div>
	<div class="clearfix"></div>
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
								<?php   ?>
							</div>
								<div class="dashbord">
									Total queries are <strong><?php   ?>.</strong>
								</div>
								<ul>
									<?php
									$db->where ( " que_id = " . $question_id );
									echo "Total answers = ";
									echo $total_answer = $db->getOne ( Help::ANSWERS_TABLE, " count(*) as count" ) ['count'];
									
									echo "<br />Total numbers of state assembly = ";
									// echo $assembly = $db->getOne ( Help::USERS_TABLE, " count(*) as count" ) ['count'];
									$assemblies = $db->get ( Help::USERS_TABLE );
									
									/* ==================== */
									
									$subquery = $db->subQuery ();
									$subquery->where( " que_id = " . $question_id);
									$subquery->get ( Help::ANSWERS_TABLE, null, array (
											"user_id"
									) );
									$db->where ( "id", $subquery, "NOT IN" );
									$users = $db->get ( Help::USERS_TABLE );
									echo "<br />Total numbers of not replaied  = " . $db->count;
// 									print_r ( $users );
									echo "<br /> state assembly names of not replied <br />" ;
									foreach ( $users as $user ) {
										echo  "<b>" . $user ['name'] . '</b><br />';
									}
									
									/* ==================== */
									$subquery = $db->subQuery ();
									$subquery->where( " que_id = " . $question_id);
									$subquery->get ( Help::ANSWERS_TABLE, null, array (
											"user_id"
									) );
									$db->where ( "id", $subquery, "IN" );
									$users = $db->get ( Help::USERS_TABLE );
									echo "<br />Total numbers of replaied  = " . $db->count;

									echo "<br /> state assembly names of replied <br />" ;
									foreach ( $users as $user ) {
										echo  "<b>" . $user ['name'] . '</b><br />';
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