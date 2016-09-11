<?php
	require_once "functions.php";

	$search = $db->escape_string(strtolower($_POST['search']));
	$list_id = $db->escape_string($_POST['list_id']);

	$user_id = $_SESSION['user']['user_id'];

	$query = "SELECT * FROM `items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id'";
	$result = $db->query($query);

	$num = 0;

	while($row = $result->fetch_array()){
		
		$newnum = substr_count($row['name'], $search);
		// 	$num = $num + $search_result;
		// }
		$num = $num + $newnum;
		// $total = $num;
	
	}

	if($num > 1){
		echo "<div class='search_result'>";
		echo "<p>There are " . $num . " instances of '" . $search . "'.</p>";
		echo "</div>";
	}
	elseif($num == 1){
		echo "There is " . $num . " instance of '" . $search . "'.";
	}
	else{
		echo "'" . $search . "' not found";
	}