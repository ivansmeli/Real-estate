<html>
<body>
	<table class="table table-bordered">
	<tr bgcolor=aqua><td align=center><font SIZE=5 color=white>PAYMENTS</font></td></tr>
	<tr><td><table align=center width=710 cellspacing=0 cellpadding=5>
	</table></td></tr>
	<table  width=650 cellspacing=0 cellpadding=5>
	<tr bgcolor=#ccccc><th align="left">Plot No.</th><th align="left">Account No.</th><th align="left">Bank Name</th><th align="left">Balance</th></th><th align="left">Buyer Name</th><th align="left">Buyer Bank</th><th align="left">Amount</th>
</tr>
	<?php
	$db=new PDO("mysql:host=localhost;dbname=realestate","root","");
 	$sql="SELECT selleraccount.*,payment.* FROM selleraccount INNER JOIN payment ON selleraccount.plot=payment.plot ";
	$result=$db->query($sql)->fetchAll(PDO::FETCH_NAMED);
 	foreach ($result as $key => $value) {
 	echo "<tr bgcolor=#eeeeee>";
 	echo "<td>".$value['plot']."</td>";	
 	echo "<td>".$value['accountno']."</td>";
 	echo "<td>".$value['bankname']."</td>";
 	echo "<td>".$value['balance']."</td>";
 	echo "<td>".$value['name']."</td>";
 	echo "<td>".$value['bank']."</td>";
 	echo "<td>".$value['amount']."</td>";
 	}
 		?>
 		
</table>
</table>
</body>
</html>