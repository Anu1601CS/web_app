


<?php

session_start();

include_once 'includes/dbh.inc.php';

if(isset($_SESSION['u_username']))
{
    @$username=$_SESSION['u_username'];	
}

if(isset($_GET['id']))
{
  @$username=mysqli_real_escape_string($conn ,$_GET['id']);
}

if(!isset($_SESSION['u_username']) && !isset($_GET['id']))
{  
   include_once 'main.php';
}

@$action=mysqli_real_escape_string($conn ,$_GET['type']);
@$post=mysqli_real_escape_string($conn ,$_GET['post']);
@$no=mysqli_real_escape_string($conn ,$_GET['no']);
@$p=mysqli_real_escape_string($conn ,$_GET['p']);
@$us=mysqli_real_escape_string($conn ,$_GET['us']);
$use=md5($username);

/*Action*/

if($action=="edit")
{
     
 header("Location:  edit?post=$post&username=$username&&$use");

}
else
if($action=="delete")	
{
 header("Location:  delete?user=$use&post=$post&no=$no&&$use");
}
else
if($action=="post")
{
	 header("Location:  post?user=$use");
}	
else
if($action=="update")
{
	 header("Location:  update?user=$use");
}
else
if($action=="read_more")
{
	header("Location: read?post=$post&&id=$username&&$use");
}
else
if($action=="log")
{
   header("Location: includes/logout.inc.php?&&$use");
}
else
if($action=="cd")
{
   header("Location: includes/delete_c.inc.php?&&post=$p&&no=$no&&us=$us&&$use");
}

/*valiadity*/

@$sql="SELECT * FROM login WHERE username='$username'";
@$result=mysqli_query($conn,$sql);
@$result_check=mysqli_num_rows($result);


if($result_check==1)
{
  include_once 'home.php';
}
else
{
   @header("Location: includes/error.inc.php?&&$use");
}


?>