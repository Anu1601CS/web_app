
<!--
 * Created by Anurag (Anu1601CS) 
 *-->


<?php


include_once 'home.php';

if(isset($_SESSION['u_username']))
   {
   	echo '<a style="color:red;" id="link" href="upload.php">You are currently logged in.</a> ';
   }


?>
