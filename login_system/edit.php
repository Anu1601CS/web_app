<?php session_start(); ?>

<?php

  include_once 'includes/dbh.inc.php';

  $user_c=mysqli_real_escape_string($conn ,$_GET['username']);
  $post=mysqli_real_escape_string($conn ,$_GET['post']);

  if(!isset($_SESSION['u_username']))
  {
    header("Location: includes/error.inc.php?error user ");
  }

  $username=$_SESSION['u_username']; 
  $sql="SELECT * FROM uploaded_image WHERE username='$username' AND id='$post'";
  $result=mysqli_query($conn,$sql);
  $row = @mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  
  <meta charset="UTF-8">
  <title>Edit Post</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/sign_style.css">
  <link rel="icon" type="image/png" href="css/image/blogger.png">

<style >

body
  {
    background-color:#613175;
  }

#a{
    color: #EF3B3A;
    text-decoration: none;
    font-size: 15px;
  }

  a{
    text-decoration: none;
    color: red;
  }

.clearfix::before {
    content: "";
    clear: both;
    display: table;
}


 #hom{
  padding: 0 0 20px 0;
  text-align: left;
    font-size: 30px;
  
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
	width: 60%;
	}

@media only screen and (max-width: 500px) {
		
	.pre img{
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
      <h1 style="color: white;">Edit Your Post</h1><span>
   </div>

</div>

<div class="form" style="max-width: 800px!important">

  <div id="hom" class="clearfix">
    <a class="left"  title="Home" href="/"><i class="fa fa-home"></i></a>
    <a class="right" title="Help" href="/?id=Help"><i class="material-icons">help_outline</i></a> 
  </div>


  <?php 

  echo'<form class="forgot-form" action="includes/edit.inc.php?post='.$post.'&username='.$user_c.'" method="POST" enctype="multipart/form-data">
       
        
        
        
        <div class="pre">
       		<img id="blah" src="uploads/images/'.$row['image'].'" alt="Selected Image Preview"/>
    	</div>

	<div class="fileUpload btn btn-primary">
    		<span>Choose Image</span>
    		<input type="file" class="upload" name="image"  onchange="readURL(this);" />
	</div>
        
        <input type="text" name="title" placeholder="Title" value="'.htmlspecialchars($row['title']).'"><br>
        <input type="text" name="youtube" placeholder="Youtube Link.." value="'.htmlspecialchars($row['youtube']).'"><br>
        <textarea type="message" cols="100" rows="20" placeholder="Message.." name="message" required="" >'.$row['texts'].'</textarea><br><br>
        <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Update Post"> ';
  ?>
  
  <br> 
  <br>
  <p class="message"><a id="a" href="/">Cancel</a></p>
 
    </form>

  </div>

</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  

<script>
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>

<script>
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
                    
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


</body>


</html>
