<?php

session_start();
?>


<!DOCTYPE html>
<html>
  <head>
     <title>BLOG::ANURAG</title>
     <script src="js/jquery-3.2.1.js"></script>
     <link rel="stylesheet" href="css/blogstyle.css" type="text/css">
     <link rel="icon" type="image/png"  href="css/image/blog.png">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script src="../js/parallax.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
     <link rel="stylesheet" media="screen" href="css/style.css">
     <meta name="Description" content=" Undergraduate Student at IIT-P:Computer Science And  Engineering">
     <meta name="Keywords" content="Anurag">
     <meta name="og:title" content="Major CSE At IIT-P">
     <meta name="og:url" content="https://anu1601cs.github.io/my_web/blog/blog.html">
     <meta name="og:image" content="https://anu1601cs.github.io/my_web/css/image/ubuntu.jpg">
     <meta name="theme-color" content="#4d4256">
     <meta property="og:type" content="website">	  
	  
	  
  </head>
  
  <body>







<!--MOBILE MENU SECTION-->

       <div id="menu" onclick="openNav()" >
          
           <div ></div>
           <div ></div>
           <div ></div>

        </div>
	  
	  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../index.html">HOME</a>
  <a href="#">CONTACT</a>
  <a href="#">PROJECT</a>
  <a href="#">ABOUT ME</a>
           </div>

	  
    

<!--++++++++++++++++++++++++++++++++++++++++++++++-->
<div id="main">    



<div class="parallax-window" data-parallax="scroll" data-z-index="-20" data-image-src="css/image/30.jpg">

  <div id="header">
  
   <div id="header-inner">

     
     <div id="main-nav">

     <h1 id="user"><a href="../index.html">Anurag Kumar</a> </h1>
     
     <ul id="navagation">
     
       <li><a href="../index.html">Home</a></li>
       <li><a href="../index.html" target="_blank">About me</a></li>
       <li><a href="../index.html#footer"  target="_blank">Contact</a></li>
       <li><a href="https://github.com/Anu1601CS">Project</a></li>
     
     </ul>
   
   

       </div>

      


  </div>
  <div id="blog">
 <h1 >BLOG</h1>
</div>
  
  </div>


</div>

<!--PARTICLES -->

<!--<div id="particles-js" style="position: absolute;z-index: -50"></div>-->

   <div id="content">
      
     

      <div class="row">
	     
       <div class="col-0" id="row-content" title="IIT-P">
	              
<?php

 include_once 'includes/dbh.inc.php';

$username=$_SESSION['u_username'];

$sql="SELECT * FROM uploaded_image WHERE username='$username'";

$result=mysqli_query($conn,$sql);

$flag=1;
  while ($row = @mysqli_fetch_array($result)) 
  { 
    $flag=0;
    
    echo '#'.$row['id'];
    echo "<h1 id='heading'>".$row['title']."</h1>";
    echo "<p class='descripition'>".$row['texts']."</p>";
  
    if($row['image']!=0)
    {  
    echo "<div id='img_div'>";
      echo "<img style='position:relative ;width: 100%; height: 300px;'src='uploads/images/".$row['image']."' >";
   }
      
    echo "</div>";
    

  }

  if($flag)
  {
     echo "<h1>You have not posted any articles.</h1>";
  }

?>

	      
	   </div>   
	      
	      
              
                  <div class="col-0" id="row-content" title="IIT-P">
                                
                     <img style="width: 100px; height: 100px; position:relative;" src="css/image/iitp.png">
                          <h1> <a href="https://www.iitp.ac.in/" id="heading">First Day At IIT-P</a></h1>
                           <p class="descripition">
                              I am feeling very excited on first day in <a class="link" href="https://www.iitp.ac.in/">IIT-P</a> ,I see that campus is so beautiful
                               and so big.And all bulidings are madeup  in modern style type or they have very good
                                      infrastructure.The Indian Institute of Technology Patna is an autonomous institute of education and research in science, engineering .</p>
                                      <h1 >This picture is taken by me on diwali.</h1> 
                                      <img style=" position:relative ;width: 100%; height: 300px; " src="css/image/iitpmyimage.jpg" title="iitp">
                         <h1 style="font-size: 20px;display: block;padding: 10px 10px;">TAGS</h1>
                        <a id="tags"  href="https://www.iitp.ac.in/">IIT-P</a>
                       <a id="tags"  href="http://library.iitp.ac.in/">Read more</a>

                  
                   </div>







                                    
                                    
      </div>
   
   </div>

     <div id="footer">
           
           <ul>
           <li><a href="https://www.facebook.com/Anu1601cs" target="_blank" title="facebook"><img src="css/image/png/fb.png"></a></li>
           <li><a href="https://www.instagram.com/anu1601cs/"   target="_blank"><img src="css/image/png/in.png" title="Instagram"></a></li>
           <li><a href="mailto:anurag.cs16@iitp.ac.in"><img src="css/image/png/google.png" title="Gmail"></a></li>
           <li><a href="https://github.com/Anu1601CS"   target="_blank"><img src="css/image/png/github.png" title="Github"></a></li>
           <li><a href="https://twitter.com/anu1601cs"   target="_blank"><img src="css/image/png/twitter.png" title="Twitter"></a></li>
           <li><a href="https://i.mi.com/"   target="_blank"><img src="css/image/png/cloud.png" title="Cloud"></a></li>
           </ul>
	   <div><img src='http://www.counter12.com/img-W845Z2W6YwY06133-77.gif' border='0' alt='free counter'>
	<script type='text/javascript' src='http://www.counter12.com/ad.js?id=W845Z2W6YwY06133'></script></div>  

           
     
     </div>



     <h1 style="padding: 10px 0;text-align: center;"> &copy; Copyright are reserved.</h1>




<div  id="myBtn" title="Go to top"><a href="#header"><img src="css/image/upload.png"></a></div>
 

 </div>

 
<!-- particles.js container 



<script src="js/particles.js"></script>
<script src="js/app.js"></script>

-->


<!--*****************************************************-->

<script src="../js/blogmain.js"></script>
	  
	  <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
	</body>

	  
<!--*****************************************************-->	  
