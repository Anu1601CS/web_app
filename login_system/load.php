<?php
session_start();

//TO LOAD MORE COMMIT 
//Written By (Anu1601CS)

include_once 'includes/dbh.inc.php';

@$commentnewcount=$_POST['commentnewcount'];
@$username=$_POST['user'];

if(empty($username))
{
	header("Location: includes/error.inc.php?error sorry d sj b f kjsbkjsb");
}

@$sql="SELECT * FROM uploaded_image WHERE username='$username' ORDER BY id DESC LIMIT $commentnewcount";
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
  if(isset($_SESSION['u_username']) && ($_SESSION['u_username']==$_POST['user']))
    {
      echo '<a style=margin-left:10px;color:purple href="index?type=edit&&post='.$row['id'].'">Edit</a>
           <a style=margin-left:10px;color:purple href="index?type=delete&&post='.$row['id'].'&&no='.$count.'">Delete</a>';
    }  
  echo '</article>';

}
 
 if($flag==0)
  {  
   echo '<article>
    <h1 style=text-align:center;>Make Your First Blog Post.</h1>                                             
        </article>';                                             
  } 
?>


                                                                                      
 
