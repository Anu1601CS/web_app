<?php  session_start(); ?>

<?php
	
	include_once 'dbh.inc.php';

	$email=mysqli_real_escape_string($conn ,$_GET['ee']);
	$token=mysqli_real_escape_string($conn ,$_GET['tok']);
	$mailu=mysqli_real_escape_string($conn ,$_GET['em']);

	$confirm='1';
	$expire='0';


	$sql="SELECT * FROM login WHERE email='$mailu' AND otp='$token' ";
   	$result=mysqli_query($conn,$sql);
   	$result_check=mysqli_num_rows($result);
    
    if($result_check==1)
    {

    		$row=mysqli_fetch_assoc($result);

		$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
 		$date->format('Y-m-d h:i:s');
 		
		$datetime1 = strtotime($row['expire']);
		$datetime2 = strtotime($date->format('Y-m-d h:i:s'));
		$interval  = abs($datetime2 - $datetime1);
		$minutes   = round($interval / 60);
	
	if($row['confirm']==0)
	{

		if((int)$minutes <= 1440)
		{	
			$_SESSION['aut']="BEXC";
			
			header("Location: http://www.blogme.co/authenticate?ee=$email&tok=$token&em=$mailu&$email");
                        exit();
			
		
		}
		else
		{
			$error="Your link is expired.";
                        $_SESSION['new_m']=$error;
			
			header("Location: http://www.blogme.co/new");
                        exit();
		}

	}
	else
	{
			$error="Your account is already activated.";
                        $_SESSION['new_m']=$error;
			
			header("Location: http://www.blogme.co/new");
                        exit();
	}
	


	}
     	else
    	{	
    			$error="Something goes wrong with your activation link.";
                        $_SESSION['new_m']=$error;
     		
     			header("Location: http://www.blogme.co/new");
                        exit();
     	}              
                  
                  

?>