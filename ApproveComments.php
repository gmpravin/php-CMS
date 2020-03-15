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
include_once('connect.php');
if(isset($_GET["id"])){
    $IdFromURL=$_GET["id"];
$Query="UPDATE comments SET status='ON'  WHERE id='$IdFromURL' ";
$Execute=mysqli_query($connection,$Query);

    
    
    
    
}

?>