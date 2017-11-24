<?php


session_start();


if(isset($_SESSION['u_username']))
{ 


if(isset($_POST['submit']))
<<<<<<< HEAD
{  
    $name=0;
    $name2=0;
    $title=0;
    $message=0;
 
=======
{

>>>>>>> 22416d4ebfc34c299108176b39cf4293014c194c
   include_once 'dbh.inc.php';

    $title=mysqli_real_escape_string($conn ,$_POST['title']);
    $message=mysqli_real_escape_string($conn ,$_POST['message']);
<<<<<<< HEAD
     $location='../uploads/images/';
    $section=rand(100,1000000);
    $user=$_SESSION['u_username']; 
    $time= date("Y-m-d");
     

    
    $tmp_name=@$_FILES['image']['tmp_name'];
    $name=rand();
    move_uploaded_file($tmp_name, $location.$name);
    
   
    $sql="INSERT INTO uploaded_image(image,texts,username,title,tim,section) VALUES ('$name','$message','$user','$title','$time','$section')"; 
=======
    $tmp_name=@$_FILES['file']['tmp_name'];
   // $name=@$_FILES['file']['name'];
    $user=$_SESSION['u_username']; 
    $name=rand(); 
    $time= date("Y-m-d");
    $location='../uploads/images/';

    move_uploaded_file($tmp_name, $location.$name);
          	  
    $sql="INSERT INTO uploaded_image(image,texts,username,title,tim) VALUES ('$name','$message','$user','$title','$time');"; 
>>>>>>> 22416d4ebfc34c299108176b39cf4293014c194c

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