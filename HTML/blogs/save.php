<?php
$title = $_POST["title"];
$description = $_POST["description"];
include "../db.php";
$img_path = NULL;
if (isset($_FILES["image"])&&isset($_FILES["image"]["name"])) {
	$temp = explode(".", $_FILES["image"]["name"]);
	$file_name = time().".".end($temp);
	move_uploaded_file($_FILES["image"]["tmp_name"], "images/$file_name");
	$img_path = "blogs/images/$file_name";
}

        session_start();
        
$user_id= $_SESSION["user_id"] ;

$db -> query ("insert into blogs (title,description,img, user_id) values ('$title', '$description','$img_path', $user_id)");
header("Location: ../");

?>