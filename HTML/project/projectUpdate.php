<?php 
	if (isset($_GET["id"] )&&strlen($_GET ["id"] )>0 ){
		include "../db.php";
		$id = $_GET["id"];
		$query = $db->query("SELECT * FROM projects where id = $id");
		if($query->num_rows>0) {
			$row = $query->fetch_object();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form>
		
		<p>Title</p>
		<input type="text" name="title"
		value="<?php echo $row->title; ?> ">
		<p>Description</p>
		<input type="text" name="description">
		<button type="submit">save</button>
		

	</form>

</body>
</html>
<?php 

		}
	}
?>