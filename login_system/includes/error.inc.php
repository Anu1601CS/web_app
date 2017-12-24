<!DOCTYPE html>
<html>
<style>
form {
    
    font-family: Arial;
}

.container {
    padding: 20px;
    background-color:transparent;    
}

input[type=text]{
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    outline: 0;
    background: #f2f2f2;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    border-radius: 3px;
    box-sizing: border-box;
    font-size: 14px;
    color: black;

    
}

input[type=submit] {
    width: 30%;
    padding: 13px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    cursor: pointer;
    outline: 0;
    background: #f2f2f2;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    border-radius: 3px;
    box-sizing: border-box;
    font-size: 14px;
    color: black;
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

h2{
    color: white;
}

a{
    background-color:green;
    color: white;
    border: none;
    padding: 15px 60px;
    cursor: pointer;
    text-decoration: none;
    border-radius: 3px;
}
a:hover
{
    opacity: 0.8;
}

body
    {
        background-image: url("../images/header.jpg");
    }


    @media only screen and (max-width: 500px) {
    

    input[type="text"]{
      width: 100%;
    }

    input[type="submit"]{
        width: 100%;
    }    
}



</style>
<body>

<h2>Oops..  #Error 404 Page not found</h2>

<form action="../index">

  <div class="container">   
    <h2>The Page You Looking For Not Found.</h2>
  </div>

  <div class="container">
    <input type="text" placeholder="Enter username..." name="id" required><br>
    <input type="submit" value="Search">
    
  </div>

  
</form>
<br><br>
 <a href="../" id="login" >Go Back</a>&nbsp;&nbsp;&nbsp;<a href="../login" id="login" >Login</a>

</body>
</html>
