<?php 
 require 'db_connect.php';

 $name=$_POST['name'];
 $image=$_FILES['image'];
 // echo $name;
 // die();

 $source_dir="image/brand/";
 $file_name=mt_rand(100000,999999);
 $file_exe_array=explode('.', $image['name']);
 $file_exe=$file_exe_array[1];
 $file_path=$source_dir.$file_name.'.'.$file_exe;
 move_uploaded_file($image['tmp_name'], $file_path);

 $sql="INSERT INTO brands (logo,name) VALUES(:logo,:name)";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':logo',$file_path);
 $stmt->bindParam(':name',$name);
 $stmt->execute();

 if($stmt->rowCount()){
 	header("location:brand_list.php");
 }else{
 	echo "Error";
 }

 ?>