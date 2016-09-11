<?php 

	require_once 'functions.php';
	
		if(isset($_SESSION['user'])){ //if logged in 
			include "list.php";			
		}
		else{	
			include "logandregister.php";
		}
