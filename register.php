<?php 

	require_once "functions.php";

 ?>
 
<section>
	<h3>Sign Up</h3>
	<form method="post" action="register2.php" id="registerForm" enctype="multipart/form-data">
		<ul>
			<li> 
				<input type="text" name="first" placeholder="First Name">
				<input type="text" name="last" placeholder="Last Name">
			</li>
			<li>
				<input type="text" name="username" placeholder="Username">
			</li>
			<li>
				<input type="password" name="password" placeholder="Password">
			</li>
			<li>
				<input type="password" name="reTypePassword" placeholder="Re-Type Password">
			</li>
			<li>
				<input type="text" name="email" placeholder="Email">
			</li>
			<li>
				<label for="photo">User Photo:</label>
				<input type='file' name='photo'/>
			</li>
			<li>
				<input type="submit" value="Sign Up">
			</li>
		</ul>
	</form>

	<a class="switch_links" href="index.php?page=login"><i class="fa fa-long-arrow-left"></i> Back to Login</a>
</section>
				