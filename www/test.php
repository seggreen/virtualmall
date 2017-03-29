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

#ALLOW EXTENSION.....
$text = ["image/jpg", "image/jpeg", "image/png"];

if(array_key_exists('save', $_POST)) {
	$errors =[];
    //print_r($_FILES); exit();
	#BE SURE A FILE WAS SELECTED.....
	if(empty($_FILES['pic']['name'])) {
		$errors[] = "please choose a file";
    }
    
	#CHCK FILE SIZE.....
	if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
		$errors[] = "file size exceeds maximum. maximum: ". MAX_FILE_SIZE;
	}

	#CHECK EXTENSION....
    if(!in_array($_FILES['pic']['type'], $text)) {
    	$errors[] = "invalid file type";
    }

    #GENERATE RANDOM NUMBERVTO APPEND.....
    $rnd = rand(0000000000, 9999999999);

    #STRIP FILENAME FOR SPACES
    $strip_name = str_replace(" ", "_", $_FILES['pic']['name']);

    $filename = $rnd.$strip_name;
    $destination = 'uploads/'.$filename;

    if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination)) {
    	$errors[] = "file upload failed";
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
   
