<?php
session_start();
if(isset($_SESSION['name'])){
	$session=$_SESSION['name'];
}
else{
	header("location:index.php");
}
	if(isset($_POST["submit"])){
	$plot=$_POST['plot'];	
	$acc=$_POST['acc'];
	$bank=$_POST['bank'];
	$name=$_SESSION['name'];
	$amount=$_POST['amount'];
	$pdo=null;
	try {
		$pdo=new PDO("mysql:host=localhost;dbname=realestate","root","");	
		}catch (PDOException $pdoe) {
		echo $pdoe->getMessage();
	}	
		$table=$pdo->query("CREATE TABLE if not exists buyer_payment(pid INT PRIMARY KEY AUTO_INCREMENT, plot INT, acc INT, bank VARCHAR(30),name VARCHAR(20),amount INT)");
		$insert=$pdo->query("INSERT INTO buyer_payment(plot,acc,bank,name,amount) VALUES('$plot','$acc','$bank','$name','$amount')"); 
		$update=$pdo->query("UPDATE seller_account set balance=balance+'$amount' WHERE email=(SELECT email from realestate where plotno='$plot')");
        if($insert){
        	echo "<script type='text/javascript'>alert('sucess');</script>";
        }
        else{
        	echo"<script type='text/javascript'>alert('Failed .Try fixing errors');</script>";
        }		
		}	
	?>
	<!DOCTYPE html>
<html>
<head>
	<script src="../dhis2/resource/jquery.min.js"></script>
	<title>payment</title>
</head>
<body>
	<h3>Please give your payment details here:</h3>
	<form name="payment" method="post" action="payment.php">
		<label for="number" value="number">Plot number:</label>
		<input type="text" name="plot" id="search"><br><br>	
		<label for="acc" name="acc"> Account number:</label>
		<input type="text" name="acc"><br><br>
		<label for="bank" name="bank">Bank Name:</label>
		<input type="text" name="bank" ><br><br>
		<label for="buyer" name="acc"> Buyer name:</label>
		<input type="text" name="name" value="<?php echo $session;?>" disabled><br><br>
		<label for="amount" name="acc">Amount:</label>
		<input type="text" name="amount" placeholder="Enter amount ">
		<input type="submit" name="submit" value="SUBMIT">
		<div id="result">
			
		</div>
	</form>
	<script>
$("#search").on("input",function(){
$search=$("#search").val();
if ($search.length>0){
	$.get("res.php",{"search":$search},function($data){
		$("#result").html($data);
	})
	}}
	);
	</script>
</body>
</html>
	