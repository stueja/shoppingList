<?php
	require_once "functions.php";

	$list_id = $_GET['list_id'];

?>
 	<div class="add_item">
 		<h3>Add Item <i class="fa fa-plus"></i></h3>
 	</div>
	<form id="add" method="post" action="add2.php">
		<ul>
			<li>
				<input type="hidden" name="list_id" value="<?php echo $list_id; ?> ">
				<input type="text" name="name" placeholder="Item (Required)">
				<input type="text" name="store" placeholder="Store">
				<input type="text" name="quantity" placeholder="Quantity">
			</li>
			<li>
				<input type="text" name="description" placeholder="Description">
 				<input type="submit" form="add" value="Add Item">
			</li>
		</ul>
	</form>
