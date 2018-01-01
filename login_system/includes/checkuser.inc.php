<?php

	include 'dbh.inc.php';

	if(!empty($_POST["username"])) 
	{

	$username=$_POST['username'];

	$sql="SELECT * FROM login WHERE username='$username' ";
	$result=mysqli_query($conn,$sql);
	    
	$result_check=mysqli_num_rows($result);
		
	    if($result_check > 0)
	    {
	    	echo "<span class='status-not-available'> * Username Not Available.</span>";
	    }
	    else
	    {
	    	echo "<span class='status-available'> * Username Available.</span>";
	    }	


	}
	else
	if(!empty($_POST["email"])) 
	{
	
	$email=$_POST['email'];

	$sql="SELECT * FROM login WHERE email='$email' ";
	$result=mysqli_query($conn,$sql);
	    
	$result_check=mysqli_num_rows($result);
		
	    if($result_check > 0)
	    {
	    	echo "<span class='status-not-available'> * Email Not Available.</span>";
	    }
	    else
	    {
	    	echo "<span class='status-available'> * Email Available.</span>";
	    }	

	
 	}
 	else
 	{
 		header("Location: /");
 		exit();
 	
 	}
?>