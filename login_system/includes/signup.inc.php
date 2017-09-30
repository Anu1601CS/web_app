<?php

if(isset($_POST['submit']))
{

   include_once 'dbh.inc.php';

    $name=mysqli_real_escape_string($conn ,$_POST['name']);
    $username=mysqli_real_escape_string($conn ,$_POST['username']);
    $email=mysqli_real_escape_string($conn ,$_POST['email']);
    $password=mysqli_real_escape_string($conn ,$_POST['password']);
   
    
    //Error handlers 

    if(empty($name)|| empty($username) || empty($email)|| empty($password))
    {
        header("Location: ../signup.php?signup=empty");
        exit();
    }
    else
    {    //check if input chracter are valid
      
         if(!preg_match("/^[a-zA-Z]*$/",$name))
         {

         	header("Location: ../signup.php?signup=invalid");
         	exit();

         }
          else
          {  
          	  //check email
          	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          	{
         	  header("Location: ../signup.php?signup=invalid_email");
         	  exit();

          	}
          	else
          	{  
          		 $sql="SELECT * FROM login WHERE username ='$username'";
          		 $result=mysqli_query($conn,$sql);

          		 $result_check=mysqli_num_rows($result);

          		 if($result_check >0)
          		 {
          		 	header("Location: ../signup.php?signup=username_taken");
                     	exit();
          		 }
          		 else
          		 {
                        $password_hash=md5($password);
                        //Insert data to database
                       $sql="INSERT INTO login(username,name,email,password) VALUES ('$username','$name','$email','$password_hash');"; 

                       mysqli_query($conn,$sql);
                       header("Location: ../signup.php?signup=sucess");
                       exit();


          		 }


          	}


         }
        
    }


}
else
{

	header("Location: ../signup.php");
	exit();
}




?>