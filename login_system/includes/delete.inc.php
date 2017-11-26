<?php

session_start();

if(isset($_SESSION['u_username']))
{ 

if(isset($_POST['submit']))
{

    include_once 'dbh.inc.php';

    $num=mysqli_real_escape_string($conn ,$_POST['num']);
    $num2=mysqli_real_escape_string($conn ,$_POST['num2']);
    $password=mysqli_real_escape_string($conn ,$_POST['password']);
    $text=mysqli_real_escape_string($conn ,$_POST['_text']);
    $text_c="I Want To Delete";


if(!empty($num) && !empty($num2) && $num2==$num )
 {
    $user=$_SESSION['u_username']; 
     $text=strtolower($text);
     $text_c=strtolower($text_c);    
 
     if($text==$text_c)
     {

        $check="SELECT * FROM login WHERE username='$user'";
        
        $result=mysqli_query($conn,$check);
        $row=mysqli_fetch_assoc($result);
         
        if($row['password']==md5($password))

        {
            $sql="DELETE FROM uploaded_image WHERE id='$num' AND username='$user'";
            @mysqli_query($conn,$sql);

                       $success='Your Article has been delete successfully.';
                       $_SESSION['success']=$success;
                       header("Location: ../delete.php?Your Article has been delete.");
                       exit();
        }
          else
        {
            $error="Wrong Password";
            $_SESSION['error']=$error;
            header("Location: ../delete.php?".$error);
            exit();
        }
        }
         else
        {  
           $error="Wrong. Confirmation Text.";
           $_SESSION['error']=$error;
           header("Location: ../delete.php?".$error);
           exit();
        }
        
      }
      else
      {
            $error='Please confirm. Post Number.';
            $_SESSION['error']=$error;
            header("Location: ../delete.php?".$error);
            exit();

      
      }
    }
  }
    else
      {
           $error='You must logged in.';
           $_SESSION['error']=$error;
           header("Location: error.inc.php?error user ".$error);
           exit();
        }

?>
    
                     
                       


      



  










