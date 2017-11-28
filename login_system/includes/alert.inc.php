<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style >

.alert {
    text-align: center;
    padding: 15px;
    background:rgba(255, 0, 0, 0.4);
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
     width: 100%;


}

.box{
  font-size: 20px;
}

.alert.success {background: rgba(111, 220, 96, 0.7);}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}

.closebtn {
    margin-left: 50px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 30px;
    font-weight:300; 
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
    z-index: 100;
}

.closebtn:hover {
    color: black;
}

</style>
</head>

<body>


<?php


@session_start();

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