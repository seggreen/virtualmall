<?php
 #title...
$page_title = "Register";

 #include DB CONN.....
 include 'includes/db.php';

 #include HEARDER...
 include 'includes/header.php';

 #import FUNCTIONS.....
 include 'includes/functions.php';


 if(array_key_exists('register', $_POST)) {
 	#cache errors....
 	$errors = [];

 	#VALIDATE FIRST NAME.....
 	if(empty($_POST['fname'])) {
 		$errors['fname'] = "Kindly enter first name";
 	}
 	
 	#VALIDATE LAST NAME.....
 	if(empty($_POST['lname'])) {
 		$errors['lname'] = "Kindly enter last name";
 	}
 	
 	#VALIDATE EMAIL.....
 	if(empty($_POST['email'])) {
 		$errors['email'] = "Kindly enter email";
 	}

 	if(doesEmailExist($conn, $_POST['email'])) {

 		$errors['email'] = "email already exist,";

 	} else {
 		
 		$errors['email'] = "kindly enter a valid email";
 	} 

 	#VALIDATE PASSWORD.....
 	if(empty($_POST['password'])) {
 		$errors['password'] = "Please enter password";
 	}

 	#VALIDATE SECOND PASSWORD.....
 	if($_POST['password'] != $_POST['pword']) {
 		$errors['pword'] = "password do not match";
 	}	
 		
 	if(empty($errors)) {
 		//do DB stuff.....

 		#ELEMINATE UNWANTED SPACES FROM VALUES IN THE POST ARRAY.....

 		$clean =array_map('trim', $_POST);

 		#DO REGISTER ADMIN FUNCTION.....
 		doAdminRegister($conn, $clean);

 		#REDIRECT TO LOGIN.......
 		header('Location:Login.php');
 	} 
 }

?>


<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
			    <?php if(isset($errors['fname'])) displayErrors('fname', $errors);?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>

			<div>
			    <?php if(isset($errors['lname'])) displayErrors('lname', $errors);?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
			    <?php if(isset($errors['email'])) displayErrors('email', $errors);?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
			    <?php if(isset($errors['password'])) displayErrors('password', $errors);?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
			    <?php if(isset($errors['password'])) displayErrors('password', $errors);?>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

<?php

   #include footer.....
   include 'includes/footer.php';

?>

