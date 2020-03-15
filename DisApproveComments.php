<?php
session_start();
include_once('config.php');
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php require_once('Sessions.php'); ?>
<?php require_once('Functions.php'); ?>
<?php
include_once('connect.php');
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
   
$Query="UPDATE comments SET status='OFF' WHERE id='$IdFromURL' ";
$Execute=mysqli_query($connection,$Query);
if($Execute){
	$_SESSION["SuccessMessage"]="Comment Approved Successfully";
	Redirect_to("Comments.php");
	}else{
	$_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
	Redirect_to("Comments.php");
		
    }
}
