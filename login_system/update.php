<?php
session_start();

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
if(!isset($_SESSION['u_username']))
{
header("Location: includes/error.inc.php?error user ");
}


include_once 'includes/dbh.inc.php';
@$username=$_SESSION['u_username']; 

@$sql="SELECT * FROM login WHERE username='$username'";
@$result=mysqli_query($conn,$sql);
$row = @mysqli_fetch_array($result);



?>

<!DOCTYPE html>
<html lang="en" >
<head>
  
  <meta charset="UTF-8">
  <title>Update</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/update_style.css">

<style >

body
  {background-image: url("images/header.jpg");
   height: 100%;
   
  }

#a{
    color: #EF3B3A;
    text-decoration: none;
    font-size: 15px;
  }

 </style>

</head>

<body>

<div class="inner">

<?php
include 'includes/alert.inc.php';
?>

<div class="container">

<div class="info">
    <h1 style="color: white;">Update Your Profile</h1><span>
  </div>

</div>

<div class="form">

  <div class="thumbnail">
  
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>

  </div>


  <form class="forgot-form" action="includes/update.inc.php" method="POST" enctype="multipart/form-data">
   
   <p class="message"></p>

<?php
  
   echo'
   
    <input type="file" name="file"/><br><br>
    <div id="inner-input">
     <p class="message">Name:</p>
    <input type="text" name="name" placeholder="Name" value="'.@$row['name'].'" ><br>
    </div>
    <div id="inner-input">
     <p class="message">Username:</p>
    <input type="text" name="username" placeholder="Username" value="'.@$row['username'].'"><br>
    </div>
    <div id="inner-input">
     <p class="message">Email:</p>    
    <input type="text" name="email" placeholder="Email" value="'.@$row['email'].'"><br>
     </div>
     <div id="inner-input">
     <p class="message">Facebook Link:</p>
    <input type="text" name="facebook" placeholder="Facebook" value="'.@$row['facebook'].'"><br>
     </div>
     <div id="inner-input">
     <p class="message">Twitter Link:</p>
    <input type="text" name="twitter" placeholder="Twitter" value="'.@$row['twitter'].'"><br>
     </div>
     <div id="inner-input">
     <p class="message">Linkdin Link:</p>
    <input type="text" name="linkdin" placeholder="Linkdin" value="'.@$row['linkdin'].'"><br>
     </div>
     <div id="inner-input">
     <p class="message">Instagram link:</p>
    <input type="text" name="instagram" placeholder="Instagram" value="'.@$row['instagram'].'"><br>
     </div>
     <div id="inner-input">
     <p class="message">Website Link:</p>
    <input type="text" name="website" placeholder="Website" value="'.@$row['website'].'"><br>
     </div> 
    <div id="inner-input">
     <p class="message">About You:</p>
    <textarea type="message" cols="50" rows="10" placeholder="Biodata.." name="bio"  >'.@$row['bio'].'</textarea><br><br>
    </div>

    <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Update">  
<br> 
 <br>
 <p class="message"><a id="a" href="index">Cancel</a></p>';

?> 
  </form>

</div>

</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>


</html>
