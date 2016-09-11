<?php
	require_once "functions.php";

	$query1 = "SELECT * FROM `lists` WHERE `lists`.`user_id` = '$user_id' AND `list_id` = '$list_id'";

	$result1 = $db->query($query1);

	$row1 = $result1->fetch_array();


?>

<form class="titleEdit" method="post" action="title2.php">
		<ul>
			<input type="hidden" name="list_id" value="<?php echo $list_id; ?> ">
			<li>
				<input type="text" name="title" value="<?php echo $row1['name']; ?>"/>
				<button value="update" type="submit">
					<i class="fa fa-arrow-circle-right fa-2x"></i>
				</button>
				<i class="fa fa-times fa-2x titlePencil"></i>
			</li>
		</ul>
	</form>