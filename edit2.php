<?php 

	require_once "functions.php";

	$item_id = $db->escape_string($_POST['item_id']);
	$newname = $db->escape_string($_POST['name']);
	$newdescription = $db->escape_string($_POST['description']);
	$newstore = $db->escape_string($_POST['store']);
	$newquantity = $db->escape_string($_POST['quantity']);
	$newprice = $db->escape_string($_POST['price']);

	$list_id = $db->escape_string($_POST['list_id']);


	$query = "UPDATE `ytercero_groceries`.`items` SET `name` = '$newname', `description` = '$newdescription', `store` = '$newstore', `quantity` = '$newquantity', `price` = '$newprice' WHERE `item_id` = '$item_id' AND `list_id` = '$list_id'";

	$db->query($query);

	header("location:index.php?list_id=" . $list_id);