<?php


session_start();

if(isset($_POST['submit']))
{

   include_once 'dbh.inc.php';

    $name=mysqli_real_escape_string($conn ,$_POST['name']);
    $username=mysqli_real_escape_string($conn ,$_POST['username']);
    $email=mysqli_real_escape_string($conn ,$_POST['email']);
    $password=mysqli_real_escape_string($conn ,$_POST['password']);
    $confirm_password=mysqli_real_escape_string($conn ,$_POST['confirm_password']);
    $security=mysqli_real_escape_string($conn ,$_POST['security']);
   
    
    //Error handlers 

    if(empty($name)|| empty($username) || empty($email)|| empty($password) || empty($confirm_password) || empty($security))
    {   
            $error="Input field is empty.";
            
            $_SESSION['error']=$error;
   
      
        header("Location: ../signup.php?signup=empty");
        exit();
    }
    else
    if($password==$confirm_password)
      
    {    //check if input chracter are valid
      
         if(!preg_match("/^[a-zA-Z]*$/",$name))
         {  
            $error="Invalid name.";
            
            $_SESSION['error']=$error;


         	header("Location: ../signup.php?signup=invalid");
         	exit();

         }
          else
          {  
          	  //check email
          	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          	{  
          		  $error="Email invalid.";
            
                $_SESSION['error']=$error;

         	  header("Location: ../signup.php?signup=invalid_email=error_on_creating_account");
         	  exit();

          	}
          	else
          	{  
          		 $sql="SELECT * FROM login WHERE username ='$username'";
          		 $result=mysqli_query($conn,$sql);

          		 $result_check=mysqli_num_rows($result);

          		 if($result_check >0)
          		 {   

          		 	    $error="Username all ready taken.";
            
                        $_SESSION['error']=$error;

          		 //	echo "<script>alert('Username all ready exist.')</script>";
          		 	header("Location: ../signup.php?signup=username_taken=error_on_creating_account");
                     	exit();
          		 }
          		 else
          		 {
                        $password_hash=md5($password);
                        $security_hash=md5($security);
                         
                      
                    
 
                        //Insert data to database
                       $sql="INSERT INTO login(username,name,email,password,security) VALUES ('$username','$name','$email','$password_hash' ,'$security_hash');"; 

                       mysqli_query($conn,$sql);
                     //  echo "<script>alert('You signup sucessfully.')</script>";
                       
                       $success='Account  account has been successfull created.';
                       $_SESSION['success']=$success;

                      header("Location: ../signup.php?signup=success=account_has_been_successfull_created");
                       exit();


          		 }


          	}


         }
        
    }
    else
    {
        header("Location: ../signup.php?password not confirm error on signup ");
          exit();

    }


}
else
{

	header("Location: ../signup.php");
	exit();
}




?>