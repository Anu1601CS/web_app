<?php


/*
 * Created by Anurag (Anu1601CS) 
 */

session_start();

if(isset($_SESSION['u_username']))
{ 


if( isset($_POST['id']) && isset($_POST['text']) && !empty($_POST['text']))
{  
    
    include_once 'dbh.inc.php';

    $texts=mysqli_real_escape_string($conn ,$_POST['text']);
    $id=mysqli_real_escape_string($conn ,$_POST['id']);
    
    $username=$_SESSION['u_username']; 
    $time= date("Y-m-d");
     

    $sql="INSERT INTO commits(username,post,texts,tim) VALUES ('$username','$id','$texts','$time')"; 

             mysqli_query($conn,$sql);
                     
                      header("Location: ../read.php?post=$id&&id=$username");
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
   
   $error="You Must Logged In To Post Comments.";
   $_SESSION['error']=$error; 
  header("Location: ../login?You must be logged in.");
  exit();
}

    



?>