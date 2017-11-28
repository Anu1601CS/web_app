
<!--
 * Created by Anurag (Anu1601CS) 
 *-->

<?php

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
session_start();

if(isset($_POST['submit']))
{
        include 'dbh.inc.php';

       $username=mysqli_real_escape_string($conn ,$_POST['username']);
       $password=mysqli_real_escape_string($conn ,$_POST['password']); 
       $password=md5($password);

        //Error handlers

       if(empty($username) || empty($password))
       {
              $error="Input field is empty.";
            
              $_SESSION['error']=$error;
    
             header("Location: ../login?login=empty");
       	   	   exit();
       }
       else
       {

       	   $sql="SELECT * FROM login WHERE username='$username' OR email='$username'";

       	   $result=mysqli_query($conn,$sql);

       	   $result_check=mysqli_num_rows($result);

       	   if($result_check<1)
       	   {    
              $error="invalid login";
            
              $_SESSION['error']=$error;

       	   	   header("Location: ../login?login=invalid");
       	   	   exit();
       	   }
       	   else
       	   {
                 if($row=mysqli_fetch_assoc($result))
                 {   //DE-hashing the password
                       
                    if($password!=$row['password'])
                      {      
                            $error="invalid username and password.";
            
                            $_SESSION['error']=$error;

                             header("Location: ../login?login=invalid_username_and_password");
       	   	                             exit();
                      } 
                      else
                      	if($password== $row['password'])
                      {
                      	//Log in user
                        
                         $_SESSION['u_id']=$row['id']; 
                         $_SESSION['u_username']=$row['username'];
                         $_SESSION['u_name']=$row['name'];
                         $_SESSION['u_email']=$row['email'];
                         

                         require 'create_dir.inc.php';
                         
                         header("Location: ../index?login=success");
       	   	             exit();

                       }
                     

                 }     

       	   }
       }

}
else
{
	header("Location: error.inc.php?login=error");
     exit();
}



?>
