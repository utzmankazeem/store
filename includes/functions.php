<?php
	
	function doesEmailExists($dbconn, $input)
	{
		$result = false;

		$stmt = $dbconn->prepare("SELECT * FROM admin WHERE email = :em");

		$stmt->bindParam(":em", $input);

		$stmt->execute();
		$count = $stmt->rowCount();
		if($count>0)
		{
			$result = true;
		}
		return $result;
	}



	function registerAdmin($dbconn, $input)
	{
		

			$hash = password_hash($input['password'], PASSWORD_BCRYPT);
			//do registration

			$stmt = $dbconn->prepare("INSERT INTO admin(firstname,lastname,email,hash) VALUES(:fn, :ln, :e,:h)");

			$data = [
					':fn' =>$input['fname'],
					':ln' =>$input['lname'],
					":e" => $input['email'],
					":h"=> $hash
					
					];

			$stmt->execute($data);

	}

	function displayErrors($errors, $field)
	{
		$result= "";
		if (isset($errors[$field]))
		{
			$result = '<span class="err">'.$errors[$field].'</span>';
		}
		return $result;
	}


	function doAdminLogin($dbconn, $input){
		$result = [];

		$stmt = $dbconn->prepare("SELECT admin_id,hash FROM admin WHERE email=:e");
		$stmt->bindParam(":e",$input['email']);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_BOTH);
		#print_r($row);exit();

		if($stmt->rowCount() != 1 || !password_verify($input['pword'], $row['hash'])){

		header('login.php');exit();
		} else {
			$result[] = true;
			$result[] = $row['admin_id'];
		}
		return $result;
	}

	function addCategories($dbconn,$input){

    #insert data

    $cat = $dbconn->prepare("INSERT INTO category(category_name) VALUES (:cn)");
    $cats = [ ":cn" => $input['cname'], ];
    $cat->execute($cats);

    $success = "Category Successfully Added";
    header("Location:category.php?success=$success");
      
     }

     function viewCategories($dbconn){


   

            $stmt = $dbconn->prepare("SELECT * FROM category"); 

            $stmt->execute();

            while ($record = $stmt->fetch()) {

            echo "<tr>";
            echo "<td>".$record['category_id']."</td>";
            echo "<td>".$record['category_name']."</td>";
            echo "<td><a href=\"editCategory.php?id=" .$record['category_id']. "&name=" .$record['category_name']. "\">edit</a></td>";
            echo "<td><a href=\"deleteCategory.php?id=" .$record['category_id']."\">delete</a></td>";
            echo "</tr>";
            
              # code...
            }

}



function editCategory($dbconn,$post,$get){


  $stmt =$dbconn->prepare("UPDATE category SET category_name=:name WHERE category_id=:id");

        $stmt->bindparam(":name",$post['category']);

        $stmt->bindparam(":id",$get['id']);

        $stmt->execute();

        header("Location:category.php");
	   
     }




function deleteCategory($dbconn,$get){

        
         $stmt=$dbconn->prepare("DELETE FROM category WHERE category_id=:id");
         
         $stmt->bindparam(":id", $get['id']);

         $stmt->execute();

         echo "Category Successfully Deleted";

        header('category.php');

       }



function getCategory($dbconn){

       $stmt =$dbconn->prepare("SELECT * FROM category");
       $stmt->execute();
       $result = "";

       while ($record = $stmt->fetch()){
            $cat_id = $record['category_id'];
            $cat_name = $record['category_name'];

            $result .= "<option value='$cat_id'>$cat_name</option>";

       }
       return $result;
}

function doEditSelectCategory($dbconn, $catName){
       $stmt=$dbconn->prepare("SELECT * FROM category");
       $stmt->execute();
       $result = "";

       while ($record = $stmt->fetch()){
            $cat_id = $record['category_id'];
            $cat_name = $record['category_name'];

            # skip...
            if($cat_name == $catName) { continue; }

            $result .= "<option value='$cat_id'>$cat_name</option>";

       }
       return $result;
}
?>