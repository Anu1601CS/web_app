<!-- By Anu1601CS Logout -->
<?php

if(	isset($_POST['submit']) && ($_POST['submit']=='lo')	)	
{	
	session_start();
  	session_unset();
	session_destroy();
	//header("Location: ../index");
}

?>