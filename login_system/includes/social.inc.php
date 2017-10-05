
<!--
 * Created by Anurag (Anu1601CS) 
 *-->



<!DOCTYPE html>
<html>

<head>
<title>Add socal links</title>

<style>

button{

  cursor: pointer;
}

body
{
  
  line-height: 1.5;  
  text-align: center;
}

a{
  text-decoration:none;
  font-size: 20px;
  text-align: left; 
     color: black;
}

#forgot{
  color: blue!important;
  font-size: 15px;
}


</style>


</head>

<body>


<?php

echo '<br>';

session_start();


if(isset($_SESSION['u_username']))
{   

echo '<br>

<button ><a style=" text-decoration: none; font-size: 20px; color: black;" href="../upload.php">HOME</a></button>
<br>
<br>';

      

	$name=$_SESSION['u_username'];
     
       echo '<span style="color:black;font-size:30px;">Add Social Links</span> ';
       echo "<br>";
       echo "<br>";       
 
      echo '<form action="social.inc.php" method="POST">
	        
	        <input type="text" name="facebook" placeholder="Facebook" ><br> 
        	<input type="text" name="twitter" placeholder="Twitter" ><br>
	        <input type="text" name="linkdin" placeholder="Linkdin" ><br>
          <input type="text" name="website" placeholder="Website" ><br><br>
        	
          <input type="submit" name="submit" value=Add>

           </form>';


        if(isset($_POST['submit']))
           {  
           	    include 'dbh.inc.php';

                $facebook=$_POST['facebook'];
                $twitter=$_POST['twitter'];
                $linkdin=$_POST['linkdin'];
                $website=$_POST['website'];

              
             	   if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
             	   {    
             	   	    

             	   	   $sql="SELECT * FROM login WHERE username='$name' ";

       	               $result=mysqli_query($conn,$sql);
                       $result_check=mysqli_num_rows($result);

       	                if($result_check<1)
       	                   {
       	                   	echo "<script>alert('Invalid Old password')</script>";

       	   	              //  header("Location: change.inc.php?old_password=invalid");
       	   	                 exit();
       	                  }
       	                  else
       	                  {  
                            $query="UPDATE login SET website='$website',linkdin ='$linkdin',twitter='$twitter',facebook='$facebook' WHERE username='$name'"; 

                           mysqli_query($conn,$query);
                            
                            echo "<script>alert('Social link Added.')</script>";
                          //  header("Location: change.inc.php?change=success");

       	   	                
       	   	                 exit();

                            
                         

       	                  }

                         

             	   }
             	   else
             	   {   
             	   	echo "<script>alert('Invalid Website Url.')</script>";

             	   	 // header("Location: change.inc.php?new_password!=com_password");
       	   	            exit(); 

             	   }


            
       



           }

}
else
{
	echo '
       <img src="../css/image/4041.gif"><br><br>
       <span style="color:black;font-size:50px;">Oops..#Error 404 Page not found</span> 
  ';
}


         
        


?>

</body>
</html>