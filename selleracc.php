<?php
session_start();
if(isset($_SESSION['email'])){
	$session=$_SESSION['email'];
}
else{
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>sellerpayment</title>
</head>
<body>
	<?php
	if(isset($_POST["submit"])){	
	$acc=$_POST['acc'];
	$bankname=$_POST['bankname'];
	$email=$_SESSION['email'];

	$pdo=null;
	try {
		$pdo=new PDO("mysql:host=localhost;dbname=realestate","root","");	
		}catch (PDOException $pdoe) {
		echo $pdoe->getMessage();
	}	
		$table=$pdo->query("CREATE TABLE if not exists seller_account(sid INT PRIMARY KEY AUTO_INCREMENT,accno INT, bankname VARCHAR(30),email VARCHAR(20),balance INT)");
		$insert=$pdo->query("INSERT INTO seller_account(accno,bankname,email,balance) VALUES('$acc','$bankname','$email','0')"); 
        if($insert){
        	echo "<script type='text/javascript'>alert('sucess');</script>";
        }		
		}	
	?>
	<h3>Please give your payment details here:</h3>
	<form name="sellerpayment" method="post" action="selleracc.php">
		<label for="buyer" name="acc">Seller name:</label>
		<input type="text" name="name" value="<?php echo $session;?>" disabled><br><br>
		<label for="acc" name="acc"> Account number:</label>
		<input type="text" name="acc"><br><br>
		<label for="bank" name="bank">Bank Name:</label>
		<input type="text" name="bankname" ><br><br>	
		<input type="submit" name="submit" value="SUBMIT">
	</form>
</body>
</html>