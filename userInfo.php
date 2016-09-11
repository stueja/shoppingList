<?php
	require_once "functions.php";

	$list_id = $_GET['list_id'];

	$user_id = $_SESSION['user']['user_id'];

	$query5 = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";

	$result5 = $db->query($query5);

	$row5 = $result5->fetch_array();
?>

<form id="userInfoForm" method="post" action="userInfo2.php" enctype="multipart/form-data">
	<ul>
		<input type="hidden" name="list_id" value="<?php echo $list_id; ?> ">
		<li>
			<label for="first">First Name:</label>
			<input type="text" name="first" value="<?php echo $row5['first']; ?>"/>
		</li>
		<li>
			<label for="last">Last Name:</label>
			<input type="text" name="last" value="<?php echo $row5['last']; ?>"/>
		</li>
		<li>
			<label for="username">Username:</label>
			<input type="text" name="username" value="<?php echo $row5['username']; ?>"/>
		</li>
		<li>
			<label for="password">Change Password:</label>
			<input type="text" name="password" placeholder="Old Password" value="" />
			<input type="text" name="newPassword" placeholder="New Password"/>
			<input type="text" name="reTypePassword" placeholder="Confirm New Password"/>
		</li>
		<li>
			<label for="photo">User Photo:</label>
			<input type='file' name='photo'/>
		</li>
		<li>
			<input type="submit" value="Update Info">
		</li>
	</ul>
</form>