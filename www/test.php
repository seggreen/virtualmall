<?php 
/*#db connection file

#define db constants
define('DBNAME', 'virtualmall');
//define('DBUSER', 'root');
//('DBPASS', 'zobo');

//try{
	#prepare pdo instance
//$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

#set verbose error modes
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

//}catch(PDOException $e) {
	//echo $e->getMessage();
}*/
#DEFINE MAX FILE SIZE....
define("MAX_FILE_SIZE", "2097152");

if(array_key_exists('save', $_POST)) {
	$errors =[];

	#BE SURE A FILE WAS UPLOADED.....
	if(empty($_FILES['pic']['name'])) {
		$errors[] = "please choose a file";
    }
		#CHCK FILE SIZE.....
		if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
			$errors[] = "file size exceeds maximum. maximum: ". MAX_FILE_SIZE;
		}

		if(empty($errors)) {
			echo "done";
		} else {
			foreach ($errors as $err) {
				# code...
				echo $err. '</br>';
		}
	}
}

?>

<form id="register" method="POST" enctype="multipart/form-data">
   <p>please upload a file</p>
   <input type="file" name="pic">

   <input type="submit" name="save">
</form>
   
