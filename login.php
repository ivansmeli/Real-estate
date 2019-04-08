<?php
session_start();
if(isset($_POST['login'])){
   if(!empty($_POST['username']) && !empty($_POST['password'])){
$username=$_POST['username'];
$password=$_POST['password'];
//to prevent mysql injection
$username=stripcslashes($username);
$password=stripcslashes($password);
mysql_connect("localhost","root","");
mysql_select_db("realestate");
$result=mysql_query("SELECT * FROM users WHERE username='$username' && password='$password'")
or die("Failed to query database".mysql_error());
$row =mysql_fetch_array($result);
if($row['username']==$username && $row['password']==$password && $row['type']=='buyer')
{
   $_SESSION["name"]=$username;
   $_SESSION["message"]="Login Succesful";
 header("Location:buyer.php");
}
else if($row['username']==$username && $row['password']==$password && $row['type']=='seller')
{
   $_SESSION["email"]=$username;
   $_SESSION["message"]="Welcome"+$username+"You can now post Your Property";
 header("Location:selleruploads.php");
}
elseif($row['username']==$username && $row['password']==$password && $row['type']=='admin'){
   header("Location:navigation.php");
}
else{
$sms="password or username incorrect";
  echo "<script type='text/javascript'>alert('$sms');</script>";
 include("login.php");
}
}
else{
   $_SESSION["message"]="Please fill ALL fields to continue";
    header("location:login.php");
 die();
}
}
?>
<html>
<head>
<script type="text/javascript" href="userverify.js"></script>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="stylesheet" type="text/css" href="../dhis2/resource/bootstrap.min.css">
<script type="text/javascript" src="../dhis2/resource/bootstrap.min.js"></script>
<title></title>
<style type="text/css">
.frm{
border:solid gray 1px;
width:40%;
border-radius:5px;
margin:100px auto;
padding:5px;
background-image:url("images/pex.jpeg");
}
   </style>
</head>
<body>
   <?php
if(isset($message)) {
echo $message;
}
?>
   <div class="frm">
   <form name ="myform" method="post" action="login.php">
      <div class="form-group">
      <label for="username" class="col-sm-2 control-label">Username:</label>
      <div class="col-sm-10">
         <input type="email" class="form-control" name="username" 
            placeholder="Enter email">
      </div>
   </div>
   <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-10">
         <input type="password" class="form-control" name="password" 
            placeholder="Enter Your password">
      </div>
   </div>
   <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <div class="checkbox">
            <label>
               <input type="checkbox"> Remember me
            </label>
         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" class="btn btn-default" name="login">Login</button> 
      </div>
   </div>
     <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
         <a href="registration.php">Register</a>
      </div>
   </div>
   </form>
</div>
<div id="error"></div>
</body>
</html>
