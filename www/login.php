<?php
 #title...
 $page_title = "Login";
 #include...
 include 'includes/header.php';

 # FORM VALIDATION......
 if(array_key_exists('login', $_POST)) {
 	#CACHE ERRORS
 	$errors = [];

 	#VALIDATE LOGIN......
 	if(empty($_POST['email'])) {
 		$errors['email'] = "Kindly enter email";
 	}

 	#VALIDATE PASSWORD......
 	if(empty($_POST['password'])) {
 		$errors['password'] = "Kindky enter password";
 	}

 	#VALIDATE ERRORS....
 	if(empty($errors)) {
 		#Do DB STUFF.......//
 	}
 } 

?>
<div class="wrapper">
		<h1 id="login-label">Admin Login</h1>
		<hr>
		<form id = "login" method="POST" action="login.php">
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
			<input type="submit" name="login" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

<?php
	#import footer
	include "includes/footer.php";
    ?>
