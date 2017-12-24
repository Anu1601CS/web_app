<?php


/*
 * Created by Anurag (Anu1601CS) 
 */

session_start();


if(isset($_SESSION['u_username']))
{ 


if(isset($_POST['submit']))
{  
    $name=0;
    $title=0;
    $message=0;
 
   	include_once 'dbh.inc.php';

    $title=mysqli_real_escape_string($conn ,$_POST['title']);
    $message=mysqli_real_escape_string($conn ,$_POST['message']);
    $youtube=mysqli_real_escape_string($conn ,$_POST['youtube']);
    
    $location='../uploads/images/';
    
    $status=rand(100,1000000);
    
    $user=$_SESSION['u_username']; 
    $time= date("Y-m-d");
     

    
    $tmp_name=@$_FILES['image']['tmp_name'];
    $name=@$_FILES['image']['name'];
     
    if(!empty($name))
    {
    $name=rand();
    }
    else
    {
      $name=0;
    }
     
  
   

    move_uploaded_file($tmp_name, $location.$name);
    
   
    $sql="INSERT INTO uploaded_image(image,texts,username,title,tim,status,youtube) VALUES ('$name','$message','$user','$title','$time','$status','$youtube')"; 

             mysqli_query($conn,$sql);
                     
                       
                       $success='Your Article has been Posted.';
                       $_SESSION['success']=$success;

                      header("Location: ../post.php?Your Article has been Posted.");
                       exit();


}

else
        {
           $error='Error sorry';
           $_SESSION['error']=$error;
           header("Location: error.inc.php?error user ".$error);
           exit();
        }

}
else
{
  
  header("Location: error.inc.php?You must be logged in.");
  exit();
}

    



?>