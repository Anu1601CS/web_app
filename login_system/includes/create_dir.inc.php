<?php

session_start();

$current_dir="/opt/lampp/htdocs/secure/";

echo $current_dir;

$user=$_SESSION['u_username'];


if(!is_dir($current_dir.'/uploads/'.$user))
{
	if(@mkdir($current_dir.'/uploads/'.$user,0755,true))
{      
	$image = file_get_contents('../css/image/user77.png');
    file_put_contents('/opt/lampp/htdocs/secure/uploads/'.$user.'/image', $image);


	@umask($current_dir);
     
}

}



?>