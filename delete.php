<?php
if(isset($_POST['id'])){
	$id=$_POST['id'];
}
if(isset($_POST['delete'])){

$db=new PDO("mysql:host=localhost;dbname=realestate","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,INFO_GENERAL));
 	if($db==true){
 		$insert=$db->query("INSERT INTO archives (SELECT * FROM `realestate` where `number`='$id')");
$sql=$db->query(" DELETE FROM   `realestate` WHERE `number`='$id'");
}
}

?>
<html>
<head>
	<title></title>
</head>

<body>
	<form action="delete.php" method="post"><br>

	ID:<br><input type="text" name="id"><br>
    
   <br> <input type="submit" name="delete" value="DELETE">
</form>
</body>
</html>