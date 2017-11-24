
<!--
 * Created by Anurag (Anu1601CS).
 *-->
<?php


include 'includes/alert.inc.php';
?>
 
<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/signup.css" type="text/css">

</head>

<body>




<h1>Delete Post</h1>

<button ><a href="blog/index.php" >Home</a></button>

<div id="form">

<form action="includes/delete.inc.php" method="POST" enctype="multipart/form-data">

 
 <!-- <h1>POST</h1> -->	
<br>
<input type="text" name="num" placeholder="Number" ><br>
<input type="text" name="num2" placeholder="Confirm Number" ><br>

<br>
<input type="submit"  name="submit" value="DELETE">	



</form>

</div>

</body>



</html>