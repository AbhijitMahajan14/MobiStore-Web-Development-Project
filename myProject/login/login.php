<?php
session_start();
include('config.php');
if(isset($_POST['login']))
{
  $email=$_POST['useremail'];
  $password=md5($_POST['password']);
  $query=mysqli_query($con,"call login('$email','$password')");
$num=mysqli_fetch_array($query);
if($num>0)
{
$_SESSION['login']=$_POST['useremail'];
header("location:http://localhost/myProject/#");
}
else
{
$_SESSION['login']=$_POST['useremail'];
echo "<script>alert('Invalid  login details');</script>";
$extra="login.php";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Store Procedure</title>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #007bff;;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

.container {
padding:200px 300px 300px 300px;

}
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
       </head>
<body>

    <form class="login-form" method="post">
<div class="container">
<label for="email"><b>Email</b></label>
      <input type="text" placeholder="Email id" name="useremail" required />

      <label  for="password"><b>Password</b></label>     
 <input type="password" placeholder="password" name="password" required />
      <button class="registerbtn" type="submit" name="login">login</button>
      <p >Not registered? <a href="index.php">Create an account</a></p>
</div>   
 </form>
 
<script >
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
</body>
</html>