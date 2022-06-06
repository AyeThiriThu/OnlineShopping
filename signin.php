<?php 
require 'db_connect.php';
session_start();

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email=:email AND password=:password";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(":email",$email);
$stmt->bindParam(":password",$password);
$stmt->execute();

//if exist email and password
if($stmt->rowCount()){


	$user=$stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['loginuser']=$user;
	$roleid=$user['role_id'];
	//var_dump($roleid);

	if($roleid==2)
	{
	 header("location:index.php");

	 }
	 else{
	 	header("location:category_list.php");
	 }
 }
 else{
 	header("location:login.php");
 }

 ?>
