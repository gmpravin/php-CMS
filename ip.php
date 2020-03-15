<?php
session_start();
include_once('config.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
 <?php
$con=mysqli_connect("localhost","root","","new");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM pageview ORDER BY 'userip'";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $ip=mysqli_num_rows($result);
  
  // Free result set
  
  }


?>
<?phpinclude_once('connect.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" media="screen" href="cs.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <title>Admin Page</title>
	
</head>

<body>
<?php include_once('nav.php'); ?>

<div class="content">
<div class="container">
	<div class="col-md-8">
		<div class="panel panel-default">
		  <div class="panel-body">
	<div class="row">
	<h2>Catagory</h2>
		<table class="table "> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>page</th> 
				<th>user ip</th> 
				
				
		</thead> 
        <?php
        
        ?>
        <tbody> 		<?php 
       include_once('connect.php');
        $ReadSql = "SELECT * FROM `pageview`";
        $res = mysqli_query($connection, $ReadSql);
		while($r = mysqli_fetch_assoc($res)){
		?>
			<tr> 
				<th scope="row"><?php echo $r['id']; ?></th> 
				
				<td><?php echo $r['page']; ?></td> 
				<td><?php echo $r['userip']; ?></td> 
				
				
				
			</tr> 
		<?php } ?>
			

        
		</tbody> 
		</table>
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
