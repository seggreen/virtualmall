<?php
 #title...
$page_title = "Register";
 #include...
 include 'includes/header.php';

 if(array_key_exists('register', $_POST)) {
 	#cache errors....
 	$errors = [];

 	#VALIDATION.....
 	if(empty($_POST['fname'])) {
 		$errors[] = "Please enter first name";
 	}

 	if(empty($errors)) {
 		//do DB stuff.....
 	} else {
 		foreach ($errors as $err) {
 			# code...
 			echo $err;
 		}
 	}
 }

?>

<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
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
