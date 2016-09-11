<?php

	require_once "functions.php";

	$item_id = $_GET['item_id'];
	$oldpriority = $_GET['priority'];

	$list_id = $_GET['list_id'];

	if($oldpriority == 0){
		$newpriority = 1;
	}
	else{
		$newpriority = 0;
	}

	$query = "UPDATE `ytercero_groceries`.`items` SET `priority` = '$newpriority' WHERE `item_id` = '$item_id'";

	$db->query($query);

	header("location:index.php?list_id=" . $list_id);