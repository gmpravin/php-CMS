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
    <title>Admin Page</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>


    
</head>
<body>
<body>

    <nav class="navbar navbar-default">
        <div class="container">
        <a class="navbar-brand" href="#">
    <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
    CMS
  </a>
  
             
             <ul class="nav justify-content-end">
              <li class="nav-item">
               <a class="nav-link" href="logout.php">Logout</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="reset-password.php">Reset password</a>
             </li>
           </ul>
           <form action="newedit.php" class="navbar-form navbar-right">
		<div class="form-group">
		<input type="text" class="form-control" placeholder="Search" name="Search" >
		</div>
	         <button class="btn btn-default" name="SearchButton">Go</button>
			
		</form>
        </div>
        

    </nav>
  </div>


<?php
if(isset($_GET["SearchButton"])){
    $Search=$_GET["Search"];
}
include_once("page.php");
$ViewQuery="SELECT * FROM main
WHERE dt LIKE '%$Search%' OR title LIKE '%$Search%'
OR catagory LIKE '%$Search%' OR post LIKE '%$Search%' ORDER BY id desc LIMIT  $offset, $no_of_records_per_page";

include_once('connect.php');
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
  <div class="col-md-8">
   <div class="panel panel-default">
     <div class="panel-body">
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
     </div>
     </div>
     </div>
     <?php } ?>
     <hr>
}



  
       
       <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</body>
</html>