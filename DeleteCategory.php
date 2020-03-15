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
            $id = $_GET['id'];
            $DelSql = "DELETE FROM `catagory` WHERE id=$id";
            $res = mysqli_query($connection, $DelSql);
            if($res){
                header('location: ManageCategory.php');
            }else{
                echo "Failed to delete";
            }
            ?>