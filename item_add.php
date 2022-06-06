<?php 
 require 'db_connect.php';

 $brand=$_POST['brand'];
 $subcategory=$_POST['subcategory'];
 $codeno=$_POST['codeno'];
 $name=$_POST['name'];
 $image=$_FILES['image'];
 $price=$_POST['price'];
 $discount=$_POST['discount'];
 $description=$_POST['description'];


 $source_dir="image/item/";
 $file_name=mt_rand(100000,999999);
 $file_exe_array=explode('.', $image['name']);
 $file_exe=$file_exe_array[1];
 $file_path=$source_dir.$file_name.'.'.$file_exe;
 move_uploaded_file($image['tmp_name'], $file_path);

 // echo "$file_path";
 // die();

 $sql="INSERT INTO items (brand_id,subcategory_id,codeno,name,photo,price,discount,description) VALUES(:brand
 , :subcategory, :codeno, :name, :photo, :price, :discount, :description)";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':brand',$brand);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':subcategory',$subcategory);
 $stmt->bindParam(':codeno',$codeno);
 $stmt->bindParam(':photo',$file_path);
 $stmt->bindParam(':price',$price);
 $stmt->bindParam(':discount',$discount);
  $stmt->bindParam(':description',$description);

 $stmt->execute();

 if($stmt->rowCount()){
 	header("location:item_list.php");
 }else{
 	echo "Error";
 }

 ?>