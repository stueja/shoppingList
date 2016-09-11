<?php 

	require_once "functions.php";

	$sort = $_POST['sort'];

	if($sort == "priority"){
		$query_sort = "SELECT * FROM `groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `priority` DESC";
	}
	elseif($sort == "store"){
		$query_sort = "SELECT * FROM `groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `store` ASC";
	}
	elseif($sort == "a_z"){
		$query_sort = "SELECT * FROM `groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `name` ASC";
	}
	elseif($sort == "z_a"){
		$query_sort = "SELECT * FROM `groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `name` DESC";
	}
	else(
		$query_sort = "SELECT * FROM `groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `complete` ASC, `items`.`priority` DESC, `name` ASC";
		)


	header("location:index.php?list_id=" . $list_id . "&sort=" . $query_sort);