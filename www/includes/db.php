<?php 
#db connection file

#define db constants
define('DBNAME', 'virtualmall');
define('DBUSER', 'root');
define('DBPASS', 'zobo');

try{
	#prepare pdo instance
$conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

#set verbose error modes
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

}catch(PDOException $e) {
	echo $e->getMessage();
}
?>
