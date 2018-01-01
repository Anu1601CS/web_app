<!--By Anu1601CS Login verification-->

<?php session_start(); ?>

<?php

if(isset($_POST['username']) && isset($_POST['password']))
{
       include 'dbh.inc.php';

       $username=mysqli_real_escape_string($conn ,$_POST['username']);
       $password=mysqli_real_escape_string($conn ,$_POST['password']); 
       $password=md5($password);
       $confirm='1';
      
        //Error handlers

       if(empty($username) || empty($password))
       {
              $error="Input field is empty.";
              $_SESSION['error']=$error;
              header("Location: http://www.blogme.co/login");
              exit();
        }
       else
           {
                   $sql="SELECT * FROM login WHERE username='$username' OR email='$username' AND password='$password' ";
                   $result=mysqli_query($conn,$sql);
                   $result_check=mysqli_num_rows($result);

                  if($result_check==1)
                   {    


                    if($row=mysqli_fetch_assoc($result))
                         {    

                            if($confirm==$row['confirm'])
                            {

                            //DE-hashing the password
                               
                            if($password!=$row['password'])
                              {      
                                    $error="Username and password do not match or you do not have an account yet.";
                                    $_SESSION['error']=$error;
                                    header("Location: http://www.blogme.co/login");
                                    
                                    exit();
                              } 
                              else
                                if($password == $row['password'])
                                  {
                                    //Log in user
                                    
                                     $_SESSION['u_id']=$row['id']; 
                                     $_SESSION['u_username']=$row['username'];
                                     $_SESSION['u_name']=$row['name'];
                                     $_SESSION['u_email']=$row['email'];
                                    
                                     require 'create_dir.inc.php';
                                     
                                     header("Location: http://www.blogme.co");
                                     exit();
                                  }

                              }
                              else
                               {
                                    $error="Your account is not activated. Please check your email.";
                                    $_SESSION['error']=$error;
                                    header("Location: http://www.blogme.co/login");
                                    
                                    exit();

                               } 
                             
                         }     
                      

                      
                    }
                   else
                     {
                        
                      $error="invalid login";
                      $_SESSION['error']=$error;
                      header("Location: http://www.blogme.co/login");
                      exit();   

                    }
                  

              
       }

}
else
{
    header("Location: error.inc.php?login=error");
    exit();
}
?>
