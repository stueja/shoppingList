<?php
	require_once "functions.php";

	$list_id = $_GET['list_id'];

?>

<div class="search">
	 <form method="post" action="index.php?list_id=<?php echo $list_id; ?> " id="searchForm">
	 	<input type="text" name="search" placeholder="Search">
	 	<input type="hidden" name="list_id" value="<?php echo $list_id; ?> ">
	 </form>
	 <button type="submit" form="searchForm" value="Search">
		<span class="fa-stack fa-lg">
		 	<i class="fa fa-circle fa-stack-2x"></i>
  			<i class="fa fa-search fa-stack-1x fa-inverse"></i>
		</span>
	</button>
</div>

					