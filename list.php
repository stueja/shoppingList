<?php
	require_once "functions.php";

	$list_id = $_GET['list_id'];

	$user_id = $_SESSION['user']['user_id'];

	$user_first = $_SESSION['user']['first'];

	$user_photo = $_SESSION['user']['photo'];
?>


<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> 
		<?php 
			if (substr($user_first, -1) == 's') {
				echo $user_first . "' List - " . showTitle();
			}
			else{
				echo $user_first . "'s List - " . showTitle();
			}	
		?>
	</title>
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

<body class="list">
	<section class="menuPop">
		<h6 class='menux menus'><i class='fa fa-times'></i> Menu</h6>
		<div class='list_info'>
			<?php 
				if (substr($user_first, -1) == 's') {
					echo "<h2>" . $user_first . "' Lists</h2>";
				}
				else{
					echo "<h2>" . $user_first . "'s Lists</h2>";
				}	
			?>
			<div >
				<h4 class="add_list">
					Add List
					<i class="fa fa-plus"></i>
				</h4>
				<div class="list_form">
					<?php
						include "newlist.php";
					?>
				</div>
			</div>
			<ul class='listoflists'>
				<?php
					echo listLists();
				?>
			</ul>
		</div> <!-- end list_info -->
		<img class='user_pic' src='<?php echo $user_photo; ?>'/>
		<div class='user_info'>
			<?php		
				echo "<h2> Hey, " . $user_first . "!</h2>";
				include "userInfo.php";
			?>
		</div> <!-- end user_info -->
		<h6><a class='logout' href='logout.php'>Logout <i class='fa fa-external-link'></i></a></h6>
	</section>
	<div id="container" class="clear">
	<?php include "error.php"; ?>
		<h6 class="menubar menus">
			<i class="fa fa-bars"></i> Menu
		</h6>
		<section class="mainList">
			<div class="wrapper">
				<h2 class="mainListTitle">
					<?php echo showTitle(); ?> 
					<i class="fa fa-pencil titlePencil itemOption"></i>
				</h2>
				<div id="titleEditDiv">
					<?php include "title.php"; ?>
				</div>
				
				<div class="sort_search clear">
			 		<?php 
			 			include "listsort.php";
			 			include "search.php";
			 			$search = $db->escape_string(strtolower($_POST['search']));
			 			if($search == ""){
			 				echo "";
			 			}
			 			else{
			 				searchResult();
			 			}
		 			?>
		 		</div> <!-- end sort_search -->
			 		<?php 
					 	include "add.php";
						echo listItems();
					?>
			</div> <!-- end wrapper -->
		</section> <!-- end mainList -->
		<?php 
			include "footer.php";
		 ?>		


