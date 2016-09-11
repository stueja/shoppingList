<?php
	session_start();

	$db = new mysqli('localhost', 'ytercero_ytercer', 'T3rc3r092', 'ytercero_groceries');

	if ($db->connect_errno) {
		echo $db->connect_error;
	}



	function showTitle(){
		global $db;

		$user_id = $_SESSION['user']['user_id'];

		$list = $_GET['list_id'];
		
		$query4 = "SELECT * FROM `lists` WHERE `list_id` = '$list' AND `user_id` = '$user_id'";
	
		$result4 = $db->query($query4);
		
		$row4 = $result4->fetch_array();

		return $row4['name'];

	}

	function listItems(){
		global $db;

		$user_id = $_SESSION['user']['user_id'];

		$list_id = $_GET['list_id'];

		$sort = $_POST['sort'];


		if($sort == "priority"){
			$query_sort = "SELECT * FROM `ytercero_groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `priority` DESC";
		}
		elseif($sort == "store"){
			$query_sort = "SELECT * FROM `ytercero_groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `store` ASC";
		}
		elseif($sort == "a_z"){
			$query_sort = "SELECT * FROM `ytercero_groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `name` ASC";
		}
		elseif($sort == "z_a"){
			$query_sort = "SELECT * FROM `ytercero_groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `name` DESC";
		}
		elseif($sort == "default"){
			$query_sort = "SELECT * FROM `ytercero_groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `complete` ASC, `items`.`priority` DESC, `name` ASC";
			}
		else{
			$query_sort = "SELECT * FROM `ytercero_groceries`.`items` WHERE `user_id` = '$user_id' AND `list_id` = '$list_id' ORDER BY `complete` ASC, `items`.`priority` DESC, `name` ASC";
			}

		$result = $db->query($query_sort);

		echo "<ul class='mainItemList'>";
		while($row = $result->fetch_assoc()){
			echo "<li class='clear'>";
				echo "<div class='text nonedit'>";
					if($row['complete'] == 1){
						$complete = "complete";
					}
					else{
						$complete = "notComplete";
					}

					if($row['priority'] == 1){
						$priority = 'highlight';
					}
					else{
						$priority = 'nohighlight';
					}

					echo "<p class='$complete' ><span class='$priority'>" .  ucwords($row['name']) . "</span>";
						echo " <span class='lighttext'>";
							if($row['description'] != ""){
								echo $row['description'] . "&nbsp;";
							}
							else{
								echo " ";
							}
							if($row['store'] != ""){
								echo "</span>&nbsp; Store: <span class='lighttext'>" . ucwords($row['store']);
							}
							else{
								echo " ";
							}
						 	if($row['quantity'] != ""){
								echo "</span>&nbsp; Quantity: <span class='lighttext'>" . $row['quantity'];
							}
							else{
								echo " ";
							}
							if($row['price'] != ""){
								echo "$" . $row['price'];
							}
							else{
								echo " ";
							}
						echo "</span></p>";
				echo "</div>";
				echo "<div class=' text editToggle'>";
					include "edit.php";
				echo "</div>";
				echo "<div class='atagDrop'><i id='angleDown' class='fa fa-angle-down'></i>";
					echo "<div class='atags'>";
						echo "<a href='complete.php?complete=" . $row['complete'] . "&item_id=" .$row['item_id']. "&list_id=" . $list_id . "'><i class='fa fa-check'></i></a>";
							if($row['priority'] == 0){
								$star = 'fa fa-star-o';
							}
							else{
								$star = 'fa fa-star';
							}
						echo "<a href='priority.php?priority=" . $row['priority'] . "&item_id=" .$row['item_id']. "&list_id=" . $list_id . "'><i class='$star'></i></a>";
						echo "<a href='edit.php?item_id=" . $row['item_id']. "&list_id=" . $list_id . "'><i class='fa fa-pencil itemOption'></i></a>";
						
						echo "<a href='delete.php?item_id=" .$row['item_id']. "&list_id=" . $list_id . "'><i class='fa fa-trash-o itemOption'></i></a>";
					echo "</div>";
				echo "</div>";
				
			echo "</li>";
		}
		echo "</ul>";

	}

	function listLists(){
		global $db;

		$user_id = $_SESSION['user']['user_id'];

		$query2 = "SELECT * FROM `lists` WHERE `user_id` = '$user_id'";

		$result2 = $db->query($query2);

		while($row2 = $result2->fetch_array()){
			echo "<li class='clickList clear'>";
			$title_len = strlen($row2['name']);
			if($title_len > 15){
				$y=substr($row2['name'],0,14) . '...';
				echo "<a href=index.php?list_id=" . $row2['list_id'] . ">". $y . "</a>";
			}
			else{
				echo "<a href=index.php?list_id=" . $row2['list_id'] . ">". $row2['name'] . "</a>";
			}
			echo "<a href='deletelist.php?list_id=" . $row2['list_id'] . "'><i class='fa fa-trash-o itemOption'></i></a>";
			echo "</li>";
		}
	}

	function complete(){
		global $db;

		$list_id = $_GET['list_id'];

		$item_id = $_GET['item_id'];
		$oldcompleted = $_GET['complete'];

		if($oldcompleted == 0){
			$newcompleted = 1;
		}
		else{
			$newcompleted = 0;
		}


		$query = "UPDATE `ytercero_groceries`.`items` SET `complete` = '$newcompleted' WHERE `items`.`item_id` = '$item_id'";

		$db->query($query);

		header("location:index.php?list_id=" . $list_id);
	}

	function delete(){
		global $db;

		$list_id = $_GET['list_id'];

		$item_id = $_GET['item_id'];

		$query = "DELETE FROM `ytercero_groceries`.`items` WHERE `items`.`item_id` = '$item_id'";

		$db->query($query);

		header("location:index.php?list_id=" . $list_id);
	}

	function deleteList(){
		global $db;

		$list_id = $_GET['list_id'];

		$query = "DELETE FROM `ytercero_groceries`.`lists` WHERE `lists`.`list_id` = '$list_id'";

		$db->query($query);
	}

	function searchResult(){
		global $db;

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
			echo "<div class='popUps search_result'>";
			echo "<p>There are " . $num . " instances of '" . $search . "'.</p>";
			echo "<div class='ok'> OK </div>";
			echo "</div>";
		}
		elseif($num == 1){
			echo "<div class='popUps search_result'>";
			echo "<p>There is " . $num . " instance of '" . $search . "'.</p>";
			echo "<div class='ok'> OK </div>";
			echo "</div>";
		}
		elseif($num == 0){
			echo "<div class='popUps search_result'>";
			echo "<p>'" . $search . "' not found.</p>";
			echo "<div class='ok'> OK </div>";
			echo "</div>";
		}
		else{
			echo "";
		}
	}

	function priority(){
		global $db;

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

		echo $query;

		$db->query($query);

		header("location:index.php?list_id=" . $list_id);
	}
