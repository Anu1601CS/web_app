
<?php



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
<!--
	Front End - HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<!--

   Back End - Anu1601CS
   PHP-javascript 

-->

<html>
	<head>
		<title>Editorial by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
 
		
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
                         

						<div class="inner">
							<?php
                             
                             if(@isset($_SESSION['u_username']))
                             {

                             	 echo '<form action="includes/logout.inc.php" method="POST">
                                  <button style=float:right; type="submit" name="submit">Logout</button>
                                  </form>'; 
                             }
                             else
                             { 

                             	echo '<form action="login.php" method="POST">
                                  <button style=float:right;margin:10px; type="submit" name="submit">Sign Up</button>
                                  </form>'; 

                             	echo '<form action="login.php" method="POST">
                                  <button style=float:right;margin:10px; type="submit" name="submit">Login</button>
                                  </form>'; 
                             }
                            

                             ?>

							<!-- Header -->
								<header id="header">

									
									<ul class="icons">
										
										<?php
										echo '
										<li><a href="'.@$tw.'" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="'.@$fb.'" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									
   										<li><a href="'.@$in.'" class="icon fa-instagram"><span class="label">Website</span></a></li>
										<li><a href="'.$li.'" class="icon fa-linkedin-square"><span class="label">Linkdin</span></a></li>
										<li><a href="'.$we.'" class="icon fa-snapchat-ghost"><span class="label">Website</span></a></li>
                                         ';
										?>

									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											   <?php
                                                 
                                                // $username=$_SESSION['u_name']; 
                                                 echo "<h1>Hi, I'm ".@$na."</h1>";
											   ?>

                                        </header>
									<?php	
										echo '<p>'.$bi.'</p>';
										?>
										<ul class="actions">
											<li><a href="#" class="button big">Learn More</a></li>
										</ul>

									</div>
									<span class="image object">
										<?php
										$user_logo='image';
										 echo '<img style="height:300px;width:500px;" src="uploads/'.$username.'/'.$user_logo.'"> <br>';
									   ?>
									</span>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>About me!</h2>
									</header>

									<div class="features">
									
										<article>
											<span class="icon fa-diamond"></span>
											<div class="content">
												<h3>Portitor ullamcorper</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									
										<article>
											<span class="icon fa-paper-plane"></span>
											<div class="content">
												<h3>Sapien veroeros</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									
										<article>
											<span class="icon fa-rocket"></span>
											<div class="content">
												<h3>Quam lorem ipsum</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
										</article>
									
										<article>
											<span class="icon fa-signal"></span>
											<div class="content">
												<h3>Sed magna finibus</h3>
												<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
											</div>
								 	</article>

									</div>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>My Blog</h2>
									</header>
									<div class="posts">

										  
										<?php
                                     
                                        @$sql="SELECT * FROM uploaded_image WHERE username='$username'";
                                        @$result=mysqli_query($conn,$sql);
                                        $flag=0;
                                        while ($row = @mysqli_fetch_array($result)) 
                                           { 
                                              $flag=1;
                                            echo '<article>';

                                              if($row['image']!=0)
                                               {
                                            echo "<a class='image'> <img style=width:500px;height:300px; src='uploads/images/".$row['image']."' > </a>";
                                               }

                                            echo "<h3>".$row['title']."</h3>";
                                            echo "<p>".substr($row['texts'],0,100)."....</p>";
                                            echo '<ul class="actions"><li><a href="#" class="button">Read More</a></li></ul>';
                                             echo "<p style=float:right>".$row['tim']."</p>";
                                            echo "<p style=float:left>No.".$row['id']."</p>";
                                           
                                            echo '</article>';
                                           }

                                           if($flag==0)
                                           {  
                                           	echo '<article>
                                           	     <h1 style=text-align:center;>Make Your First Blog Post.</h1>
                                                 </article>';
                                            }
                                        ?>

                               </div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->

								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="../">Home</a></li>

                                      <?php

                                         if(isset($_SESSION['u_username']))
                                         {
										   echo '
										   <li><a href="post.php">Post</a></li>
										   <li><a href="delete.php">Manage Post</a></li>
										   <li><a href="update.php">Update Profile</a></li>';
									     }
					                	?> 
					                	</ul>
								</nav>
                                 
					

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>Sed varius enim lorem ullamcorper dolore aliquam aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin sed aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
									<ul class="contact">
									<?php
										echo '<li class="fa-envelope-o"><a mailto:'.$em.'>'.$em.'</a></li>
										<li class="fa-phone">(000) 000-0000</li>
										<li class="fa-home">1234 Somewhere Road #8254<br />
										Nashville, TN 00000-0000</li>';
                                               ?>								
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>