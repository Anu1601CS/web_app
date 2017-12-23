<?php session_start(); 
	
	include_once 'includes/dbh.inc.php';
	if( isset($_SESSION['u_username']) )
	{
		$count=$_POST['count'];
		$post=$_POST['post'];
		$username=$_POST['user'];

		@$sql="SELECT * FROM commits WHERE post='$post' ORDER BY id DESC LIMIT $count";
		@$result=mysqli_query($conn,$sql);
		while ($row = @mysqli_fetch_array($result)) 
 		{ 
      		if($row['username']==$_SESSION['u_username'])
     		{									
   				echo '<a href="index?p='.$row['id'].'&type=cd&&no='.$post.'&&us='.$username.'" style=float:right;font-size:30px;>x</a>';										
	 		}
      
			echo '
			<h3 style="	color:red" >User : '.$row['username'].'</h3>
    		<p style =margin:0!important;><b>Comment</b> : '.$row['texts'].'</p>
    		<p>'.$row['tim'].'</p>
	 		<hr>';
 		}
	
	}
	else
	{
		header("Location: includes/error.inc.php?error sorry ");
	}
							
 ?>