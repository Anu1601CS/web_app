<?php

	session_start();

	$current_dir="/opt/lampp/htdocs/anurag/login_system";

	echo $current_dir;

	$user=$_SESSION['u_username'];

	$user=strtoupper($user);

	if(!is_dir($current_dir.'/uploads/'.$user))
	{
		if(@mkdir($current_dir.'/uploads/'.$user,0755,true))
		{      
	
			$image = file_get_contents('../css/image/user77.png');
    		file_put_contents('/opt/lampp/htdocs/anurag/login_system/uploads/'.$user.'/image', $image);
			@umask($current_dir);

		}

    }

?>