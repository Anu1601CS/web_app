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


include 'includes/upload.inc.php';

echo '<br>';

if(isset($_SESSION['u_username']))
     {
      
       echo '<span style="color:black;font-size:50px;">Home</span> ';

      $user = $_SESSION['u_username'];
      $name=$_SESSION['u_name'];

echo '<br>';
echo '<br>';
    echo '<span style="color:black;font-size:30px;">Welcome   '.$user.'</span> ';


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





