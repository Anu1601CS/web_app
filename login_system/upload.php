
<!--
 * Created by Anurag (Anu1601CS) 
 *-->


<!DOCTYPE html>
<html>

<head>
<title>HOME </title>
<style >
  
 button{
 cursor: pointer;}

  #form1{
         position: absolute;
         top: 30px;
         right: 40px;
        }

  body{
    line-height: 1;
    text-align: center;
  }

 a{
    text-decoration: none;
    color:black;
  }


#copy
{
  color:red; 
}

#logo
{
  width: 200px;
  height: 200px;
  border-radius:100%; 
  box-shadow: 0 0 10px black;
  }

#profile{
	     position: absolute;
         top: 30px;
         left: 40px;
}

</style>


</head>
<body>


<?php




include 'includes/upload.inc.php';

echo '<br><br><br>';

if(isset($_SESSION['u_username']))
     { 

      
       $name=$_SESSION['u_name'];
       $user=$_SESSION['u_username'];
       $user_logo='image';

     echo '<button id ="profile"><a href="profile.php">Profile</a></button>';
     echo '<span style="color:black;font-size:50px;">HOME</span><br><br> ';

       echo '<img id ="logo" src="uploads/'.$user.'/'.$user_logo.'"> <br>';
      
       

         
       echo '<br><br>';
       echo '<span style="color:black;font-size:30px;">Welcome   '.$user.'</span> ';


       echo '<br><br>';

       echo '<button><a href="includes/change.inc.php"</a>Change Password</button>
               <button><a href="includes/change_security.inc.php"</a>Change Security Code</button>';
       
       echo '
         
         <div id="form1">
        <form action="includes/logout.inc.php" method="POST">
           <button type="submit" name="submit">Logout</button>
        </form> 
        </div>';
        
      

  echo '<br><br><button><a href="blog.php">My Post</a></button>';
  echo '<button><a href="post.php">Post Article</a></button>';

     
    }
    else
{
  echo '
       <img src="css/image/4041.gif"><br><br>
       <span style="color:black;font-size:50px;">Oops..#Error 404 Page not found</span> 
  ';
}


   ?>

</body>

</html>







