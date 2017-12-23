
<!--  Created by Anurag (Anu1601CS) --> 

<?php

if(empty($username))
{
	header("Location: includes/error.inc.php");
}

while ($row = @mysqli_fetch_array($result)) 
{ 	

	@$li=$row['linkdin'];
	@$we=$row['website'];
	@$tw=$row['twitter'];
	@$fb=$row['facebook'];
	@$in=$row['instagram'];
	@$id=$row['id'];
	@$na=$row['name'];
	@$em=$row['email'];
	@$bi=$row['bio'];
	
}
     
?>

<!DOCTYPE HTML>
<!--Github : Anu1601CS-->
<html>
	<head>
		
		<title>Blog | Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="css/overlay.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/main.js"></script>
		
	</head>
	
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
                         <div class="inner">
                             
                            <div class="al" id="popup">
                             	<p>Welcome , Please Update Your Profile.<br>Click Here To Update.</p>
                            </div>
                              
                            <?php
                             
                             if(@isset($_SESSION['u_username']))
                             { 
                             	echo '<button style=float:right;margin-top:10px; id="dex" class="log_btn right" name="submit" >Logout</button>'; 
                             }
                             else
                             { 
                            	echo ' <button style=float:right;margin-top:10px; id="dex" class="log_in_btn"  name="submit">Sign Up</button>';
                              	echo ' <button style=float:right;margin:10px 0 0 10px; id="dex" class="log_in_btn"  name="submit">Login</button>';
                             }
                                     
                           	?>
							
							<!-- Header -->
							<header id="header">

								<ul class="icons">
									<?php
										echo '<li><a target=_blank href="'.@$tw.'" class="icon fa-twitter"></a></li>
										<li><a target=_blank href="'.@$fb.'" class="icon fa-facebook"></a></li>
   										<li><a target=_blank href="'.@$in.'" class="icon fa-instagram"></a></li>
   										<li><a target=_blank href="'.@$we.'" class="icon fa-dribbble"></a></li>
										<li><a target=_blank href="'.@$li.'" class="icon fa-linkedin-square"></a></li>';
									?>
								</ul>
							
							</header>

							<!-- Banner -->
							<section id="banner">
								<div class="content">
									<header>
										<?php
                                            echo "<h1>Hi, I'm ".@$na."</h1>";
										?>
                                   	</header>
                                                 
                                	<?php
                                		$uimg=strtoupper($username);
										echo 
											'<p>'.@$bi.'</p>
											<ul class="actions">
												<li><a href="'.@$we.'" class="button">Learn More</a></li>
											</ul>
                                       
                                </div>
								<span >';
										
										$user_logo='image';
										echo '<div id="logo" >
											 		<img  src="uploads/'.@$uimg.'/'.$user_logo.'"><br>
										       		<p>Profile Picture</p> 
										       </div>';
									?>
									   
								</span>
							</section>
														
							<!-- Section -->
							<section>  

								<section id="search" class="alt">
									<form method="get" action="index.php">
										<input type="text" name="id"  placeholder="Search Post You " onkeyup="showResult(this.value)" />
										<div id="livesearch"></div>
									</form>
								</section>

								<header class="major">
										<h2>My Blog</h2>
								</header>
									
								<div class="posts">

									<?php
										@$sql="SELECT * FROM uploaded_image WHERE username='$username' ORDER BY id DESC LIMIT 4";
                                        @$result=mysqli_query($conn,$sql);
                                        $flag=0;
                                        $count=0;
                                        while ($row = @mysqli_fetch_array($result)) 
                                           { 
                                        		$flag=1;
                                          		echo '<article>';
                                             	if($row['image']!=0 && !empty($row['youtube']))
                                             	{
                                            		echo "<a class='image'> <img style=width:500px;height:300px; src='uploads/images/".$row['image']."' > </a>";
                                               	}
                                               	else
                                             	if($row['image']!=0 && empty($row['youtube']))
                                               	{
                                               		echo "<a class='image'> <img style=width:500px;height:300px; src='uploads/images/".$row['image']."' > </a>";
                                               	}
                                               	else
                                             	if($row['image']==0 && !empty($row['youtube']))
                                                {
                                                	echo "<a target =_blank href=".$row['youtube']." class='image'> <img style=width:500px;height:300px; src='css/image/you.jpg'> </a>";
                                                }
                                                
                                                echo "<h3>".$row['title']."</h3>";

                                             	if($row['image']!=0)
                                               	{
                                               		echo "<p>".substr($row['texts'],0,100)."....</p>";
                                               	}
                                               	else
                                             	if(!empty($row['youtube']))	
                                               	{
                                               		echo "<p>".substr($row['texts'],0,100)."....</p>";
                                               	}
                                               	else
                                               	{
                                               		echo "<p>".substr($row['texts'],0,1000)."....</p>";
                                               	}
                                              	if($row['image']!=0 && !empty($row['youtube']))
                                               	{
                                               		echo '<ul style=float:left class="actions"><li><a target =_blank href="'.$row['youtube'].'" style=margin-right:10px; class="button">Youtube</a></li></ul>';
                                               	}
                                             	if($row['image']==0 && !empty($row['youtube']))
                                                {
                                                	echo '<ul style=float:left class="actions"><li><a target =_blank href="'.$row['youtube'].'" style=margin-right:10px; class="button">Youtube</a></li></ul>';
                                                }
                                               
                                                echo '<ul class="actions"><li><a href="index?id='.$username.'&&post='.$row['id'].'&&type=read_more" class="button" >Read More</a></li></ul>';
                                                echo "<p style=float:left;color:purple>Post No.".++$count."</p>";
                                                echo "<p style=float:right;color:purple>".$row['tim']."</p>";
                                    			
                                    			if(isset($_SESSION['u_username']) && (@$_GET['id']==@$_SESSION['u_username']) || !isset($_GET['id']))
                                                {
                                                	echo '<a style=margin-left:10px;color:purple href="index?type=edit&&post='.$row['id'].'">Edit</a>
                                                 		 <a style=margin-left:10px;color:purple href="index?type=delete&&post='.$row['id'].'&&no='.$count.'">Delete</a>';
                                                }
                                                echo '</article>';
                                      		}
                                              	if($flag==0)
                                                {  
                                           	     echo '<article> <h1 style=text-align:center;>Make Your First Blog Post.</h1> </article>';
                                                }

                                    ?>
								</div>
							</section>
							<button id="lm">Load More Post's</button>	
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="get" action="index.php">
										<input type="text" name="id"  placeholder="Search Another User.." />
									</form>
								</section>

							<!-- Menu -->

								<nav id="menu">

									<p style=color:red ><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;Beta Version 1.1</p>
									
									<?php
									 
										if(isset($_SESSION['u_username']))
									 	{ 
								 	 		echo '<p style=color:green >Logged In As : '.@$_SESSION['u_username'].'</p>';  
									 	}
									 	else
									 	{
									 		echo '<p style=color:green >Logged In As :  Viewer.</p>';  
									 	}

									?>
									
									<header class="major">
										<h2>Menu</h2>
									</header>
									
									<ul>
										<li><a href="index">Home</a></li>

                                      	<?php

                                        	if(isset($_SESSION['u_username']))
                                        	{
										  		echo '
										   		<li><a href="index.php?type=post">Post</a></li>
										   		<li><a href="index.php?type=update">Update Profile</a></li>
										    	<li id="mob" ><a class="log_btn" >Logout</a></li>';
									    	}
									    	else
                                        	{ 
                                            	echo '
                                            	<li id="mob" ><a class="log_in_btn" >Login</a></li>
                                            	<li id="mob" ><a  class="log_in_btn" >Sign up</a></li>';
                                        	}
										  
					                	?> 
					                	<li><a style="color:red" href="mailto:anuragvns1111@gmail.com">Send Feedback</a></li>
					                </ul>
								</nav>

								<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									
									<ul class="contact">
									<?php
										echo '
										<li class="fa-envelope-o"><a href="mailto:'.@$em.'">'.@$em.'</a></li>';
								        echo '
										<li><a target=_blank href="'.@$tw.'" class="icon fa-twitter"><span style=margin-left:10px; >Twitter</span></a></li>
										<li><a target=_blank href="'.@$fb.'" class="icon fa-facebook"><span style=margin-left:10px; >Facebook</span></a></li>
   										<li><a target=_blank href="'.@$in.'" class="icon fa-instagram"><span style=margin-left:10px; >Instagram</span></a></li>
   										<li><a target=_blank href="'.@$we.'" class="icon fa-dribbble"><span style=margin-left:10px; >Website</span></a></li>
										<li><a target=_blank href="'.@$li.'" class="icon fa-linkedin-square"><span style=margin-left:10px; >Linkdin</span></a></li>';
                                    ?>
                                              	
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy;  All rights reserved. 2017</p>
									<p>Designed And Made By <a href="https://anu1601cs.github.io/my_web/index">Anurag</a></p>
								</footer>

						</div>
					</div>

			</div>

     <!-- Scripts -->

<!-- To load more post -->              
	<script >
          
    $(document).ready(function(){
          var commentcount=4;
          $("#lm").click(function(){
          
          	 commentcount=commentcount+2;
          	   $(".posts").load("load.php",{
                    'commentnewcount':commentcount,
                    'user':'<?php echo $username?>'
                  });
               });
           });
    </script> 

    <script>  	
	$(document).ready(function() {
         var isshow = localStorage.getItem('<?php echo $username?>');
        	 if (isshow== null) {
           	localStorage.setItem('<?php echo $username?>', 1);
          	$('#popup').show();
                 }
         	});
        	 var close = document.getElementsByClassName("al");
         	var i;

        	for (i = 0; i < close.length; i++) {
       		 close[i].onclick = function(){
        		var div = this;
        		div.style.opacity = "0";
        		setTimeout(function(){ div.style.display = "none"; }, 600);
         	}
         }
		$(document).ready(function(){
       	$(".al").click(function(){
		window.open('update', '_blank');
        });
  	});
   	</script>
     

			
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
    	<script src="js/script.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	</body>
</html>