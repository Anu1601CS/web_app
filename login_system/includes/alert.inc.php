<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/signup.css" type="text/css">

</head>

<body>


<?php


session_start();

if(isset($_SESSION['error']) && !empty($_SESSION['error']))
{

  echo '<div class="box" ><div class="alert">
         <span class="closebtn">&times;</span>'  
          .$_SESSION['error'].   
       '</div></div>';

       unset($_SESSION["error"]);
}

if(isset($_SESSION['success']) && !empty($_SESSION['success']))
{

  echo '  <div class="box "><div class="alert success">
         <span class="closebtn">&times;</span>'  
          .$_SESSION['success'].   
       '</div></div>';

       unset($_SESSION["success"]);
}



?>


<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}

</script>
</body>
</html>