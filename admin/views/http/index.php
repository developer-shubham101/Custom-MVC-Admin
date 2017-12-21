<?php
$db = new Database ();

$records_per_page = 10;
$current_page = (isset ( $_GET ['p'] )) ? $_GET ['p'] : 1;

$start_from = ($current_page - 1) * $records_per_page;

// set page limit to 2 results per page. 20 by default
$db->pageLimit = $records_per_page;
$code_get = "";
if (isset($_GET['code']) && !empty($_GET['code'])) {
	$db->where(' code = "' . $_GET['code'] . '"');
	$code_get = $_GET['code'];
}
$guests = $db->arraybuilder()->paginate(Help::TABLE_HTTP_RESONSE, $current_page);


// instantiate the pagination object
$pagination = new Zebra_Pagination();

// the number of total records is the number of records in the array
$pagination->records($db->totalCount);
$pagination->variable_name("p");
$pagination->remove_variable("url");
// records per page
$pagination->records_per_page($records_per_page);
// render the pagination links

?>

<div class="container">

  <div class="card-panel z-depth-5">
		<?php echo $pagination->render(); ?>
 
</div>
	<div class="card-panel z-depth-5">
		<div>HTTP list <?php echo "showing $current_page out of " . $db->totalPages; ?></div>
		<form method="get" >
			<?php
			$http = $db->get(Help::TABLE_HTTP_RESONSE);
			echo '<select name="code" ><option value="">Category</option>';
			foreach ($http as  $category) {
				echo '<option value="'.$category['code'].'" ';

				if ($code_get == $category['code'] ) {
					echo " selected ";
				}

				echo '>'.$category['code'].'</option>';
			}
			echo '</select>';
			?>

			<button class="btn waves-effect waves-light" type="submit" name="action">filter
				<i class="material-icons right">send</i>
			</button>
		</form>
	</div>

	<?php
	foreach ($guests as $guest) {

		echo '<div class="card-panel z-depth-5">';
		echo '<h2>' . $guest ['code'] . '</h2>';
		echo '<div><em>' . $guest ['title'] . '</em></div>';
		echo '<div>' .  $guest ['description'] . '</div>';

		echo ' <a class="waves-effect waves-light btn-large" href="' . URL . "http/edit?id=" . $guest ['id'] . '">Edit<i class="material-icons right">mode_edit</i></a>';
		echo '</div>';
	}
	?>
</div>