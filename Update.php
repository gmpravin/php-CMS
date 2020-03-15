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
    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
    <title>Admin Page</title>
    

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
</head>


<body>


<?php

       
       if(isset($_GET['id']) & !empty($_GET['id'])){
          $id = $_GET['id'];
        
          include_once('connect.php');
        $sql = "SELECT * FROM `main` WHERE  id = '$id'";
        $res = mysqli_query($connection, $sql);
        $r = mysqli_fetch_assoc($res);
       }
       
      
        if(isset($_POST) & !empty($_POST)){  
          include_once('connect.php');
        $title = mysqli_real_escape_string($connection, $_POST['title']);
        $url = str_replace(' ', '-', $title);
        $catagory = mysqli_real_escape_string($connection, $_POST['catagory']);
          $author = mysqli_real_escape_string($connection, $_POST['author']);
          $post = mysqli_real_escape_string($connection, $_POST['post']);
          $dt = date("Y-m-d H:i:s");
          $status = $_POST['status'];


          $id=$_GET['id'];
 
      move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
      $image=$_FILES["image"]["name"];
          
      
      
        
      
      include_once('connect.php');
  $sql = "UPDATE `main` SET title = '$title', post = '$post', author = '$author', catagory = '$catagory', dt = '$dt', status = '$status', image = '$image' WHERE id='$id'";

  $res = mysqli_query($connection,$sql);
  if($res){
    $smsg = "Content updated Successfully";
    header('location: ViewPost.php');
  
  }else{
    $fmsg = "Failed to update Content";
  }
  
}

       
  
      
    
  
  ?>
  
 
  
 
  

  
   
    <?php include_once('nav.php'); ?>
  <div class="content">
   <div class="container">
  <div class="row">
    

	 <div class="col-md-9">
   
		<div class="panel panel-default">
		  <div class="panel-body">
		  	<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		  	<form method="post" enctype="multipart/form-data" action="uppost.php?id=<?php echo $r['id']; ?>">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Title</label>
			    <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?php echo $r['title']; ?>" placeholder="Title">
			  </div>
              <div class="form-group">
			    <label for="exampleInputEmail1">Author</label>
			    <input type="text" name="author" class="form-control" id="exampleInputEmail1" value="<?php echo $r['author']; ?>" placeholder="Author">
        </div>
        
        
			  <div class="form-group-1">
			    <label for="exampleInputPassword1"></label>Post</label>
          <textarea  type="text" name="post" class="form-control" value="<?php echo $r['post']; ?>" rows="6"></textarea>
          
			  </div>

        <div class="form-group">
			    <label for="exampleInputFile">Image</label>
			    <input type="file" name="image" value="<?php echo $r['image']; ?>" id="exampleInputFile">
			  </div>
			 
			  <div class="form-group">
				  <div class="row">
					  	<div class="col-md-6">
						    <label>Categories</label>
						    <select name="catagory" multiple class="form-control" value="<?php echo $r['catagory']; ?>">
                            <?php 
                                $connection = mysqli_connect('localhost', 'root', '', 'new');
								$selsql = "SELECT * FROM catagory";
								$selres = mysqli_query($connection, $selsql);
								while($selr = mysqli_fetch_assoc($selres)){
							?>
							  <option value="<?php echo $selr['id']; ?>"><?php echo $selr['name']; ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="col-md-6">
						<label>Post Status</label>
							<select name="status" multiple class="form-control" value="<?php echo $r['status']; ?>">
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
   <div class="col-md-3">
   <a href="postshow.php?id=<?php echo $r['id']; ?>" class="btn btn-info btn-md">Show old post</a>
   </div>
   </div>
   
   </div>
  </div>
                
                
                </body>
                
</html>