<?php
 #title...
$page_title = "Register";
 #include...
 include 'includes/header.php';

 if(array_key_exists('register', $_POST)) {
 	#cache errors....
 	$errors = [];

 	#VALIDATE FIRST NAME.....
 	if(empty($_POST['fname'])) {
 		$errors['fname'] = "Please enter first name";
 	}
 	
 	#VALIDATE LAST NAME.....
 	if(empty($_POST['lname'])) {
 		$errors['lname'] = "Please enter last name";
 	}
 	
 	#VALIDATE EMAIL.....
 	if(empty($_POST['email'])) {
 		$errors['email'] = "Please enter email";
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
 	} 
 }

?>


<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
			    <?php if(isset($errors['fname'])) { echo '<span class="err">'. $errors['fname']. '</span>';} ?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
			    <?php if(isset($errors['lname'])) { echo '<span class="err">'. $errors['lname']. '</span>';} ?>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
			    <?php if(isset($errors['email'])) { echo '<span class="err">'. $errors['email']. '</span>';} ?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
			    <?php if(isset($errors['password'])) { echo '<span class="err">'. $errors['password']. '</span>';} ?>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
			    <?php if(isset($errors['pword'])) { echo '<span class="err">'. $errors['pword']. '</span>';} ?>
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

