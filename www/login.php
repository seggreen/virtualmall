<?php
 session_start();

 #TITLE...
 $page_title = "Login";

 #INCLUDE DB......
 include 'includes/db.php';

 #INCLUDE HEADER...
 include 'includes/header.php';

 #INCLUDE fUNCTION......
 include 'includes/functions.php';

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
 		$errors['password'] = "Kindly enter password";
 	}

 	#LOG ADMIN IN...... 
 	$chk = authenticateAdmin($conn, $_POST['email'], $_POST['password']);

 	if($chk[0] == false) {

 		$errors['email'] = "Either email or password is incorrect";
 	}

 	#VALIDATE ERRORS....
 	if(empty($errors)) {

 		$data = $alpha[1];

 		$_SESSION['admin_id'] = $data['admin_id'];

 		#REDIRECT....
 		header('Location:add_product.php');

 
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
