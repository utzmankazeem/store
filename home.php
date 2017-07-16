<?php

	session_start();
	include 'includes/db.php';
	include 'includes/footer.php';
	include 'includes/header.php';
	include 'includes/functions.php';
	
?>

<div class="wrapper">
		<div id="stream">
<div class="mast">	
	<section>
			<nav>
   				<ul class="clearfix">
					<li><a href="home.php" class="selected">add category</a></li>
					<li><a href="category.php">add category</a></li>
					<li><a href="viewcategory.php">view category</a></li>
					<li><a href="viewcategory.php">edit category</a></li>
					<li><a href="viewcategory.php">delete category</a></li>
				</ul>
			</nav>
		
	</section>
</div>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>

<?php

$page_title = "Home";
	
?>
</head>

<body>
<hr />
<p> <h2> Hello Here </h2> </p>
<p>......Welcome</p>


</body>
</html>

