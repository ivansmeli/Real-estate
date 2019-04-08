<?php
require("dbconn.php");
if(isset($_POST['update'])){
	header("location:adminview.php");
$location=$_POST['location'];
$name=$_POST['propname'];
$number=$_POST['number'];
$price=$_POST['price'];
$type=$_POST['type'];
$update="UPDATE realestate SET  type='$type' ,propname='$name',proploc='$Location',price='$price',numb
='$number'WHERE name='$name'" or die("failed".mysql_error());
$stmnt=$conn->prepare($update);
            $stmnt->execute();
}
 
$query="SELECT * FROM realestate";
            $stmnt=$conn->prepare($query);
            $stmnt->execute();
            $results=$stmnt->fetchAll(PDO::FETCH_NAMED);
            $stmnt->closeCursor();

            foreach ($results as $key => $value) {
$name=$value['propname'];
$type=$value['type'];
$proploc=$value['proploc'];
$number=$value['number'];
$price=$value['price'];


echo'<form action="update.php" method="post"><br>
	Type:<br><input type="text" name="type" value="' . $name .'"><br>
	Name:<br><input type="text" name="propname" value=""><br>
    Location:<br><input type="text" name="location" value=""><br>
    Price:<br><input type="text" name="price" value=""><br>
   number:<br><input type="text" name="number" value=""><br>
   <br><input type="submit" value="UPDATE" name="update">
   </form>
    '
    ;
}

?>

	


