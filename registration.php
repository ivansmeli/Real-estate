<?php
if(isset($_POST['save'])){
$name=$_POST['name'];
$phone=$_POST['phone'];
$loc=$_POST['location'];
$email=$_POST['email'];
$pass=$_POST['password'];
$type=$_POST['type'];
	$conn=mysqli_connect("localhost","root","","realestate");
	$insert=$conn->query("INSERT INTO  users(`name`,`phone`,`location`,`email`,`password`,`type`)values('$name','$phone','$loc','$email','$pass','$type')");
if(!$insert){
	echo"Failed to enter data".mysqli_error($conn);
//echo"<script type='text/javascript'>alert('$sms');</script>";
}
else{
		echo"Success";
//echo"<script type='text/javascript'> alert('$sms');</script>";
//header("Location:login.php");
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" type="text/css" href="../dhis2/resource/bootstrap.min.css">
	<script type="text/javascript" src="../dhis2/resource/bootstrap.min.js"></script>
</head>
<body>
	<div class="form-control">
<form name ="myform" action="registration.php" method="post">
	Select User:<select name="type">
		<option   name="buyer"value="buyer">Buyer/Leasse</option>
		<option   name="seller"value="seller">Rental owner/Seller</option>
	</select><br>
	        <label for="name"> Full Names</label><br>
            <input type="text" name="name"><br>   
            <label for="phone">Phone</label><br><input type="text" name="phone"><br>
            <label for="location">Location</label><br><input type="text" name="location"><br>
            <label for="email">E-mail</label><br><input type="mail" name="email"><br>
            <label for="username">Password</label><br><input type="password" name="password"><br>

            <input type="submit" name="save"value="Register">
</div>
</form>
</body>
</html>