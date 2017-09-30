<?php

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
   if($extension=='c'||$extension=='txt'|| $type=='c/txt')
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
      echo "<script>alert('Plese choose a correct file type.')</script>";
     	//echo 'Plese choose a correct file type.';
     }  	 
   } 
   else
   {
   echo "<script>alert('Plese choose a file.')</script>";
  // 	echo 'Please choose a file.';
   }
 

}
?>



<!DOCTYPE html>
<html>

<head>
<title>Upload</title>
<style >
  
  #form1{
position: absolute;
top: 30px;
right: 40px;
  

  }
  body{
    line-height: 1;
  }
  a{
    text-decoration: none;
    color:black;
  }

</style>


</head>



<?php


echo '<br>';

if(isset($_SESSION['u_username']))
     {
      
       echo '<span style="color:black;font-size:50px;">Home</span> ';

      $name = $_SESSION['u_username'];
echo '<br>';
echo '<br>';
    echo '<span style="color:black;font-size:30px;">Welcome</span> '.$name;


     echo '<br>';echo '<br>';

  echo '<button><a href="includes/change.inc.php"</a>Change Password</button>
        <form id="form1" action="includes/logout.inc.php" method="POST">
           <button type="submit" name="submit">Logout</button>
  
     </form> 



   <form action="upload.php" method="POST" enctype="multipart/form-data">

 <br> <input type="file" name="file">
<input type="submit" name="submit" value="Upload">


</form>';

     
    }
    else
{
  echo '<span style="color:black;font-size:50px;">Oops..#Error 404 Page not found</span> ';
}


   ?>





