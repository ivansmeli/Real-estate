<?php
$msg="";
if(isset($_POST['add'])){
$type=$_POST["type"];
$propname=$_POST['propname'];
$proploc=$_POST['proploc'];
$price=$_POST['price'];
$number=$_POST['number'];
$image=$_FILES['image']['name'];
define('host','127.0.0.1');
define('username', 'root');
define('password', '');
define('dbname', 'realestate');
$target="images/".basename($_FILES['image']['name']);
$conn=new mysqli(host, username, password, dbname);	
$insert =("INSERT INTO `realestate` (`type`,`propname`,`proploc`,`price`,`number`,`file`)VALUES('$type','$propname','$proploc','$price','$number','$image')");
$result=$conn->query($insert); 
if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
	$msg="image uploaded successfully";

}
else{
	$msg="there was a problem uploading your image";
}
}
?>