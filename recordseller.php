<!DOCTYPE html>
<html>
<head>
	<title>sellerrecords</title>
</head>
<body>
    <table>
    <tr bgcolor=#7fa9ff><td align=center><font SIZE=6 color=white>SELLERS</font></td></tr>
    <tr><td><table align=center width=80% cellspacing=0 cellpadding=10>        
        <th>Name</th>
        <th>Phone</th>
        <th>Location</th>
        <th>E-mail</th>
	<?php 
	 $pdo=null;
            try{
                $pdo=new PDO("mysql:host=localhost;dbname=realestate","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $pdoe){
                echo $pdoe->getMessage();
            }
            $query="SELECT name,phone,location,email FROM users";
            $stmnt=$pdo->prepare($query);
            $stmnt->execute();
            $results=$stmnt->fetchAll(PDO::FETCH_OBJ);
            $stmnt->closeCursor();
            foreach ($results as $key => $value) {
 			echo "<tr>";
 			echo "<td>".$value->name."</td>";
 			echo "<td>".$value->phone."</td>";
 			echo "<td>".$value->location."</td>";
 			echo "<td>".$value->email."</td>";
 			echo "</tr>";
 	}
	 ?>
     </table>
</body>
</html>