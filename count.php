<?php include('connect.php'); ?>

<?php


$connection = mysqli_connect('localhost', 'root', '', 'new');
$date = date('y-m-d');
$userip = $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM visitors WHERE date = '$date'";
$res =mysqli_query($connection,$query);


    $iquery = "INSERT INTO visitors (date,ip) VALUES ('$date','$userip')";
    $row = mysqli_query($connection,$iquery);

     
    $uq= "update visitors SET ip = '$userip',views= views +1 WHERE date = '$date'";
    $q = mysqli_query($connection,$uq);


?>