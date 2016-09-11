<?php  

	$error = $_GET['error'];

	if($error != ""){
		echo "<div class='errors popUps'><h6>Error</h6><p>";
		if($error == 1){
			echo "Username already exists.";
		}
		elseif($error == 2){
			echo "Incorrect password.";
		}
		elseif($error == 3){
			echo "Passwords do not match.";
		}
		elseif($error == 4){
			echo "Please fill all required fields.";
		}
		else{
			echo "Incorrect password or username";
		}
		echo "</p><div class='ok'>OK</div></div>";
	}