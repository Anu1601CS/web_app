<!DOCTYPE html>
<html>
<style>
form {
    
    font-family: Arial;
}

.container {
    padding: 20px;
    background-color: #f1f1f1;
}

input[type=text]{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    
}

input[type=submit] {
    width: 10%;
    padding: 13px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    cursor: pointer;
}

input[type=checkbox] {
    margin-top: 16px;
}

input[type=submit] {
    background-color:green;
    color: white;
    border: none;
}

input[type=submit]:hover {
    opacity: 0.8;
}

body{
  text-align: center;

}

a{
    background-color:green;
    color: white;
    border: none;
    padding: 15px 60px;
    cursor: pointer;
    text-decoration: none;
}

a:hover{
    opacity: 0.8;
}

</style>
<body>

<h2>Oops..  #Error 404 Page not found</h2>

<form action="../blog/index.php">
  <div class="container">
    <h2>The Page You Looking For Not Found.</h2>
  </div>

  <div class="container" style="background-color:white">
    <input type="text" placeholder="Enter username..." name="id" required>
    <input type="submit" value="Search">
    
  </div>

  
</form>
<br><br>
 <a href="../" id="login" >Go Back</a>&nbsp;&nbsp;&nbsp;<a href="../" id="login" >Login</a>

</body>
</html>
