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
@$post=mysqli_real_escape_string($conn ,$_GET['post']);



$use=md5($username);

if($action=="edit")
{
     
 header("Location:  edit?post=$post&username=$username");

}
else
if($action=="delete")	
{
 header("Location:  delete?user=$use.sdhf 23jdfnj23 23 323sdff");
}
else
if($action=="post")
{
	 header("Location:  post?user=$use.njwebdkj23 23 23 n2332");
}	
if($action=="update")
{
	 header("Location:  update?user=$use.j23n4bnj34b2k 2 23 n3 ");
}


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