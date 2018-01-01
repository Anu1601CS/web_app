<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style >

.alert {
    text-align: center;
    padding: 15px;
    background:#ff3838;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
    border-radius: 5px;
    

}

.box{
  font-size: 20px;
}

.alert.success {background: rgba(111, 220, 96, 0.8);}
.alert.info {background-color: #0e0ee1;}
.alert.warning {background-color: #ffcd29;}

.closebtn {
    color: white;
    font-weight: bold;
    float: right;
    font-size: 30px;
    font-weight:300; 
    line-height: 13px;
    cursor: pointer;
    transition: 0.3s;
    z-index: 100;

}

.closebtn:hover {
    color: red;
}

@media only screen and (max-width: 500px) {
    
    .closebtn{
    	font-size:20px;
    } 
    
    .box{
	font-size:15px;
  }

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

if(isset($_SESSION['warning']) && !empty($_SESSION['warning']))
{

  echo '  <div class="box "><div class="alert warning">
         <span class="closebtn">&times;</span>'  
          .$_SESSION['warning'].   
       '</div></div>';

     	 unset($_SESSION["warning"]);
}

if(isset($_SESSION['info']) && !empty($_SESSION['info']))
{

  echo '  <div class="box "><div class="alert info">
         <span class="closebtn">&times;</span>'  
          .$_SESSION['info'].   
       '</div></div>';

     	 unset($_SESSION["info"]);
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