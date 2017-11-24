<?php


session_start();


if(isset($_SESSION['u_username']))
{ 


if(isset($_POST['submit']))
{

   include_once 'dbh.inc.php';

    $num=mysqli_real_escape_string($conn ,$_POST['num']);
     $num2=mysqli_real_escape_string($conn ,$_POST['num2']);


<<<<<<< HEAD
     if(!empty($num) && !empty($num2) && $num2==$num )
=======
     if(!empty(num) && !empty(num2) &&  num!=num2)
>>>>>>> 22416d4ebfc34c299108176b39cf4293014c194c
 {
    $user=$_SESSION['u_username']; 
         	  
    $sql="DELETE FROM uploaded_image WHERE id='$num' AND username='$user'";

             @mysqli_query($conn,$sql);
                     
                       
                       $success='Your Article has been delete successfully.';
                       $_SESSION['success']=$success;

                      header("Location: ../delete.php?Your Article has been delete.");
                       exit();


}

else
{

  $error='Please confirm.';
                       $_SESSION['error']=$error;

                      header("Location: ../delete.php?Please confirm.");
                       exit();

}

}

}
else
{
  $error='You must logged in.';
                       $_SESSION['error']=$error;

                      header("Location: ../mypost.php?You must be logged in.");
}

    



?>