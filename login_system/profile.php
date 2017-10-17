
<!--
 * Created by Anurag (Anu1601CS) 
 *-->


<!DOCTYPE html>
<html>

<head>
<title>Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/profile.css" type="text/css">
</head>

<body>


<?php

session_start();

include 'includes/image.inc.php';

echo '<br><br><br>';

if(isset($_SESSION['u_username']))
     {

     

         $username=$_SESSION['u_username'];
         $email=$_SESSION['u_email'];
         $name=$_SESSION['u_name'];
         $facebook=$_SESSION['u_facebook'];
         $twitter=$_SESSION['u_twitter'];
         $linkdin=$_SESSION['u_linkdin'];
         $website=$_SESSION['u_website'];
         $user_logo='image'; 

      echo '<a id="small" class="button-left button" href="upload.php">HOME</a>';
      echo '<a id="small" class="button-right button" href="includes/social.inc.php">ADD SOCIAL LINKS</a>';
      
      echo '  
         <div id="form2">
               <form action="profile.php" method="POST" enctype="multipart/form-data">
                  <br> <input type="file" name="file">
                  <input type="submit" name="submit" value="Upload"> 
         </form> 

         </div>';  
          

     echo '<h2 style="text-align:center">User Profile Card</h2>

         <div class="card">
           
           <img style="width:100%; id ="logo" src="uploads/'.$username.'/'.$user_logo.'"> 
           <h1>'.$name.'</h1>
           <p class="title">'.$email.'</p>
           <p>IIT-P</p>
           <div style="margin: 24px 0;">
           <a href="'.$website.'" target="blank"><i class="fa fa-dribbble"></i></a> 
           <a href="'.$twitter.'"><i class="fa fa-twitter"></i></a>  
           <a href="'.$linkdin.'"><i class="fa fa-linkedin"></i></a>  
           <a href="'.$facebook.'"><i class="fa fa-facebook"></i></a> 
        </div>
        
        <p><button>Contact</button></p>
</div>
';

}
    else
{
  echo '
       <img id="center" src="css/image/4041.gif"><br><br>
       <span id="center" style="color:black;font-size:50px;">Oops..#Error 404 Page not found</span> 
  ';
}


   ?>




</body>

</html>





