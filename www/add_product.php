<?php

session_start();

#TITLE.....
$title = "add Products";

#INCLUDE DB......
include 'includes/db.php';

#INCLUDE FUNCTIONS.....
include 'includes/functions.php';

#INCLUDE DASHBOARD HEADER.....
include 'includes/dashboard_header.php';

#ERRORS....
$errors = [];

#DEFINE MAX FILE SIZE.....
define("MAX_FILE_SIZE", "2097152");

#ALLOWED DOWNLOADED EXTENSION......
$text = ["image/jpeg", "image/jpg", "image/png"];

#VALIDATION.......
if(array_key_exists("addProduct", $_POST)) {

	#VALIDATE PRODUCT NAME FIELD......
	if(empty($_POST['pname'])) {
		$errors['pname'] = "Kindly enter product name";
	}

	#VALIDATE PRODUCT AUTHOR.....
	if(empty($_POST['pauth'])) {
		$errors['pauth'] = "Kindly enter product author";
	}

	#VALIDATE PRODUCT CATEGORY......
	if(empty($_POST['cat'])) {
		$errors['cat'] = "Kindly enter product category";
	}

	#VALIDATE PRODUCT DESCRIPTION......
	if(empty($_POST['desc'])) {
		$errors['desc'] = "Kinldy enter product description";
	}

	#VALIDATE RODUCT PRICE.....
	if(empty($_POST['price'])) {
		$errors['price'] = "Kindly enter product price";
	}

	#CHECK IF A PIC FILE WAS UPLOADED........
	if(empty($_FILES['pic']['name'])) {
		$errors['pic'] = "Kindly choose image";
	}

	#CHECK FOR FILE SIZE.......
	if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
		$errors['pic'] = "exceed maximum file size" . MAX_FILE_SIZE;
	}

	if(empty($errors)){
		#DO UPLOAD FILE......
		$oya = doFileUpload($_FILES, 'uploads/');

		if($oya[0]) {
           
           $filter = array_map('trim', $_POST);
           $filter ['image_place'] = $oya[1];

           insertbook($conn, $filter);

		}


	}


} 



?>

      <div class="wrapper">
		<div id="stream">
			<h1 id="register-label">Add Product</h1>
			<hr>

			<form id="register" method="POST" enctype="multipart/form-data">
			<div>
			    <?php if(isset($errors['pname']))displayErrors('pname', $errors);  ?>
				<label>Name</label>
				<input type="text" name="pname" placeholder="product name" />
			</div>
			<div>
			    <?php if(isset($errors['pauth'])) displayErrors('pauth', $errors); ?>
				<label>Author</label>
				<input type="text" name="pauth" placeholder="product author" />
			</div>
			<div>
			    <?phpif(isset($errors['cat'])) displayErrors('cat', $errors); ?>
				<label>select category</label>
				<select name="cat">
					<?php echo retrieveCategory($conn); ?>
				</select>

			</div>
			<div>
			    <?php if(isset($errors['desc'])) displayErrors('desc', $errors);?>
				<label>Description:</label>
				<textarea placeholder="content" name="desc" class="post-box"></textarea>
			</div>
			<div>
			    <?php if(isset($errors['price'])) displayErrors('price', $errors); ?>
				<label>Price</label>
				<input type="text" name="price" placeholder="price" />
			</div>

			<div>
			    <?php   if(isset($errors['']))displayErrors('', $errors); ?>
				<label>image</label>
				<input type="file" name="pic" />
			</div>

			<input type="submit" name="addProduct" value="add product" />

			</form>
		</div>
	</div>



#IMPORT FOOTER.....

<?php include 'includes/footer.php'; ?>
