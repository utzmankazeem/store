<?php
	session_start();
	include 'includes/db.php';
	include'includes/header.php';
	include 'includes/footer.php';
	include 'includes/functions.php';

	$errors = [];

	$page_title = "Login";

	if (array_key_exists('login', $_POST))
	{
		
		if(empty($_POST['email']))
		{
			$errors['email'] = "please enter your email";
		}

		

		if(empty($_POST['pword']))
		{
			$errors['pword'] = "please enter you password";
		}

		if (empty($errors))
		{
			$clean = array_map('trim', $_POST);
			
			$chk = doAdminLogin($conn,$clean);

			if($chk[0]) {
				$_SESSION['id'] = $chk[1]['admin_id'];
				
				#set user session..
            $_SESSION['fname'] = $row['firstname'];
			$_SESSION['id'] = $row['admin_id'];
            header("Location:home.php");
			}
			
		}

	}

?>

<html>	
	<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="login"  action ="login.php" method ="POST">

			<div>
				<?php
				$display = displayErrors($errors, 'email');
				echo $display;
				?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<?php
				$display = displayErrors($errors, 'pword');
				echo $display;
				?>
				<label>password:</label>
				<input type="password" name="pword" placeholder="password">
			</div>
 
			
			<input type="submit" name="login" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>
</html>
	
