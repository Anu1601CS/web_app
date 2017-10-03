<?php

session_start();

$current_dir="/opt/lampp/htdocs/secure/";

echo $current_dir;

$user=$_SESSION['u_username'];


if(!is_dir($current_dir.'/uploads/'.$user))
{
	if(@mkdir($current_dir.'/uploads/'.$user,0755,true))
{      
	@umask($current_dir);
     
}

}



?>