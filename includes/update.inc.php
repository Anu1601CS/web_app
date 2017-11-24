
<!--
 * Created by Anurag (Anu1601CS) 
 *-->



<!DOCTYPE html>
<html>

<head>
<title>Password Update</title>

<style>

button{

  cursor: pointer;
}

body
{
  
  line-height: 1.5;  
  text-align: center;
}

a{
  text-decoration:none;
  font-size: 20px;
  text-align: left; 
     color: black;
}

#forgot{
  color: blue!important;
  font-size: 15px;
}


</style>


</head>

<body>


<?php

echo '<br>';

session_start();


if(isset($_SESSION['u_username']))
{   

echo '<br>

<button ><a style=" text-decoration: none; font-size: 20px; color: black;" href="../upload.php">HOME</a></button>
<br>
<br>';

      

	       $username=$_SESSION['u_username'];
         $email=$_SESSION['u_email'];
         $name=$_SESSION['u_name'];
         
         $facebook=$_SESSION['u_facebook'];
         $twitter=$_SESSION['u_twitter'];
         $linkdin=$_SESSION['u_linkdin'];
         $website=$_SESSION['u_website'];
     
      echo '<span style="color:black;font-size:30px;">UPDATE</span> ';
       echo "<br>";
       echo "<br>";       
 
      echo '<form action="update.inc.php" method="POST">
	        
	        <input type="text" name="username" placeholder="Username" value="'.$username.'" required=""><br> 
          <input type="text" name="name" placeholder="Name" value="'.$name.'" required=""><br>
          <input type="text" name="email" placeholder="Email" value="'.$email.'" required=""><br>
        

          <input type="text" name="facebook" placeholder="Facebook"value="'.$facebook.'"><br> 
          <input type="text" name="twitter" placeholder="Twitter" value="'.$twitter.'"><br>
          <input type="text" name="linkdin" placeholder="Linkdin" value="'.$linkdin.'"><br>
          <input type="text" name="website" placeholder="Website" value="'.$website.'"><br><br>
        	
          <input type="submit" name="submit" value="UPDATE">

           </form>';


        if(isset($_POST['submit']))
           {  
           	    include 'dbh.inc.php';

                $n_username=$_POST['username'];
                $n_name=$_POST['name'];
                $n_email=$_POST['email'];
                $n_facebook=$_POST['facebook'];
                $n_linkdin=$_POST['linkdin'];
                $n_website=$_POST['website'];
                $n_twitter=$_POST['twitter'];


 
             	

             	   $query="UPDATE login SET username='$n_username', name='$n_name', email='$n_email', website='$u_website',linkdin ='$u_linkdin',twitter='$u_twitter',facebook='$u_facebook' WHERE username='$username'"; 

                           mysqli_query($conn,$query);
                            
                            echo "<script>alert('Updated')</script>";
                          //  header("Location: change.inc.php?change=success");

       	   	                
       	   	                 exit();

                            
            }

}
else
{
	echo '
       <img src="../css/image/4041.gif"><br><br>
       <span style="color:black;font-size:50px;">Oops..#Error 404 Page not found</span> 
  ';
}


         
        


?>

</body>
</html>