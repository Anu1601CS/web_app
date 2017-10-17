<?php

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);



if(isset($_SESSION['u_username']))
{

$name=@$_FILES['file']['name'];
$size=@$_FILES['file']['size'];
$type=@$_FILES['file']['type'];
$tmp_name=@$_FILES['file']['tmp_name'];
$user=$_SESSION['u_username'];
$user_logo='image';

$extension=strtolower(substr($name, strpos($name,'.')+1));

if(isset($name))
{
   if(!empty($name))
   {       
   if( $extension=='jpg' || $extension=='png' ||  $type=='jpg/png')
      {  
           
           $user=$_SESSION['u_username'];
           $location='uploads/'.$user.'/';

           //$location='new2/';

           if(move_uploaded_file($tmp_name, $location.$user_logo))
           {     
                  echo "<script>alert('File has been uploaded.')</script>";
                 // echo "File has been uploaded.";
           }
           else
           {
            echo "<script>alert('Error on Uploading.')</script>";
            //echo 'Error on uploading';
          }
           
        }

     else
     {
      echo "<script>alert('Please choose a correct file type.')</script>";
      //echo 'Plese choose a correct file type.';
     }     
   } 
   else
   {
   echo "<script>alert('Please choose a file.')</script>";
  //  echo 'Please choose a file.';
   }
 

}
}

?>
