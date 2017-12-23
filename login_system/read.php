<?php session_start();

	include_once 'includes/dbh.inc.php';

	if(isset($_SESSION['u_username']))
	{
	   @$username=$_SESSION['u_username'];	
	}
	else
	{  
	   
	   $error="You Must Be logged. To Read More.";
	   $_SESSION['error']=$error;
	   header("Location: login?You must Be Login.");
	   exit();
	}


	if(isset($_GET['id']))
	{
	  @$username=mysqli_real_escape_string($conn ,$_GET['id']);
	}

	@$name=$_SESSION['u_name'];
	@$post=mysqli_real_escape_string($conn ,$_GET['post']);
	@$sql="SELECT * FROM uploaded_image WHERE username='$username' AND id='$post' ";
	@$result=mysqli_query($conn,$sql);
	$result_check=mysqli_num_rows($result);
	$row = @mysqli_fetch_array($result);

	if($result_check>=1)
	{
	  @$sql="SELECT * FROM login WHERE username='$username' ";
      @$result=mysqli_query($conn,$sql);  
      @$row1= @mysqli_fetch_array($result);
	}
    else
	{
		header("Location: includes/error.inc.php?error user ".$username);
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<?php echo '<title>'.$name.'</title>'?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/readmain.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

<!--Script -->
		
 <script >
    
    $(document).ready(function(){
              
           var count=6;

	  	  $("#lm").click(function(){

	  	  	     count=count+3;

                 $("#pp").load("readload.php",{
                    'commentnewcount':count,
                    'user':'<?php echo $username?>'
                    
                });
    	   });
               
	  });

    
    $(document).ready(function(){
              
           var count=3;
           

	  	  $("#co_lm").click(function(){

	  	  	     count=count+3;

                 $("#co").load("cload.php",{
                    'count':count,
                    'user':'<?php echo $username?>',
                    'post':'<?php echo $post?>'
                    
                    
                });
    	   });
               
	  });

  
  $(document).ready(function(){

	 var count=1;

        $(".com_btn").click(function(){
             
            var text=$("#text").val();        
            var id=<?php echo $post ?>;

            if(text=="")
            {
            	window.alert("Please Fill Input Field.");
            }
             
          $.post("includes/commit.inc.php",
           { 

             text:text,
             id:id,
           },
             
          function(data,status){

                if(status=="success")
                {
                     $("#text").val("");
                    
                     count=count+1; 

                     $("#co").load("cload.php",{
                    'count':count,
                    'user':'<?php echo $username?>',
                    'post':'<?php echo $post?>'
             
                     });
                }
           
           });
                   
       });
   });

</script>
</head>
<body>
	<h1 style="text-align: center;color: red" >WELCOME TO BLOG</h1>
	<!-- Wrapper -->
	<div id="wrapper">
	<!-- Main -->
		<div id="main">
	<!-- Post -->
			<article class="post">
				<?php
  					echo '	<header>
								<div class="title">
									<h3 style=color:red>'.$row['title'].'</h3>
								</div>
								<div class="meta">
									<time class="published" >Published : '.$row['tim'].'</time>
									<a href="#" class="author"><span class="name">By User : '.$row1['name'].'</span></a>
								</div>
							</header>';

								if($row['image']!=0)
								{

							    echo '<a href="uploads/images/'.$row['image'].'" class="image featured"><img src=uploads/images/'.$row['image'].' /></a>';
								echo '<p>'.$row['texts'].'</p>';
								
								}
								
		                                    if(!empty($row['youtube']))
		                                     { 
		                                	   echo '<ul class="actions">
											       <li><a href="'.$row['youtube'].'" class="button">Youtube</a></li>
										           </ul>';
						                     }
                                
                              	?>
                             		<!-- <ul class="stats">
										
										 <a href="#" title="Total Likes" class="icon fa-heart">28</a>&nbsp;&nbsp;&nbsp;&nbsp;
										 <a href="#" title="Total Commit" class="icon fa-comment"></a>
									</ul>

							    -->
                                     	
                          </article>
                            
                                
                            	<input type="text" name="commit" placeholder="Commit Your Comment" id="text" required>
                            	  <br>
                            	<button class="com_btn" >Commit</button> 
                            	 
                                   <br>
                                   
                                   <hr>
                                  <h1 style="text-align: center;color:red">Comments	</h1>	
                             <article id="co">

                            <?php

							      @$sql="SELECT * FROM commits WHERE post='$post' ORDER BY id DESC LIMIT 3";
                                  @$result=mysqli_query($conn,$sql);
                                     

                                  while ($row = @mysqli_fetch_array($result)) 
                                     {
								         
								               	            
                                        if($row['username']==$_SESSION['u_username'])
                                         {      
										  echo '<a href="index?p='.$row['id'].'&type=cd&&no='.$post.'&&us='.$username.'" style=float:right;font-size:30px;>x</a>';
                                         }

                                          echo '<h3 style="	color:red" >User : '.$row['username'].'</h3>
												<p style =margin:0!important;><b>Comment</b> : '	.$row['texts'].'</p>
												<p>'.$row['tim'].'</p>
										        <hr>';
											 
								     }
							
                             ?>
											     
                           
										
									    
                            		
                             </article>

                                  <button id="co_lm">Load More Comments</button>
                           
                                

					</div>

				<!-- Sidebar -->
					<section id="sidebar">

						<!-- Posts List -->
							<section id="pp">

								<h4 style="color: red">Other Post</h4>

								<?php

								@$sql="SELECT * FROM uploaded_image WHERE username='$username' ORDER BY id DESC LIMIT 6";
                                      @$result=mysqli_query($conn,$sql);
                                     
                                    
                                  while ($row = @mysqli_fetch_array($result)) 
                                     {
                                     	

								echo '<ul class="posts">
									<li>
										<article>
											<header>
												<h3><a href="index.php?type=read_more&&post='.$row['id'].'&id='.$username.'">'.$row['title'].'</a></h3>
												<time class="published" datetime="2015-10-20">'.$row['tim'].'</time>
											</header>
										
										</article>
									</li>';	
								     }
							
                                  ?>
                                   
                                   <br>
                                 
                          <button id="lm">Load More Post's</button>

							
							</section>

						

						<!-- About -->
							<section class="blurb">
								<h2 style="color: red">About Me !</h2>
                              <?php

                              @$sql="SELECT * FROM login WHERE username='$username' ";
                                      @$result=mysqli_query($conn,$sql);  
                                      $row = @mysqli_fetch_array($result);
                                 
								echo '<p>'.$row['bio'].'</p>';
								
								echo '<ul class="actions">
									<li><a href="'.$row['facebook'].'" class="button">Learn More</a></li>
									<li><a href="index" class="button">Home</a></li>
								</ul>';
								


								?>

							
							</section>

						<!-- Footer -->
							<section id="footer">
								<?php
								echo '<ul class="icons">
								
					                <li><a href="'.$row['twitter'].'" class="fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="'.$row['facebook'].'" class="fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="'.$row['instagram'].'" class="fa-instagram"><span class="label">Instagram</span></a></li>
									
									<li><a href="mailto:'.$row['email'].'" class="fa-envelope"><span class="label">Email</span></a></li>
									<br>
									<li><p style=color:grey; class="copyright">&copy;  All rights reserved. 2017</p><li>
								      </ul>';
							         ?>
							</section>

					</section>
			

			</div>
    
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="js/main.js"></script>
  </body>	
</html>
						

						