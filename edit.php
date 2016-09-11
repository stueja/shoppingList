<?php
	require_once "functions.php";

	$item_id = $row['item_id']; //We're able to do this bc being included in list.php

	//because we're including now, $item_id exists in list.php, so we can use it here. GET wouldn't work because you can't include with URL vars

	$query1 = "SELECT * FROM `items` WHERE `items`.`item_id` = '$item_id'";

	$result1 = $db->query($query1);

	$row1 = $result1->fetch_array();
?>

	<form class="editForm" method="post" action="edit2.php">
		<ul>
			<input type="hidden" name="list_id" value="<?php echo $list_id; ?> ">
			<input type="hidden" name="item_id" value="<?php echo $item_id; ?> ">
			<li>
				<label for="name">Item:</label>
				<input type="text" name="name" value="<?php echo $row1['name']; ?>"/>
			</li>
			<li>
				<label>Store:</label>
				<input type="text" name="store" value="<?php echo $row1['store']; ?>"/>
			</li>
			<li>
				<label>Quantity:</label>
				<input type="text" name="quantity" value="<?php echo $row1['quantity']; ?>"/>
			</li>
			<li>
				<label for="description">Description:</label>
				<input type="text" name="description" value="<?php echo $row1['description']; ?>"/>
			</li>
<!-- 			<li>
				<label>Price:</label>
				<input type="text" name="price" value="<?php echo $row1['price']; ?>"/>
			</li> -->
			<li>
				<input type="submit" value="Update"/>
			</li>
		</ul>
	</form>
	
