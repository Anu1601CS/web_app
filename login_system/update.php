<?php session_start();

if(!isset($_SESSION['u_username']))
{
header("Location: /");
exit();
}

include_once 'includes/dbh.inc.php';

$username=$_SESSION['u_username'];
 
$sql="SELECT * FROM login WHERE username='$username'";
$result=mysqli_query($conn,$sql);
$row =mysqli_fetch_array($result);


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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/update_style.css">
  <link rel="icon" type="image/png" href="css/image/blogger.png">
	
<style >

body{
  background-color:#613175;
  height: 100%;
  width:100%;
}

#a{
 color: #EF3B3A;
 text-decoration: none;
 font-size: 15px;
}

  .right{
   right: 20px;
   position: absolute;
   font-size: 30px!important;
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}

.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

.pre{
  position: relative;
  text-align: center;
  width:100%;
  

}

.pre img{
  width: 250px;
  border-radius: 100%;
  }    

@media only screen and (max-width: 500px) {
    
  .pre img{
    width: 200px;
    }

    input[type="submit"]{
      width: 100%;
    }  
    
    	h1{
	font-size:30px!important;
	}
	
	.form{
		padding:10px;
	}
		  
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

  <div id="hom" class="clearfix">

<a class="left"  title="Home" href="/"><i class="fa fa-home"></i></a>
<a class="right" title="Help" href="/?id=Help"><i class="material-icons">help_outline</i></a> 

</div>



  <form class="forgot-form" action="includes/update.inc.php" method="POST" enctype="multipart/form-data">
   
	<?php
	$user_logo='image';
	$username=$_SESSION['u_username'];
	$uimg=strtoupper($username);
    	
    	echo '	<div class="pre">
       			<img id="blah" src="uploads/'.@$uimg.'/'.$user_logo.'" alt="Selected Image Preview"/>
    		</div>';
	?>

<div class="fileUpload btn btn-primary">
    <span>Choose Image</span>
    <input type="file" class="upload" name="file"  onchange="readURL(this);" />
</div>

<?php
  
   echo'
    <div id="inner-input">
     <p class="message">Name:</p>
    <input type="text" name="name" placeholder="Name" value="'.@$row['name'].'" ><br>
    </div>
    <div id="inner-input">
     <p class="message">Username:</p>
    <input style=color:grey type="text" name="username" disabled placeholder="Username" value="'.@$row['username'].'"><br>
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
    <div id="inner-input">
     <p class="message" style=color:red> *Enter Your Password To Save Changes.</p>
    <input type="password" name="password" placeholder="Password.." required><br>
     </div> 


    <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Update">  
    <br> 
    <br>
    <p class="message"><a id="a" href="http://www.blogme.co">Cancel</a></p>';

?> 
  </form>

</div>

</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>function readURL(e){if(e.files&&e.files[0]){var a=new FileReader;a.onload=function(e){$("#blah").attr("src",e.target.result)},a.readAsDataURL(e.files[0])}}</script>


</body>


</html>
