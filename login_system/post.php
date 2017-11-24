
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



<h1>POST</h1>

<button ><a href="upload.php" >Student Login</a></button>

<div id="form">

<form action="includes/post.inc.php" method="POST" enctype="multipart/form-data">

 
 <!-- <h1>POST</h1> -->	
<br>
<<<<<<< HEAD
Add Logo :<input type="file" name="logo"><br>
Add Images :<input type="file" name="image" multiple /><br>

<input type="text" name="title" placeholder="Title" ><br><br>

<textarea type="message" cols="100" rows="20" placeholder="Message.." name="message" required="" ></textarea>
=======
<input type="file" name="file"><br>
<input type="text" name="title" placeholder="Title" ><br><br>

<textarea type="message" cols="30" rows="9" placeholder="Message.." name="message" required="" ></textarea>
>>>>>>> 22416d4ebfc34c299108176b39cf4293014c194c

<br>
<input type="submit"  name="submit" value="POST">	



</form>

</div>

</body>



</html>