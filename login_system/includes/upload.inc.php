<?php

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

session_start();

$name=@$_FILES['file']['name'];
$size=@$_FILES['file']['size'];
$type=@$_FILES['file']['type'];
$tmp_name=@$_FILES['file']['tmp_name'];
$extension=strtolower(substr($name, strpos($name,'.')+1));

if(isset($name))
{
   if(!empty($name))
   {       
   if($extension=='c'||$extension=='txt' || $extension=='cpp'|| $type=='c/txt' || $type=='cpp')
      {  
           
           
           $location='uploads/';

           if(move_uploaded_file($tmp_name, $location.$name))
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
?>
