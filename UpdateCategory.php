<?php
session_start();
include_once('config.php');
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
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <title>Admin Page</title>

</head>
<body>
<?php
include_once('connect.php');
if(isset($_GET['id']) & !empty($_GET['id'])){
 $id = $_GET['id'];
$SelSql = "SELECT * FROM `catagory` WHERE id='$id'";
$res = mysqli_query($connection, $SelSql);
$r = mysqli_fetch_assoc($res);
 
  if(isset($_POST) & !empty($_POST)){
	$name = mysqli_real_escape_string($connection,$_POST['name']);
	$author = mysqli_real_escape_string($connection,$_POST['author']);
	$description = mysqli_real_escape_string($connection,$_POST['description']);
	
	$UpdateSql = "UPDATE `catagory` SET name='$name', author='$author', description='$description' WHERE id='$id'";
	$res = mysqli_query($connection, $UpdateSql);
	if($res){
		header('location: addcats.php');
	}else{
		$fmsg = "Failed to update data.";
	}
}
}


?>
<?php include_once('nav.php'); ?>
 <div class="content">
<div class="row">
					<div class="col-md-9">
					
					<form class="form-horizontal" method="post" action="upcat.php?id=<?php echo $r['id']; ?>">
						<label>Category Name </label>
						<input name="name" class="form-control" placeholder="Category Name" value="<?php echo $r['name']; ?>"  type="text" required="">
						<br>
						<label>Author name </label>
						<input name="author" class="form-control" placeholder="Author Name" value="<?php echo $r['author']; ?>" type="text" required="">
						<br>
						<label>Category Description </label>
						<textarea name="description" class="form-control" value="<?php echo $r['description']; ?>" rows="3"></textarea>
						<br>
						<input type="submit" name=submit  value="Add Category" class="btn btn-primary btn-lg">
					</form>
					</div>
					

				</div>	
                </div>
                </div>
                </div>	
                </div>
                </div>
</div>
<?php include_once('foo.php'); ?>

</body>
</html>