
<!--
 * Created by Anurag (Anu1601CS) 
 *-->

<?php

session_start();


if(isset($_SESSION['u_username']))
{  

include 'dbh.inc.php';

if(isset($_POST['submit']))
 {



$name=@$_FILES['file']['name'];
$size=@$_FILES['file']['size'];
$type=@$_FILES['file']['type'];
$tmp_name=@$_FILES['file']['tmp_name'];

$ext = pathinfo($name, PATHINFO_EXTENSION);

$user=$_SESSION['u_username'];

$user_logo='image';

$extension=strtolower(substr($name, strpos($name,'.')+1));

if($extension=='jpg' || $extension=='png' ||  $type=='jpg/png' || empty($name))
      {  
           
           $user=$_SESSION['u_username'];
           $location='../uploads/'.$user.'/';
           
            move_uploaded_file($tmp_name, $location.$user_logo);
             
                   $n_username=$_POST['username'];
                   $n_name=$_POST['name'];
                   $n_email=$_POST['email'];
                   $n_facebook=$_POST['facebook'];
                   $n_linkdin=$_POST['linkdin'];
                   $n_website=$_POST['website'];
                   $n_twitter=$_POST['twitter'];
                   $n_instagram=$_POST['instagram'];
                   $n_bio=$_POST['bio'];

                $query="UPDATE login SET username='$n_username', name='$n_name', email='$n_email', website='$n_website',linkdin ='$n_linkdin',twitter='$n_twitter',facebook='$n_facebook',instagram='$n_instagram',bio='$n_bio' WHERE username='$user'"; 

                   mysqli_query($conn,$query);
                   $success='Your profile has been successfully updated.';
                   $_SESSION['success']=$success;
                   header("Location: ../update.php?".$success);
          
           
        }

     else
     {
            $error="Please choose a correct file type";
            $_SESSION['error']=$error;
            header("Location: ../update.php?".$error);
            exit();
      }     
  
 } 
}
else
{
	 header("Location: error.inc.php");
}


         
        


?>

</body>
</html>