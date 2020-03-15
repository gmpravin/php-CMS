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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once('ahead.php'); ?>        

</head>
<body>
<div class="content">

<?php
include_once('connect.php');
$Query="SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
$Execute=mysqli_query($connection,$Query);
$SrNo=0;
while($DataRows=mysqli_fetch_array($Execute)){
	$CommentId=$DataRows['id'];
	$DateTimeofComment=$DataRows['dt'];
	$PersonName=$DataRows['name'];
	$PersonComment=$DataRows['comment'];
	$CommentedPostId=$DataRows['main_id'];
	$SrNo++;

if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'..';}
	


?>

<div class="container">
	

		<table class="table table-striped table-hover">
<tr>
	<td><?php echo htmlentities($SrNo); ?></td>
	<td style="color: #5e5eff;"><?php echo htmlentities($PersonName); ?></td>
	<td><?php echo htmlentities($DateTimeofComment); ?></td>
	<td><?php echo htmlentities($PersonComment); ?></td>
	<td><a href="ApproveComments.php?id=<?php echo $CommentId; ?>">
	<span class="btn btn-success">Approve</span></a></td>
	<td><a href="DeleteComments.php?id=<?php echo $CommentId;?>">
	<span class="btn btn-danger">Delete</span></a></td>
	<td><a href="FullPost.php?id=<?php echo $CommentedPostId; ?>" target="_blank">
	<span class="btn btn-primary">Live Preview</span></a></td>
</tr>
<?php } ?>			
			
			
		</table>
	</div>
	<?php require_once('nav.php'); ?>
	<div class="content">
	<div class="col-md-12">
		<h1>Approved Comments</h1>
		
	<div class="table-responsive">
		<table class="table table-striped table-hover">
	<tr>
	<th>No.</th>
	<th>Name</th>
	<th>Date & Time</th>
	<th>Comment</th>
	<th>Revert Approval </th>
	<th>Delete Comment</th>
	<th>Details</th>
	</tr>
<?php
include_once('connect.php');
$Query="SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
$Execute=mysqli_query($connection,$Query);
$SrNo=0;
while($DataRows=mysqli_fetch_array($Execute)){
	$CommentId=$DataRows['id'];
	$DateTimeofComment=$DataRows['dt'];
	$PersonName=$DataRows['name'];
	$PersonComment=$DataRows['comment'];
	$ApprovedBy=$DataRows['approve'];
	$CommentedPostId=$DataRows['main_id'];
	$SrNo++;
if(strlen($PersonName) >10) { $PersonName = substr($PersonName, 0, 10).'..';}
if(strlen($DateTimeofComment)>18){$DateTimeofComment=substr($DateTimeofComment,0,18);}


?>
<tr>
	<td><?php echo htmlentities($SrNo); ?></td>
	<td style="color: #5e5eff;"><?php echo htmlentities($PersonName); ?></td>
	<td><?php echo htmlentities($DateTimeofComment); ?></td>
	<td><?php echo htmlentities($PersonComment); ?></td>
	<td><a href="DisApproveComments.php?id=<?php echo $CommentId;?>">
	<span class="btn btn-warning">Dis-Approve</span></a></td>
	<td><a href="DeleteComments.php?id=<?php echo $CommentId;?>">
	<span class="btn btn-danger">Delete</span></a></td>
	
</tr>
<?php } ?>			
			
			
		</table>
	</div>
	    
	    
	    
	</div> <!-- Ending of Main Area-->
	
</div> <!-- Ending of Row-->
	
</div> 
</div><!-- Ending of Container-->
</div>
</div>
</div>
</div>
<?php require_once('foo.php'); ?>
</body>
</html>