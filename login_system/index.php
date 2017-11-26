<?php

session_start();
include_once 'includes/dbh.inc.php';

if(isset($_SESSION['u_username']))
{
  @$username=$_SESSION['u_username'];	
}
else
{
 @$username=mysqli_real_escape_string($conn ,$_GET['id']);
}

@$action=mysqli_real_escape_string($conn ,$_GET['type']);

@$sql="SELECT * FROM login WHERE username='$username'";
@$result=mysqli_query($conn,$sql);
@$result_check=mysqli_num_rows($result);

if($result_check==1)
{
  include_once 'home.php';
}
else
if(!empty($username))	
{
	header("Location: includes/error.inc.php?error user ".$username);
}
else
{
    include_once 'main.php';
}






?>