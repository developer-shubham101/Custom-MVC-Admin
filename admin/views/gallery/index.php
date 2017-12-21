<style>
	<!--
	.full-image img {
		height: 200px;

	}
	.full-image{
		margin-right: 3px;
		margin-top: 3px;
		float: left;
		margin-left: 5px;
		height: 250px;
	}
	hr.hr {
		clear: both;
		margin: 21px 0 21px 0;
	}
-->
</style>
<?php
$db = new Database ();

$type = (isset ( $_GET ['type'] )) ? $_GET ['type'] : null;
$records_per_page = 30;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;
$status = "";
if(isset($_REQUEST ['status']) && $_REQUEST ['status'] == "trash"){
	$status = "trash";
	$db->where("status = 'trash'");
}else {
	$db->where("status = 'live'");
}
$gallery = $db->arraybuilder()->paginate(Help::TABLE_GALLERY, $current_page);


// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records($db->totalCount);
$pagination->variable_name("p");
// records per page
$pagination->records_per_page($records_per_page);
// render the pagination links




function cropImageByTimhumb($url){
	return URL ."timthumb.php?src=" . $url ."&w=250&h=200";
}
?>
<div class="container">

	<div class="card-panel z-depth-5">
		<?php echo $pagination->render(); ?>
	</div>
	<div class="card-panel z-depth-5">
		<div class="row">
			<div class="col s12 m12">
				<a href="<?php echo URL . 'gallery/?status=trash' ?>" >Trash</a>
			</div>
		</div>
	</div>
	<div class="card-panel z-depth-5">
		
		<form action="<?php echo URL . 'gallery/action' ?>" method="post" >								
			<div class="row">
				<?php
				$i =1;
				foreach ($gallery as $gall){
					echo '
					<div class="col s12 m3">
						<div class="card">
							<div class="card-image">
								<img src="'. $gall ["links"].'">
								<!--<span class="card-title">Card Title</span>-->

							</div>
							<div class="card-content">
								<p>'.$gall ["id"].'</p>
							</div>
							<div class="card-action">
								<input type="checkbox" name="select[]" id="id-'. $gall ['id'] .'" value="'. $gall ['id'] .'">
								<label for="id-'. $gall ['id'] .'"></label>
								<a href="#" class="trash" data-type="deletegallery" data-id="'. $gall ['id'] .'">Remove</a>

							</div>
						</div>
					</div>
					';
					if(($i % 4) == 0){
						echo 
						"<hr class='hr'>";
					}
					$i ++; 
				}
				?>
			</div>
			<?php 
			if ($status != "trash") {
				?>
				<select name="action"> 
					<option value="trash">Remove</option>
				</select>
				<?php
			}else {
				?>
				<select name="action">
					<option value="restore">Restore</option>
					<option value="remove">Remove</option>
				</select>
				<?php
			}?>
			
			<button class="btn waves-effect waves-light" type="submit"  >Trash
				<i class="material-icons right">send</i>
			</button>

		</form>
	</div>
</div> 


