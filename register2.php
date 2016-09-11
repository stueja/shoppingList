<?php 

	require_once "functions.php";

	$first = $_POST['first'];
	$last = $_POST['last'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$reTypePassword = $_POST['reTypePassword'];
	$email = $_POST['email'];

	// $pos = strpbrk($email, "@");
	$hash = password_hash($password, PASSWORD_DEFAULT);

		
	$destination = "images/";
	$filename = basename($_FILES['photo']['name']); //basename for compat and security
	$saveas = $destination . $filename;


	// // // $query_error = "SELECT * FROM `errors`";

	// // // $result_error = $db->query($query_error);

	// // // while($row_err = $result_error->fetch_array()){

	// // // }

	
	if($first == "" || $last == "" || $username == "" || $password == "" || $reTypePassword == "" || $email == ""){
			header("location:index.php?page=sign_up&error=4");
		}
	// // // elseif($pos != "@"){
	// // // 	echo "Please enter valid email.";
	// // // }
	else{
			if($password != $reTypePassword){
				header("location:index.php?page=sign_up&error=3");
			}
			else{

				$query6 = "SELECT * FROM `users` WHERE `email` = '$email'";

				$result6 = $db->query($query6);

				$row_cnt = $result6->num_rows;

				if($row_cnt > 0) {
					echo "<div class='search_result'>";
					echo "<p>Email already exists.</p>";
					echo "</div>";
				}
				else{

					$query6 = "SELECT * FROM `users` WHERE `username` = '$username'";

					$result6 = $db->query($query6);

					$row_cnt = $result6->num_rows;

					if($row_cnt > 0) {
						header("location:index.php?page=sign_up&error=1");
					}
					else{

						if(isset($_FILES['photo']) && $_FILES['photo']['size'] <= 10000000 && strpos($_FILES['photo']['type'],"image/") !== false){
							
							move_uploaded_file($_FILES['photo']['tmp_name'], $saveas);
						}
						else{
							$saveas = "images/default_photo.jpg";
						}


						$query = "INSERT INTO `users` (`first`, `last`, `username`, `password`, `email`, `photo`) VALUES ('$first', '$last', '$username', '$hash', '$email', '$saveas')";

						$db->query($query);
						
						$query1 = "SELECT * FROM `ytercero_groceries`.`users` WHERE `username` = '$username' AND `password` = '$hash'";

						$result1 = $db->query($query1);

						$row1 = $result1->fetch_array();

						$_SESSION['user'] = $row1; 

						$user_id = $_SESSION['user']['user_id'];

						$query2 = "INSERT INTO `lists` (`name`, `user_id`) VALUES ('New List', '$user_id')";

						$db->query($query2);

						$query3 = "SELECT * FROM `ytercero_groceries`.`lists` WHERE `user_id` = '$user_id'";

						$result3 = $db->query($query3);

						$row3 = $result3->fetch_array();

					   header("location:index.php?list_id=" . $row3['list_id']);
					}
				}
			}
		}

		
