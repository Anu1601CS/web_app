<?php

session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Image Upload</title>

  <style>
    #content{
      width: 50%;
      margin: 20px auto;
      border: 1px solid #cbcbcb;
    }
    form{
      width: 50%;
      margin: 20px auto;
    }
    form div{
      margin-top: 5px;
    }
    #img_div{
      width: 80%;
      padding: 5px;
      margin: 15px auto;
      border: 1px solid #cbcbcb;
    }
    #img_div:after{
      content: "";
      display: block;
      clear: both;
    }
    img{
      float: left;
      margin: 5px;
      width: 300px;
      height: 140px;
    }
    a{
      text-decoration: none;
      color: black;
    }
    body{
      text-align: center;
    }
  </style>
</head>
<body>
</body>

<?php

$username=$_SESSION['u_username'];
echo '<h1>'.$username.'</h1>';
echo '<button><a href="upload.php">HOME</a></button>';
echo '<button><a href="post.php">Post Article</a></button>';



?>
<div id="content">
<?php

 include_once 'includes/dbh.inc.php';
 $id='11';
$username=$_SESSION['u_username'];

$sql="SELECT * FROM uploaded_image WHERE username='$username'";

$result=mysqli_query($conn,$sql);

$flag=1;
  while ($row = @mysqli_fetch_array($result)) 
  { 
    $flag=0;

    $imag='ksdfkdfnj';
    
    echo '#'.$row['id'];
    echo "<h1>".$row['title']."</h1>";
    
  
    if($row['image']!=0)
    {  
    echo "<div id='img_div'>";
      echo "<img src='uploads/images/".$row['image']."' >";
   }
      echo "<p>".$row['texts']."</p>";
    echo "</div>";
    

  }

  if($flag)
  {
     echo "<h1>You have not posted any articles.</h1>";
  }

?>

</div>
</body>
</html>