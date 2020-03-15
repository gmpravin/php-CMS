<?php
include_once('config.php');
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="cs.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
	<title>Admin Page</title>
	 <!--     Fonts and icons     -->
	 <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="cs.css" type="text/css" >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

	
</head>
<body>

 
<?php
 	if(isset($_POST['submit']) & !empty($_POST['submit'])){
		include_once('connect.php');
		 $name = mysqli_real_escape_string($connection, $_POST['name']);
		 $author = mysqli_real_escape_string($connection, $_POST['author']);
		$description = mysqli_real_escape_string($connection, $_POST['description']);
		$sql = "INSERT INTO catagory (name, author, description) VALUES ('$name','$author', '$description')";
		$res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
		if($res){
			$smsg = "Category Added Successfully";
		}else{
			$fmsg = "Failed to Add Category";
		}
	}
	
	
    ?>
<?php include_once('nav.php'); ?>
	  <div class="content">
	  <div class="row">
      <div class="container">
   
             
                
		<div class="panel panel-default">
		  <div class="panel-body">
		  	<form method="post">
				<div class="row">
					<div class="col-md-9">
					
					<form class="form-horizontal" method="post" action="AddCategory.php">
					<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
						<label>Category Name </label>
						<input name="name" class="form-control" placeholder="Category Name" value="" type="text" required="">
						<br>
						<label>Author name </label>
						<input name="author" class="form-control" placeholder="Author Name" value="" type="text" required="">
						<br>
						<label>Category Description </label>
						<textarea name="description" class="form-control" rows="3"></textarea>
						<br>
						<input type="submit" name=submit  value="Add Category" class="btn btn-primary btn-lg">
					</form>
					</div>
					

				</div>	
 
				<br>
				
                                            
			</form>
		  </div>
		</div>
    </div>
		
 </div><ul><li><a href="con.php">	logout</a></li></ul>
</div>
</div>
</div>
<?php include_once('foo.php');?>
</body>
</html>