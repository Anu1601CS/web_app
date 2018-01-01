<?php

	$current_dir="/home/mnboafbk0e68/public_html/";

	echo $current_dir;

	$user=$_SESSION['u_username'];

	$user=strtoupper($user);

	if(!is_dir($current_dir.'/uploads/'.$user))
	{
		if(@mkdir($current_dir.'/uploads/'.$user,0755,true))
		{      
	
			$image = file_get_contents('../css/image/user77.png');
    		
    			file_put_contents('/home/mnboafbk0e68/public_html/uploads/'.$user.'/image', $image);
    		
			@umask($current_dir);

		}

    }

?>