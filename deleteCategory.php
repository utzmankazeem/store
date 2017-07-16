<?php
     include 'includes/db.php';
   include 'includes/functions.php';
   include 'includes/footer.php';
   include 'includes/header.php';
 

 $page_title = "Delete";

   ?>
   <?php

   #getting id of data from url
   $id =$_GET['id'];


   #deleting the row from table
  deleteCategory($conn,$_GET);



   ?>





















</div>

		<div class="paginated">
			
		</div>
	</div>

	<section class="foot">
		<div>
			<p>&copy; 2016;
		</div>
	</section>
</body>
</html>