<?php
$db = new Database ();
?>
<div class="container">
	<div class="input-field card-panel z-depth-5">
		<div class="input-field ">
			<?php
			$db->where ( "location_type = 0" );
			$table_output = $db->get ( Help::TABLE_WORLD_CITIES );
			echo '<select id="country" name="country" ><option value="">country</option>';
			foreach ( $table_output as $designation ) {
				echo '<option value="' . $designation ['id'] . '" >' . $designation ['name'] . '</option>';
			}
			echo '</select>';
			?>
			<label>Method</label>
		</div>
	</div>
	<div class="card-panel z-depth-5">
		<div class="input-field ">
			<select id="state" name="state" ><option value="">state</option></select>
			<label>Method</label>
		</div>
	</div>
	<div class="card-panel z-depth-5">
		<div id="cities"><ul></ul></div>
	</div>
</div>
