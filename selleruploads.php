<?php
session_start();
if(isset($_SESSION['email'])){
	$sesion=$_SESSION['email'];
}
else{
	header("header:Location=index.php");
}

?>
<?php
$msg="";
if(isset($_POST['add'])){
$target="images/".basename($_FILES['image']['name']);
$target2="images/".basename($_FILES['imagever']['name']);
$email=$_SESSION['email'];
$type=$_POST["proptype"];
$propname=$_POST['propname'];
$proploc=$_POST['proploc'];
$description=$_POST['description'];
$price=$_POST['price'];
$number=$_POST['number'];
$image=$_FILES['image']['name'];
$imagever=$_FILES['imagever']['name'];
define('host','127.0.0.1');
define('username', 'root');
define('password', '');
define('dbname', 'realestate');

$conn=new mysqli(host, username, password, dbname);	
$insert ="INSERT INTO `realestate` (`email`,`type`,`propname`,`proploc`,`descr`,`price`,`plotno`,`image`,`imagever`)VALUES('$email','$type','$propname','$proploc','$description','$price','$number','$image','$imagever')";
$result=$conn->query($insert); 
if($insert){
if(copy($_FILES['image']['tmp_name'],$target)&& copy($_FILES['imagever']['tmp_name'],$target2) ){
	$msg="image uploaded successfully";
echo "<script type='text/javascript'>alert('$msg');</script>";
}
else{
	$msg="there was a problem uploading your image";
	echo "<script type='text/javascript'>alert('$msg');</script>";
}
}
else{
    echo "<script type='text/javascript'>alert('Duplicate Entry For Plot Number');</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../dhis2/resource/bootstrap.min.css">
   <script type="text/javascript" src="../dhis2/resource/bootstrap.min.js"></script>
	<script type="text/javascript" src="../dhis2/resource/jquery.min.js"></script>
	<title></title>
	<style type="text/css">


	 .dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}



.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    

}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
#frm{
border:solid gray 1px;
width:40%;
height: 60%;
border-radius:5px;
margin:50px auto;
background:#7fa9ff;
padding:80px;

}
#btn{
color:#fff;
background:#337ab7;
padding:1px;
margin-left:50%;
}
body{
	background-color: #e5e4d7;
}
</style>	
</head>
 <header id="header">
    <div class="container" style="margin-left: 90%">
    <div class="dropdown">
  <button class="dropbtn">Profile</button>
  <div class="dropdown-content">
    <a href="#"><?php echo $_SESSION["email"]?></a>
    <a href="sellerpay.php">Payments</a>
     <a href="sellerview.php">Accounts</a>
    <a href="logout.php">Sign Out</a>   
  </div>
</div>
</div>
</header>
</body>
</html>
<body>
	<div id="frm">
        <div class="form-inline">
<form action="selleruploads.php" method="post" enctype="multipart/form-data">
Property Type:<select name="proptype">
		<option name="rentals">Houses To let</option>
		<option name="Land">Land</option>
		<option name="housesforsale">Houses for sale</option>
	</select>
	<br><br>
Seller Email:<input type="text" name="email" value="<?php echo $_SESSION['email'];?>"disabled><br><br>
Property Name:<input type="text" name="propname"><br><br>
Location:<input type="text" name="proploc"><br><br>
Description:<textarea input type="text" name="description"></textarea><br><br>
Price:<input type="text" name="price"><br><br>
Number:<input type="text" name="number"><br><br>
Property Image:<input type="file" name="image"><br><br>
Property Document:<input type="file" name="imagever"><br><br>
<input type="submit" name="add" value="Add">
</form>
</div>
</div>
</body>
</html>