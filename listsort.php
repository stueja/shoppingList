<?php

	require_once "functions.php";

	$list_id = $_GET['list_id'];
?> 

 	<div class="sort_items">
		<form method="post" action="index.php?list_id=<?php echo $list_id; ?> " class="sort_form clear">
			<div class="selectParent">
				<select name="sort">
					<option value="default">Sort By...</option>
					<option value="default">Default</option>
					<option value="priority">Priority</option>
					<option value="store">Store</option>
					<option value="a_z">A-Z</option>
					<option value="z_a">Z-A</option>
				</select>
				 <button value="update" type="submit">
					<i class="fa fa-arrow-circle-right fa-2x"></i>
				</button>
			</div>
		</form>
	</div>
