<?php
include('config.php');
if(isset($_POST['register']))
{
 $fname=$_POST['fname'];
 $email=$_POST['email'];
 $password=md5($_POST['password']);
$query=mysqli_query($con,"call registration('$fname','$email','$password')");
if($query)
{
echo "<script>alert('Registration Successfull');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
else
{
echo "<script>alert('Something went wrong. Please try again.');</script>";
echo "<script>window.location.href='index.php'</script>"; 
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Registration using Store Procedure</title>
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
  background-color:#007bff;
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
padding:100px 300px 150px 300px;

}
/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</head>
<body>
<form class="form-horizontal"  method="post">

    <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
     

      <label  for="fname"><b>Full Name</b></label>
     
        <input type="text" id="name" name="fname" placeholder=""  required>

     <label for="email"><b>Email</b></label>
     
        <input type="text" id="email" name="email" placeholder="" required>

   
      <label  for="password"><b>Password</b></label>
  
        <input type="password" id="password" name="password" placeholder="" >
<hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
     
 
        <input  class="registerbtn" id="submit" type="submit" value='Register' name="register">

    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html>