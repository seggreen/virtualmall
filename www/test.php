<?php 
#db connection file

#define db constants
define('DBNAME', 'virtualmall');
define('DBUSER', 'root');
define('DBPASS', 'zobo');
$pdo = new PDO('mysql:host=localhost;dbname=virtualmall', "root", "zobo");
?>
