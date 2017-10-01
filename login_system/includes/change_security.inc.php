
<!--
 * Created by Anurag (Anu1601CS) 
 *-->
 

<!DOCTYPE html>
<html>

<head>
<title>Security Update</title>

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

echo '<br>';

session_start();


if(isset($_SESSION['u_username']))
{   

echo '<br>

<button ><a style=" text-decoration: none; font-size: 20px; color: black;" href="../upload.php">HOME</a></button>
<br>
<br>';

      

	$name=$_SESSION['u_username'];
     
      echo '<span style="color:black;font-size:30px;">Change Security Code</span> ';
       echo "<br>";
       echo "<br>";       
 
      echo '<form action="change_security.inc.php" method="POST">
	        
	                  <input type="password" name="password" placeholder="Password"><br>
                    <input type="password" name="security" placeholder="New Security Code"><br><br>
        	        	<input type="submit" name="submit" value=" Change"><br>

           </form>';


        if(isset($_POST['submit']))
           {  
           	    include 'dbh.inc.php';

                $new_security=$_POST['security'];
                $password=$_POST['password'];                

             if(!empty($new_security) && !empty($password))
             {  
             	   
             	   	   $new_security=md5($new_security);
             	   	   $password=md5($password);
                       

             	   	   $sql="SELECT * FROM login WHERE username='$name' AND password='$password'";

       	               $result=mysqli_query($conn,$sql);
                       $result_check=mysqli_num_rows($result);

       	                if($result_check<1)
       	                   {
       	                   	echo "<script>alert('Invalid   password')</script>";

       	   	              //  header("Location: change.inc.php?old_password=invalid");
       	   	                 exit();
       	                  }
       	                  else
       	                  {  
                            $query="UPDATE login SET security='$new_security' WHERE username='$name'"; 

                           mysqli_query($conn,$query);
                            
                            echo "<script>alert('Security code has been successfully changed.')</script>";
                          //  header("Location: change.inc.php?change=success");

       	   	                
       	   	                 exit();

                             }
              }
             else
             {  
             	//echo "<script>alert('Please fill all input.')</script>";
             	header("Location: change_security.inc.php?input_filed=empty");
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