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
	<?php include_once('ahead.php'); ?>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <?php
       if(isset($_POST) & !empty($_POST)){
        include_once('connect.php');
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $url = strtolower(str_replace(' ', '-', $title));
        $post = mysqli_real_escape_string($connection, $_POST['post']);
        $catagory = mysqli_real_escape_string($connection, $_POST['catagory']);
        $author = mysqli_real_escape_string($connection, $_POST['author']);
        $dt = date("Y-m-d H:i:s");
        $status = $_POST['status'];
        
            // Get image name
            $image = $_FILES['image']['name'];
            // Get text
            $image_text = mysqli_real_escape_string($connection, $_POST['image_text']);
      
            // image file directory
            $target = "upload/".basename($image);
      
            $sql = "INSERT INTO images () VALUES ()";
            // execute query
            
      
            
      
      
    
    $sql = "INSERT INTO main (title, post, author, catagory, dt, status, image, image_text) VALUES ('$title', '$post', '$author', '$catagory', '$dt', '$status', '$image', '$image_text')";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    
    if($res){
        $smsg = "Content Created Successfully";
       
    }else{
        $fmsg = "Failed to Add Content";
    }
     
   }

   

		?>
		<?php require_once("nav.php"); ?>
		<div class="content">
<div class="container">
	<div class="col-md-8">
		<div class="panel panel-default">
		  <div class="panel-body">
		  	<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		  	<form method="post" enctype="multipart/form-data" action="addpost.php">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Title</label>
			    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Title">
			  </div>
              <div class="form-group">
			    <label for="exampleInputEmail1">Author</label>
			    <input type="text" name="author" class="form-control" id="exampleInputEmail1" placeholder="Author">
			  </div>
              
			  <div class="form-group">
			    <label for="exampleInputPassword1"></label>Post</label>
			    <textarea name="post" class="form-control" rows="6"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputFile">Image</label>
			    <input type="file" name="image" id="exampleInputFile">
			  </div>
			  <div class="form-group">
				  <div class="row">
					  	<div class="col-md-6">
						    <label>Categories</label>
						    <select name="catagory" multiple class="form-control">
                            <?php 
                                $connection = mysqli_connect('localhost', 'root', '', 'new');
								$selsql = "SELECT * FROM catagory";
								$selres = mysqli_query($connection, $selsql);
								while($selr = mysqli_fetch_assoc($selres)){
							?>
								<option value="<?php echo $selr['name']; ?>"><?php echo $selr['name']; ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="col-md-6">
						<label>Post Status</label>
							<select name="status" multiple class="form-control">
							  <option value="draft">Draft</option>
							  <option value="published">Published</option>
							</select>
						</div>
					  </div>
				  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		  </div>
		</div>
	</div>

</div>
</div>
<?php require_once("foo.php"); ?>
</body>
</html>


