<?php
	require_once "functions.php";

	$name = $db->escape_string(strtolower($_POST['name']));
	$description = $db->escape_string(strtolower($_POST['description']));
	$store = $db->escape_string(strtolower($_POST['store']));
	$quantity = $db->escape_string(strtolower($_POST['quantity']));
	// $price = $db->escape_string(strtolower($_POST['price']));
	$user_id = $_SESSION['user']['user_id'];
	$list_id = $_POST['list_id'];

	
	if($name == ""){
		echo "Please fill out the 'Name' field.";
	}
	elseif(ctype_digit($quantity) == false){
		echo "Quantity accepts only digits.";
	}
	else{
		$query = "INSERT INTO `ytercero_groceries`.`items` (`name`, `description`, `store`, `quantity`, `user_id`, `list_id`) VALUES ('$name', '$description', '$store', '$quantity', '$user_id', '$list_id')";
	}

	$db->query($query);

	header("location:index.php?list_id=" . $list_id);
