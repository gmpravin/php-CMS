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
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	<?php include_once('nav.php'); ?>
	<div class="content">
<div class="container">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Content</div>
			<table class="table table-striped"> 
				<thead> 
					<tr> 
						<th>#</th> 
						<th>Title</th> 
						<th>Image</th> 
						<th>author</th>
                        <th>post</th> 
						<th>created</th> 
						<th>Status</th> 
						<th>Operations</th> 
					</tr> 
				</thead> 
				<tbody> 
                <?php 
                include_once('connect.php');
                     $ReadSql = "SELECT * FROM `main`";
                     $res = mysqli_query($connection, $ReadSql);
					while ( $r = mysqli_fetch_assoc($res)) {
				?>
					<tr> 
						<th scope="row"><?php echo $r['id']; ?></th> 
						<td><?php echo $r['title']; ?></td>
                        <td><img src="upload/<?php echo $r['image']; ?>" width="170px"; height="50px"></td>
						<td><?php echo $r['author']; ?></td> 
						<td><?php if(strlen($r['post'])>220){$r['post']=substr($r['post'],0,150).'...';}echo $r['post']; ?></td>
						
						<td><?php echo $r['dt']; ?></td> 
						<td><?php echo $r['status']; ?></td> 
						<td><a href="Update.php?id=<?php echo $r['id']; ?>">Edit</a> <a href="delpost.php?id=<?php echo $r['id']; ?>">Delete</a></td> 
					</tr> 
				<?php } ?>
				</tbody> 
			</table>
		</div>
	</div>
</div>
<?php include('foo.php'); ?>
</body>
</html>