<?php 
if (isset($_GET["id"] )&&strlen($_GET ["id"] )>0 ){
	$id = $_GET["id"];
	include "../db.php";
	$db -> query ("delete from blogs where id=$id;");
	header("Location: ../");
}
?>

