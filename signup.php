<?php
	require 'dbconnect.php';

	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];

	$status=0;
	$file_path="image/default.png";

	$sql="INSERT INTO users(name,profile,email,password,phone,address,status) VALUES(:name,:profile,:email,:password,:phone,:address,:status)";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':profile',$file_path);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':phone',$phone);
	$stmt->bindParam(':address',$address);
	$stmt->bindParam(':status',$status);

	$stmt->execute();

	session_start();
	$_SESSION['reg_success']='Thanks! Your account has been sucessfully created and now Signed In.';

	header('Location:loginform.php');

?>