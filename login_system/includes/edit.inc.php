



<?php

/**

By Anu1601CS

**/

session_start();

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

include_once 'dbh.inc.php';

@$user_c=mysqli_real_escape_string($conn ,$_GET['username']);
@$post=mysqli_real_escape_string($conn ,$_GET['post']);

if(!isset($_SESSION['u_username']))
{
header("Location: error.inc.php?error user ");
}
else
{

$username=$_SESSION['u_username']; 

$sql="SELECT * FROM uploaded_image WHERE username='$username' AND id='$post'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);


if(isset($_POST['submit']))
 {


     if($user_c!=$username)
      {
        header("Location: error.inc.php?error user ");
      }

      else
      {

       $title=mysqli_real_escape_string($conn ,$_POST['title']);
       $message=mysqli_real_escape_string($conn ,$_POST['message']);
       $youtube=mysqli_real_escape_string($conn ,$_POST['youtube']);
   
       $location='../uploads/images/';

       $user=$_SESSION['u_username']; 
       $time= date("Y-m-d");

       $tmp_name=@$_FILES['image']['tmp_name'];
       $name=@$_FILES['image']['name'];

       if(!empty($name))
        {
        $name=rand();
        move_uploaded_file($tmp_name, $location.$name);
        }
       else
        {
        $name=$row['image'];
        }    
 
       $query="UPDATE uploaded_image SET image='$name',texts='$message',title='$title',tim='$time',youtube='$youtube' WHERE username='$username' AND id='$post' "; 
       mysqli_query($conn,$query);
        
        $success='Your Post has been updated.';
        $_SESSION['success']=$success;
        header("Location: ../edit?username=$user_c&post=$post&".$success);


    }

 }
 else
 {
 	header("Location: error.inc.php?username=$user_c&post=$post&".$success);
 }

}

?>

