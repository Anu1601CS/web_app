
<!--
 * Created by Anurag (Anu1601CS) 
 *-->


<!DOCTYPE html>
<html>

<head>
<title>Upload</title>
<style >
  

  button{

  cursor: pointer;
}
  #form1{
         position: absolute;
         top: 30px;
         right: 40px;
        }

        #form2{

          
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

  width: 300px;
  height: 200px;
  
}

</style>


</head>
<body>


<?php




include 'includes/upload.inc.php';

echo '<br><br><br>';

if(isset($_SESSION['u_username']))
     { 

      echo '<img id ="logo" src="css/image/user77.png"> <br>';
      
       echo '<span style="color:black;font-size:50px;">HOME</span> ';

      $user = $_SESSION['u_username'];
      $name=$_SESSION['u_name'];

echo '<br>';
echo '<br>';
    echo '<span style="color:black;font-size:30px;">Welcome   '.$user.'</span> ';


     echo '<br>';echo '<br>';

  echo '<button><a href="includes/change.inc.php"</a>Change Password</button>
        <button><a href="includes/change_security.inc.php"</a>Change Security Code</button>';
       
       echo '
         
         <div id="form1">
        <form action="includes/logout.inc.php" method="POST">
           <button type="submit" name="submit">Logout</button>
        </form> 
        </div>';
        
      echo '  
      <div id="form2">
              <form action="upload.php" method="POST" enctype="multipart/form-data">
                  <br> <input type="file" name="file">
                  <input type="submit" name="submit" value="Upload"> 
        </form> 

         </div>';

     
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





