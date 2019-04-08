<html>
<body>
	<table class="table table-bordered">
	<tr bgcolor=aqua><td align=center><font SIZE=5 color=white>Properties</font></td></tr>
	<tr><td><table align=center width=650 cellspacing=0 cellpadding=5>
	</table></td></tr>
	<table  width=650 cellspacing=0 cellpadding=5>
	<tr bgcolor=#ccccc><th align="left">Type</th><th align="left">Property name</th></th>
	<th align="left">Location</th><th align="left">Price</th><th align="left">Number</th><th align="left">image</th><th align="left">Update</th><th align="left">Delete</th><th 
</tr>
	<?php
	$db=new PDO("mysql:host=localhost;dbname=realestate","root","");
 	$sql="SELECT * FROM realestate order by id asc";
	$result=$db->query($sql)->fetchAll(PDO::FETCH_NAMED);
 	foreach ($result as $key => $value) {
 	echo "<tr bgcolor=#eeeeee>";
 	echo "<td>".$value['type']."</td>";
 	echo "<td>".$value['propname']."</td>";
 	echo "<td>".$value['proploc']."</td>";
 	echo "<td>".$value['price']."</td>";
 	echo "<td>".$value['number']."</td>";
 	echo "<td>".$value['image']."</td>";
 	echo "<td>"."<a href=update.php>UPDATE</a>"."</td>";
 	echo "<td>"."<a href=delete.php>DELETE</a>"."</td>";
 	echo "</tr>";
 	}
 		?>
 		
</table>
</table>
</body>
</html>