<?php 
require 'db_connect.php';
$id=$_POST['id'];
$name=$_POST['name'];
$brand=$_POST['brand'];
$subcategory=$_POST['subcategory'];
$codeno=$_POST['codeno'];
$price=$_POST['price'];
$discount=$_POST['discount'];
$description=$_POST['description'];
$image=$_FILES['image'];
$oldphoto=$_POST['oldphoto'];
$file_path=$oldphoto;


if($image['size']>0)
{
//unlink($oldphoto);

$source_dir="image/item/";
 $file_name=mt_rand(100000,999999);
 $file_exe_array=explode('.', $image['name']);
 $file_exe=$file_exe_array[1];
 $file_path=$source_dir.$file_name.'.'.$file_exe;
 move_uploaded_file($image['tmp_name'], $file_path);

}

$sql="UPDATE items SET photo=:photo, name=:name, brand_id=:brand, subcategory_id=:subcategory, codeno=:codeno, price=:price, discount=:discount, description=:description, photo=:photo WHERE id=:id";

$stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->bindParam(':brand',$brand);
 $stmt->bindParam(':subcategory',$subcategory);
 $stmt->bindParam(':codeno',$codeno);
 $stmt->bindParam(':price',$price);
 $stmt->bindParam(':discount',$discount);
 $stmt->bindParam(':description',$description);
 $stmt->bindParam(':photo',$file_path);
 $stmt->bindParam(':name',$name);

 //var_dump($stmt);die();
 $stmt->execute();

if($stmt->rowCount()){
 	header("location:item_list.php");
 }else{
 	echo "Error";
 }

 ?>

 ?>
