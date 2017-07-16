<?php
	include 'includes/db.php';
	include 'includes/footer.php';
	include 'includes/header.php';
	include 'includes/functions.php';
  

   ?>




<?php

	 $errors =[];

   $page_title = "category";


   if(array_key_exists('add', $_POST)) {
   	
   	
   	
	   	#validate first name 
	   	if(empty($_POST['cname'])){
	   		$errors[] = "*please enter a category name </br>";

	   	}


	   	if(empty($errors)) {
	   		addCategories($conn,$_POST);
	   	} else {
	   		foreach ($errors as $error) {
	   			echo $error;
	   		}
	   	}
   		

  	}



  	
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

				

			<table id="tab">
					<form class="register" method="POST">
						<p>Edit Category</p>

						<input type="text" name="cname" placeholder ="enter category name">


						<input type="submit" name="add" value="Click to add">
					</form>

				
</body>
</html>
