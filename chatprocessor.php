<?php
if (isset($_POST['chatmessage']))
{
	$user=$_POST['user'];
	$receiver=$_POST['receiver'];
	$message=$_POST['message'];
	insert("chat",array("sender","receiver","message","seen"),array($user,$receiver,$message,"F"));
}
if (isset($_POST['getchat'])){
	$sender=$_POST['sender'];
	$receiver=$_POST['receiver'];
	$conversation=getConversation($sender,$receiver);
	foreach ($conversation as $key => $value) {
		if ($value->receiver==$sender){
			echo "<div class='receiver-message'><p>".$value->message."</p></div>";
		}
		else{
			echo "<div class='sender-message'><p>".$value->message."</p></div>";
		}
	}
}
function db($host="localhost",$user="root",$password="",$dbname="realestate"){
	$pdo=null;
	try{
		$pdo=new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $pdoe){
		echo $pdoe->getMessage();
	}
	return $pdo;
}
function tables(){
	$query="CREATE TABLE IF NOT EXISTS chat (id INT NOT NULL AUTO_INCREMENT,sender VARCHAR(60) NOT NULL,receiver VARCHAR(60) NOT NULL, message TEXT NOT NULL,dated TIMESTAMP DEFAULT CURRENT_TIMESTAMP, seen ENUM('T','F') NOT NULL,PRIMARY KEY (id), INDEX (sender), INDEX (receiver))Engine=InnoDB COMMENT='Stores chat'";
	$stmnt=db()->prepare($query);
	$stmnt->execute();
	if ($stmnt->errorCode()=="00000"){
		$stmnt->closeCursor();
		return true;
	}
}
function insert($table,$columns=array(),$values=array())
{
	tables();
	if (count($columns)!=0 && count($values)!=0)
	{
		$columns_string=":".implode(",:", $columns);
		$query="INSERT INTO ".$table." (".implode(",",$columns).") VALUES (".$columns_string.")";
		$stmnt=db()->prepare($query);
		for ($i=0;$i<count($values);$i++)
		{
			$stmnt->bindValue(":".$columns[$i],$values[$i]);
		}
		$stmnt->execute();
		if ($stmnt->errorCode()=="00000"){
			$stmnt->closeCursor();
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
function getConversation($sender,$receiver){
	$query="SELECT * FROM chat WHERE sender=:sender OR receiver=:sender";
	$stmnt=db()->prepare($query);
	$stmnt->bindParam(":sender",$sender);
	$stmnt->bindParam(":receiver",$receiver);
	$stmnt->execute();
	$results=$stmnt->fetchAll(PDO::FETCH_OBJ);
	$stmnt->closeCursor();
	return $results;
}
?>