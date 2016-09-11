<?php 

	require_once "functions.php";
	$list_id = $db->escape_string($_POST['list_id']);

	$user_id = $_SESSION['user']['user_id'];

	$username = $_SESSION['user']['username'];
	
	$newfirst = $db->escape_string($_POST['first']);
	$newlast = $db->escape_string($_POST['last']);
	$newusername = $db->escape_string($_POST['username']);
	$oldPassword = $db->escape_string($_POST['password']);
	$newPassword = $db->escape_string($_POST['newPassword']);
	$reTypePassword = $db->escape_string($_POST['reTypePassword']);
	
	$destination = "images/";
	$filename = basename($_FILES['photo']['name']); //basename for compat and security
	$saveas = $destination . $filename;

	
	if($newusername != $username){
		$query6 = "SELECT * FROM `users` WHERE `username` = '$username'";

		$result6 = $db->query($query6);

		$row_cnt = $result6->num_rows;

		if($row_cnt > 0){
			header("location:index.php?list_id=".$list_id."&error=1");
		}
	}
	elseif ($newfirst == "" || $newlast == "" || $newusername == "") {
		header("location:index.php?list_id=".$list_id."&error=4");
	}
	elseif($newPassword != $reTypePassword){
		header("location:index.php?list_id=".$list_id."&error=3");
	}
	elseif($oldPassword != ""){
		if(password_verify($password, $_SESSION['user']['password']) == false){
			header("location:index.php?list_id=".$list_id."&error=2");
		}
		else{
			if(isset($_FILES['photo']) && $_FILES['photo']['size'] <= 10000000 && strpos($_FILES['photo']['type'],"image/") !== false){
						
			move_uploaded_file($_FILES['photo']['tmp_name'], $saveas);
			}
			else{
				$saveas = $_SESSION['user']['photo'];
			}

		$rehash = password_hash($newPassword, PASSWORD_DEFAULT);

		move_uploaded_file($_FILES['photo']['tmp_name'], $saveas);

		$query = "UPDATE `users` SET `first` = '$newfirst', `last` = '$newlast', `username` = '$newusername', `password` = '$rehash', `photo` = '$saveas' WHERE `user_id` = '$user_id'";

		$db->query($query);

		$query1 = "SELECT * FROM `ytercero_groceries`.`users` WHERE `user_id` = '$user_id'";

			$result1 = $db->query($query1);

			$row1 = $result1->fetch_array();

			$_SESSION['user'] = $row1; 

			header("location:index.php?list_id=" . $list_id);
		}
	}
	else{

		if(isset($_FILES['photo']) && $_FILES['photo']['size'] <= 10000000 && strpos($_FILES['photo']['type'],"image/") !== false){
						
			move_uploaded_file($_FILES['photo']['tmp_name'], $saveas);
		}
		else{
			$saveas = $_SESSION['user']['photo'];
		}

		$rehash = password_hash($newPassword, PASSWORD_DEFAULT);

		move_uploaded_file($_FILES['photo']['tmp_name'], $saveas);

		$query = "UPDATE `users` SET `first` = '$newfirst', `last` = '$newlast', `username` = '$newusername', `password` = '$rehash', `photo` = '$saveas' WHERE `user_id` = '$user_id'";

		$db->query($query);

		$query1 = "SELECT * FROM `ytercero_groceries`.`users` WHERE `user_id` = '$user_id'";

			$result1 = $db->query($query1);

			$row1 = $result1->fetch_array();

			$_SESSION['user'] = $row1; 

			header("location:index.php?list_id=" . $list_id);
	}
	