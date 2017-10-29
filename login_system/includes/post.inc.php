<?php


session_start();


if(isset($_SESSION['u_username']))
{ 


if(isset($_POST['submit']))
{

   include_once 'dbh.inc.php';

    $title=mysqli_real_escape_string($conn ,$_POST['title']);
    $message=mysqli_real_escape_string($conn ,$_POST['message']);
    $tmp_name=@$_FILES['file']['tmp_name'];
    $name=@$_FILES['file']['name'];
    $user=$_SESSION['u_username'];  
     
    $location='../uploads/images/';

    move_uploaded_file($tmp_name, $location.$name);
          	  
    $sql="INSERT INTO uploaded_image(image,texts,username,title) VALUES ('$name','$title','$user','$title');"; 

             mysqli_query($conn,$sql);
                     
                       
                       $success='Your Article has been Posted.';
                       $_SESSION['success']=$success;

                      header("Location: ../post.php?Your Article has been Posted.");
                       exit();


}

}
else
{
  $error='You must logged in.';
                       $_SESSION['error']=$error;

                      header("Location: ../post.php?You must be logged in.");
}

    



?>