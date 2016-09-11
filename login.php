<?php 

	require_once "functions.php";

 ?>
<section id="logIn">
	<h3>Log In</h3>
	<form method="post" action="login2.php" id="loginForm">
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		
		<input type="submit" value="Log In">
	</form>
	<div class="forgotLinks clear">
		<a href="#">Forgot Username</a>
		<a href="#">Forgot Password</a>
	</div>
	<a class="switch_links" href="index.php?page=sign_up">Sign Up <i class="fa fa-long-arrow-right"></i></a>
</section>