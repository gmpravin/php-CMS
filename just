<?php
    if(isset($_GET['id']) & !empty($_GET['id'])){
      
      //select query
      $id = $_GET['id'];
      $connection = mysqli_connect('localhost', 'root', '', 'new');
      $sql = "SELECT * FROM `main` WHERE id = '$id'";
      $res = mysqli_query($connection, $sql);
      $r = mysqli_fetch_assoc($res);
    }
    
    if(isset($_POST) & !empty($_POST)){
      
      $connection = mysqli_connect('localhost', 'root', '', 'new');
      $title = mysqli_real_escape_string($connection, $_POST['title']);
      echo $url = str_replace(' ', '-', $title);
      $catagory = mysqli_real_escape_string($connection, $_POST['catagory']);
        $author = mysqli_real_escape_string($connection, $_POST['author']);
        $post = mysqli_real_escape_string($connection, $_POST['post']);
        $dt = date("Y-m-d H:i:s");
        $status = $_POST['status'];
        $image = $_FILES['image']['name'];
          // Get image name
          $image = $_FILES['image']['name'];
          // Get text
         
    
          // image file directory
          $target = "upload/".basename($image);
    
          
    
   
$connection = mysqli_connect('localhost', 'root', '', 'new');   
$sql = mysqli_query($connection, $sql = "UPDATE main SET title = '$title', post = '$post', author = '$author', catagory = '$catagory', dt = '$dt', status = '$status', image = '$image'  WHERE id='id'");
 
     
if(sql){
	$smsg = "Content updated Successfully";

}else{
  $fmsg = "Failed to update Content";
}
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  $msg = "Image uploaded successfully";
}else{
  $msg = "Failed to upload image";
}
    
}
    
    
  
$image = $_FILES['image']['name'];
            // Get image name
            $image = $_FILES['image']['name'];
            // Get text
           
      
            // image file directory
            $target = "upload/".basename($image);
      
      