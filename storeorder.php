<?php 
require 'db_connect.php';

$cart=$_POST['cart'];
$notes=$_POST['notes'];
$total=$_POST['total'];

print_r($cart);
var_dump("Notes - ".$notes."<br>"."Total - ".$total."<br>");

//order date
$orderdate=date('Y-m-d');

date_default_timezone_set('Asia/Rangoon');

//voucherno
$voucherno=strtotime(date("h:i:s"));

//status
$status="ORDER";

// userid
session_start();
$userid=$_SESSION['loginuser']['id'];

//ORDER TABLE
$order_sql="INSERT INTO orders (orderdate, voucherno, total, note, status, user_id) VALUES (:orderdate, :voucherno, :total, :note, :status, :user_id)";
$order_stmt=$pdo->prepare($order_sql);
$order_stmt->bindParam(':orderdate', $orderdate);
$order_stmt->bindParam(':voucherno', $voucherno);
$order_stmt->bindParam(':total', $total);
$order_stmt->bindParam(':note', $notes);
$order_stmt->bindParam(':status', $status);
$order_stmt->bindParam(':user_id', $userid);
$order_stmt->execute();

//ORDERDETAIL TABLE
foreach($cart as $value)
{
	$id=$value['id'];
	$qty=$value['qty'];

	$orderdetail_sql="INSERT INTO orderdetails (voucherno, qty, item_id) VALUES (:voucherno, :qty, :item_id)";
$orderdetail_stmt=$pdo->prepare($orderdetail_sql);
$orderdetail_stmt->bindParam(':voucherno', $voucherno);
$orderdetail_stmt->bindParam(':qty', $qty);
$orderdetail_stmt->bindParam(':item_id', $id);
$orderdetail_stmt->execute();
}

 ?>