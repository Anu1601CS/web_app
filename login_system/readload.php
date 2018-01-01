	<?php


session_start();
include_once 'includes/dbh.inc.php';

@$commentnewcount=$_POST['commentnewcount'];


@$username=$_POST['user'];


if(empty($username))
{
	header("Location: /");
}

                              echo '<h4 style="color: red">Other Post</h4>';

								@$sql="SELECT * FROM uploaded_image WHERE username='$username' ORDER BY id DESC LIMIT $commentnewcount";
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
                                       echo '<br>';
								     echo '<button id="lm">Load More Post"s</button>';

							
   ?>