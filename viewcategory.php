<?php
session_start();
$_SESSION['active'] = true;


   include 'includes/db.php';
   include 'includes/functions.php';
   include 'includes/footer.php';
   include 'includes/header.php';
 

   ?>




<?php


    #title

   $page_title = "view category";

  	
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

	<div class="wrapper">
		<div id="stream">

			<table id="tab">

					<p>Edit Category</p>

				<thead>
					<tr>
						<th>category id</th>
						<th>category name</th>
						<th>date created</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					<?php

					viewCategories($conn);


					?>

          		</tbody>
			</table>
		</div>

		<div class="paginated">
			<span><a href="category.php">1</a></span>
			
			<span><a href="#">2</a></span>
			
		</div>
	</div>
</body>
</html>
