<html>
<body>
	<table class="table table-bordered">
	<tr bgcolor=aqua><td align=center><font SIZE=5 color=white>Archives</font></td></tr>
	<tr><td><table align=center width=710 cellspacing=0 cellpadding=5>
	</table></td></tr>
	<table  width=650 cellspacing=0 cellpadding=5>
	<tr bgcolor=#ccccc><th align="left">Seller name</th><th align="left">Type</th><th align="left">Property name</th></th>
	<th align="left">Location</th><th align="left">Price</th><th align="left">Number</th><th align="left">image</th>
	<th align="left">Buyer name</th><th align="left">Amount paid</th> 
</tr>
	<?php
	$db=new PDO("mysql:host=localhost;dbname=realestate","root","");
 	$sql="SELECT archives.*, payment.* FROM archives INNER JOIN payment ON archives.number=payment.plot";
	$result=$db->query($sql)->fetchAll(PDO::FETCH_NAMED);
 	foreach ($result as $key => $value) {
 	echo "<tr bgcolor=#eeeeee>";
 	echo "<td>".$value['email']."</td>";
 	echo "<td>".$value['type']."</td>";
 	echo "<td>".$value['propname']."</td>";
 	echo "<td>".$value['proploc']."</td>";
 	echo "<td>".$value['price']."</td>";
 	echo "<td>".$value['number']."</td>";
 	echo "<td>".$value['image']."</td>";
 	echo "<td>".$value['name']."</td>";
 	echo "<td>".$value['amount']."</td>";
 	echo "</tr>";
 	}
 		?>
 		
</table>
</table>
</body>
</html>