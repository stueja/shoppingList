<?php

	require_once "functions.php";
?>

<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Listastic!</title>
	<meta charset="UTF-8">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- GOOGLE FONTS -->
	<link href='https://fonts.googleapis.com/css?family=Lustria' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,700italic,700,600italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' rel='stylesheet' type='text/css'>

	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="font-awesome-4.4.0/css/font-awesome.min.css">

	<!-- JQUERY/JAVASCRIPT -->
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<!-- Below the general jquery always -->
	<script src="script.js"></script>
</head>

<body class="home">
	<div id="container">
	<?php include "error.php"; ?>
		<section class="banner clear">
			<div class="wrapper">
				<h1>Listastic</h1>
				<h2>Plan, Shop, Save.</h2>
				<?php
					$page = $_GET['page'];

					if($page == "sign_up"){
						include "register.php";
					}
					else{						
						include "login.php";
					}
				?>	
			</div>
		</section>

		<?php
			include "footer.php";
		?>
