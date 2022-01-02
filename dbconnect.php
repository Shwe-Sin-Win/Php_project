<?php
$_Host="localhost";
$_DbName="shopulesphp";
$_User="root";
$_Password='';

//connection
try{
	$conn=new PDO("mysql:host=$_Host;dbname=$_DbName",$_User,$_Password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo "successfully connected";
}catch(PDOException $e){
	echo $e->getMessage();
}
?>