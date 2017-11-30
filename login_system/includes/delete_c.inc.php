<?php


/**
BY ANU1601CS
***/

session_start();


$no=$_GET['no'];
$user=$_GET['us'];

$use=md5($_GET['us']);

if(isset($_SESSION['u_username']))
{ 
    include_once 'dbh.inc.php';
    
    $post=mysqli_real_escape_string($conn ,$_GET['post']);

if(!empty($post))
 {

  $username=$_SESSION['u_username']; 

  $sql="DELETE FROM commits WHERE id='$post' AND username='$username'";

            @mysqli_query($conn,$sql);

                      
                       header("Location: ../read?post=$no&&id=$user&&$use");
                       exit();


      
      
}
     else
      {
        
           header("Location: error.inc.php?error user ".$error);
           exit();
        }

}
else
   {
          
           header("Location: error.inc.php?error user ".$error);
           exit();
    }

?>
    
                     
                       


      



  










