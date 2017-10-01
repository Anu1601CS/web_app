
<!--
 * Created by Anurag (Anu1601CS) 
 *-->


<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>

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
#security
  {   

    position: absolute;
    color: red;

  }


</style>


</head>

<body>


<?php



echo '<br>

<button ><a style=" text-decoration: none; font-size: 20px; color: black;" href="../home.php">HOME</a></button>
<br>
<br>';
     
      echo '<span style="color:black;font-size:30px;">Change Password </span> ';
       echo "<br>";
       echo "<br>";       
 
      echo '<form action="forgot.inc.php" method="POST">
	        
	        <input type="password" name="security" placeholder="Security Code"><br>
        	<input type="password" name="new_password" placeholder="New Password"><br>
	       <input type="password" name="com_password" placeholder="Confirm Password"><br><br>
        	<input type="submit" name="submit" value=" Change">

           </form>';


        if(isset($_POST['submit']))
           {  
           	    include 'dbh.inc.php';

                $new_password=$_POST['new_password'];
                $com_password=$_POST['com_password'];
                $security=$_POST['security'];

             if(!empty($new_password) && !empty($security) && !empty($com_password))
             {  
             	   if($new_password==$com_password)
             	   {    
             	   	   $new_password=md5($new_password);
             	   	   $com_password=md5($com_password);
                       $security=md5($security);

             	   	   $sql="SELECT * FROM login WHERE security='$security'";

       	               $result=mysqli_query($conn,$sql);
                       $result_check=mysqli_num_rows($result);

       	                if($result_check<1)
       	                   {
       	                   	//echo "<script>alert('Invalid Security Code')</script>";

       	   	             header("Location: forgot.inc.php?old_password=invalid=error_on_changing_password");
       	   	                 exit();
       	                  }
       	                  else
       	                  {  
                            $query="UPDATE login SET password='$new_password' WHERE security='$security'"; 

                           mysqli_query($conn,$query);
                            
                            //echo "<script>alert('Password has   been successfully changed.')</script>";
                             header("Location: forgot.inc.php?change=success=password_has_been_successfull_changed");

       	   	                
       	   	                 exit();

                            
                         

       	                  }

                        }
             	   else
             	   {   
             	   	//echo "<script>alert('Password not Confirm.')</script>";

             	   	header("Location: forgot.inc.php?new_password+!+=+com_password=error_on_changing_password");
       	   	            exit(); 

             	   }


             }
             else
             {  
             	//echo "<script>alert('Please fill all input.')</script>";
             	header("Location: forgot.inc.php?input_filed=empty=error_on_changing_password");
       	   	         exit();  
             }
       



           }
           ?>

<div id="security">
  <ul>
      <li>* Note *</li>
    <li>Security question.   </li>
    <li>Enter code which you remember all time.</li>
    <li>Like Father's name , Mother's name etc..</li> 
    <li>It may be help full in future.</li>
  </ul>
</div>

</body>
</html>