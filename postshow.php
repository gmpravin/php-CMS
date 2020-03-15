<?php
session_start();
include_once('config.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include_once('connect.php');?>
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
       
      
       


          $id=$_GET['id'];
 
     
      
        
      
     
 


       
  
      
    
  
  ?>
  
 
  
 
  

  
   
    <?php include_once('nav.php'); ?>
  <div class="content">
   <div class="container">
  <div class="row">
	 <div class="col-md-8">
		<div class="panel panel-default">
		  <div class="panel-body">
		  <div class="form-group-1">
              <h1>Old post</h1>
              <div class="form-group-1">
			    <label><?php echo $r['post']; ?></label>
                <a href="Update.php?id=<?php echo $r['id']; ?>" class="btn btn-info" >Back</a>
			  </div>
			  </div>
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