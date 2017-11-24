
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

      

	$name=$_SESSION['u_username'];
     
      echo '<span style="color:black;font-size:30px;">Change Password</span> ';
       echo "<br>";
       echo "<br>";       
 
      echo '<form action="change.inc.php" method="POST">
	        
	        <input type="password" name="old_password" placeholder="Old Password" required=""><br> 
        	<input type="password" name="new_password" placeholder="New Password" required=""><br>
	       <input type="password" name="com_password" placeholder="Confirm Password" required=""><br><br>
        	<input type="submit" name="submit" value=" Change">

           </form>';


        if(isset($_POST['submit']))
           {  
           	    include 'dbh.inc.php';

                $new_password=$_POST['new_password'];
                $com_password=$_POST['com_password'];
                $old_password=$_POST['old_password'];

             if(!empty($new_password) && !empty($old_password) && !empty($com_password))
             {  
             	   if($new_password==$com_password)
             	   {    
             	   	   $new_password=md5($new_password);
             	   	   $com_password=md5($com_password);
                       $old_password=md5($old_password);

             	   	   $sql="SELECT * FROM login WHERE username='$name' AND password='$old_password'";

       	               $result=mysqli_query($conn,$sql);
                       $result_check=mysqli_num_rows($result);

       	                if($result_check<1)
       	                   {
       	                   	echo "<script>alert('Invalid Old password')</script>";

       	   	              //  header("Location: change.inc.php?old_password=invalid");
       	   	                 exit();
       	                  }
       	                  else
       	                  {  
                            $query="UPDATE login SET password='$new_password' WHERE username='$name'"; 

                           mysqli_query($conn,$query);
                            
                            echo "<script>alert('Password ha been successfully changed.')</script>";
                          //  header("Location: change.inc.php?change=success");

       	   	                
       	   	                 exit();

                            
                         

       	                  }

                         

             	   }
             	   else
             	   {   
             	   	echo "<script>alert('Password not Confirm.')</script>";

             	   	 // header("Location: change.inc.php?new_password!=com_password");
       	   	            exit(); 

             	   }


             }
             else
             {  
             	echo "<script>alert('Please fill all input.')</script>";
             	//header("Location: change.inc.php?input_filed=empty");
       	   	         exit();  
             }
       



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