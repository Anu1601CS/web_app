<?php session_start();

	include_once 'includes/dbh.inc.php';

	if(!isset($_SESSION['u_username']))
	{
		header("Location: includes/error.inc.php?error user ");
	}

	@$post=mysqli_real_escape_string($conn ,$_GET['post']);
	@$no=mysqli_real_escape_string($conn ,$_GET['no']);

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  
  <meta charset="UTF-8">
  <title>Delete Post</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/sign_style.css">
  <link rel="icon" type="image/png" href="css/image/blogger.png">

<style >

body{
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
	
@media only screen and (max-width: 500px) {
    
 

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
    		<h1 style="color: white;">Delete Your Post</h1><span>
  		</div>
	</div>
	
	<div class="form">
    	<div id="hom" class="clearfix">
			<a class="left"  title="Home" href="/"><i class="fa fa-home"></i></a>
			<a class="right" title="Help" href="/?id=Help"><i class="material-icons">help_outline</i></a> 
		</div>
  	<div class="thumbnail">
  		<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
  	</div>
 	
 	<?php
		echo'<form class="forgot-form" action="includes/delete.inc.php?post='.$post.'" method="POST" >
				<p class="message"></p>
  				<input type="text" name="num" placeholder="Post Number.." required="" value="'.$no.'"><br>
    			<input type="text" name="num2" placeholder="Confirm Post Number.." required=""><br>
    			<input type="password" name="password" placeholder="Password.." required=""><br>
    			<p><a id="a">* Type : I Want To Delete</a></p>
    			<input type="text" name="_text" placeholder="Type here.." required=""><br>';
    ?>
    <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Delete">  
	<br> 
	<br>
	<br>
	 <p class="message"><a id="a" href="/">Cancel</a></p>
  			</form>
 		</div>

	</div>

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>
</html>
