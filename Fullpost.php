<?php require_once('connect.php'); ?>
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
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet"> 

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/js/mdb.min.js"></script>

    
</head>
<style>
.dw-card-shadow, .dw-forum-post {
    border: 1px solid rgba(0, 0, 0, 0.2)!important;
    border-radius: 3px!important;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0.3)!important;
    webkit-box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0.3)!important;
}
</style>
<body>
<body>

    <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

<!-- Navbar brand -->

  <a class="navbar-brand" href="#">
    <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" height="30" alt="mdb logo">
  </a>

 
<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">Dropdown</a>
      <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>

  </ul>
  <!-- Links -->

  
  
  <form action="search.php" class="form-inline">
    <div class="md-form my-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="Search">
    </div>
    <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" name="SearchButton">Search</button>
  </form>

    
<!-- Collapsible content -->

</nav>
<?php
  $PostIDFromURL=$_GET["id"];
 
  $ViewQuery="SELECT * FROM main WHERE id='$PostIDFromURL' ORDER BY id asc ";
		$Execute=mysqli_query($connection,$ViewQuery);
		while($DataRows=mysqli_fetch_array($Execute)){
			$PostId=$DataRows["id"];
			$DateTime=$DataRows["dt"];
			$Title=$DataRows["title"];
			$Category=$DataRows["catagory"];
			$Admin=$DataRows["author"];
			$Image=$DataRows["image"];
			$Post=$DataRows["post"];
		
        ?>

  <div class="container">
    <div class="row">
    <div class="col-sm-8">
     <div class="card card-contrast dw-forum-post">
        <div class="blogpost thumbnail">
		<img class="img-responsive img-rounded"src="Upload/<?php echo $Image;  ?>" >
		<div class="caption">
        <h1 class="mt-4"> <?php echo htmlentities($Title); ?></h1>
		<p class="description">Category:<?php echo htmlentities($Category); ?> Published on
		<?php echo htmlentities($DateTime);?></p>
        <p class="post"><?php echo nl2br($Post); ?></p>
		</div>
        </div>
       </div>
       <?php } ?>
       </div>
       
      
       <div class="col-md-4 ">
       <div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title">Categories</h2>
	</div>
	<div class="panel-body">
<?php

$ViewQuery="SELECT * FROM catagory ORDER BY id desc";
$Execute=mysqli_query($connection,$ViewQuery);
while($DataRows=mysqli_fetch_array($Execute)){
	$Id=$DataRows['id'];
	$Category=$DataRows['name'];
?>
<a href="cvview.php?Category=<?php echo $Category; ?>">
<span id="heading"><?php echo $Category."<br>"; ?></span>
</a>
<?php } ?>
		
    </div>
       </div>
       </div>
</div>

       </div>
       <hr>
       <?php

$PostIdForComments=$_GET['id'];
$ExtractingCommentsQuery="SELECT * FROM comments WHERE main_id ='$PostIdForComments' AND status='ON' ";
$Execute=mysqli_query($connection,$ExtractingCommentsQuery);
while($DataRows=mysqli_fetch_array($Execute)){
	$CommentDate=$DataRows['dt'];
	$CommenterName=$DataRows['name'];
	$Comments=$DataRows['comment'];


?>
<div class="container">
<div class="col-md-4">
<div class="CommentBlock">
	<img style="margin-left: 10px; margin-top: 10px;" class="pull-left" src="upload/comment.png" width=70px; height=70px;>
	<p style="margin-left: 90px;" class="Comment-info"><?php echo $CommenterName; ?></p>
	<p style="margin-left: 90px;"class="description"><?php echo $CommentDate; ?></p>
	<p style="margin-left: 90px;" class="Comment"><?php echo nl2br($Comments); ?></p>
	
</div>
</div>
</div>
	<hr>
<?php } ?>

   <?php  
   include_once('connect.php');
    if(isset($_POST['submit']) & !empty($_POST['submit'])){
      if(isset($_POST['name'])){
        $Name = mysqli_real_escape_string($connection,$_POST['name']);
        
    }
    if(isset($_POST['email'])){
      $Email = mysqli_real_escape_string($connection,$_POST['email']);
      
  }
  if(isset($_POST['comment'])){
    $Comment = mysqli_real_escape_string($connection,$_POST['comment']);
    
} 



        $dt = date("Y-m-d H:i:s");
        $PostId = $_GET['id'];


	
	      $PostIDFromURL = $_GET['id'];
        $Query = "INSERT into comments (dt,name,email,comment,approve,status,main_id) VALUES ('$dt','$Name','$Email','$Comment','Pending','OFF','$PostIDFromURL')";
	$Execute = mysqli_query($connection,$Query);
	if($Execute){
	$smsg="Comment Submitted Successfully";

	}else{
	$fmsg="Something Went Wrong. Try Again !";

		
	}
	
}	
	


?>


        <div class="container">
        <div class="panel-body">
		  	
				<div class="row">
					<div class="col-md-4">
          
					
					<form class="form-horizontal" action="FullPost.php?id=<?php echo $PostId; ?>" method="post">
					
					<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
						<label>Name </label>
						<input name="name" class="form-control" placeholder="Name" value="" type="text" required="">
						<br>
						<label>mail id </label>
						<input name="email" class="form-control" placeholder="mail id" value="" type="text" required="">
						<br>
						<label>Comments</label>
						<textarea name="comment" class="form-control" rows="3"></textarea>
						<br>
						<input type="submit" name="submit"  value="Submit" class="btn btn-primary btn-lg">
					</form>
					</div>
          </div>
          </div>
          </div>

          <hr>


 <?php require_once('footer.php'); ?>        


       
       


       
    
    
    
   

</body>
</html>