<?php 
if (isset($_GET["id"] )&&strlen($_GET ["id"] )>0 ){
	$id = $_GET["id"];
	include "../db.php";
	$db -> query ("DELETE from projects where id=$id;");
	header("Location: ../");
}
?>

