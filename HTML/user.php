<?php
include "db.php";
session_start();
	$page = 1;
	
	if(isset($_GET['page'])&&strlen($_GET['page']) >0){
		$page = $_GET["page"];
	}
	$link=mysqli_connect("localhost","root","","Zhasa");


	$limit = 3;
	
	$skip = ($page - 1)* $limit;

	$query = $db -> query ("SELECT * FROM projects b LEFT OUTER join users u ON 
							b.user_id = u.user_id ORDER BY b.date DESC LIMIT $skip, $limit");
	$query2 = $db -> query("SELECT COUNT(id) AS number FROM projects");
	$count = $query2 -> fetch_object();
	$pages_number = ceil($count -> number/$limit);
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>User Page</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CPoppins:200,400,500,600,700%7CPlayfair+Display:400,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%; justify-content: space-between;">

	  <?php $user = $_SESSION['user_id'];
		?>
		<h2 class="navbar-brand" style="width: 50%;  text-align: center; "><a href="index.php">Home</a></h2>
		<?php
								$query5 = $db -> query ("SELECT firstname FROM users where user_id= $user ");
								if($query5 -> num_rows>0) {
									while ($row = $query5 -> fetch_object()){
									
							?>

	  <h2 class="navbar-brand" style="width: 50%; text-align: center;">Welcome <?php echo $row -> firstname; ?></h2>
	  <?php 
	  	}}
	  ?>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	</nav>	

	<div class="limiter_admin" style="width: 80%; margin: 0 auto;">
		<h3 style="text-align: center; margin: 20px auto;">Upload your project for fundrasing <span class="badge badge-secondary">New</span></h3>
		<form action="project/projectSave.php" method="post" enctype="multipart/form-data" style="margin: 20px auto">

			<div class="input-group mb-3">
				  <input name="title" type="text" class="form-control" placeholder="Enter the title" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group mb-3">
				  <textarea name="description" placeholder="Enter the description" class="form-control" aria-label="With textarea"></textarea>
			</div>
			<div class="input-group mb-3">
				  <input type="text" name="sum" placeholder="Enter the sum" aria-label="First name" class="form-control">
				  <input type="text" name="time" placeholder="Enter time (in days)" aria-label="Last name" class="form-control">
			</div>
			<div class="input-group mb-3">
				  <div class="custom-file">
				    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
				    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				  </div>
				  <div class="input-group-append">
				    	<button class="btn btn-outline-secondary" type ="submit" id="inputGroupFileAddon04">Save</button>
				  </div>
			</div>
		</form>

		<div class="card-deck">
				<?php
				if($query -> num_rows>0){
					while ($row = $query -> fetch_object()){

				?>
				<div class="card">
				    <img src="<?php echo $row -> img; ?>" class="card-img-top">
				    <div class="card-body">
				      <h5 class="card-title"><?php echo $row -> title; ?></h5>
				      <p class="card-text"><?php echo $row -> description; ?></p>
				      <ul class="list-group list-group-flush">
						    <li class="list-group-item"><?php echo $row -> date; ?></li>
						    <li class="list-group-item"><?php echo $row -> time; ?> days</li>
						    <li class="list-group-item"><?php echo $row -> sum; ?> USD</li>
					  </ul>
				      <p class="card-text"><small class="text-muted"><?php echo $row -> firstname;?> <?php
						
				      echo $row -> lastname; ?></small></p>
				      <a href="project/projectDelete.php?id=<?php echo $row -> id;?>">Delete</a>
					  <a href="project/projectUpdate.php?id=<?php echo $row-> id;?>">Edit</a>
				    </div>
				</div>
				<?php
					}
				}
			?>
				
		</div> 
			<nav aria-label="Page navigation example" style="margin: 20px 0;">
				  <ul class="pagination justify-content-center">
				  	
				    <li class="page-item"><a class="page-link" href="?page=<?php if($page==1) {echo $page;} else{ echo $page-1;} ?>">Previous</a></li>
				    <?php 
						for ($i=1; $i <= $pages_number; $i++) { 
							# code...
						
					?>
				    <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				    <?php
					}
					?>
				    <li class="page-item"><a class="page-link" href="?page=<?php if($page==$pages_number) {echo $page;} else{ echo $page+1;} ?>">Next</a></li>
				    
				  </ul>
			</nav>
	</div>

</body>
</html>