<?php 
 require 'db_connect.php';
 session_start();

 $name=$_POST['name'];
 $image=$_FILES['image'];
if($name==null  || $image['name']==null) // name or image null
{
	if($name==null && $image['name']==null)//image & name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Category name is required.</span>';
		$_SESSION['validate_photo_msg']='<span class="text-danger">Photo cannot be blank.</span>';
	}elseif ($name==null) //name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Category name is required.</span>';
		$_SESSION['validate_photo_msg']='<span class="text-danger">Please Upload the photo again.</span>'; // ayin pon ka win nay lox image folder ko

	}
	else //image null
	{
		$_SESSION['validate_photo_msg']='<span class="text-danger">Photo cannot be blank.</span>';
	}
	header('location:category_new.php');
}
else 
{

 // echo $name;
 // die();

		 $source_dir="image/category/";
		 $file_name=mt_rand(100000,999999);
		 $file_exe_array=explode('.', $image['name']);
		 $file_exe=$file_exe_array[1];
		 $file_path=$source_dir.$file_name.'.'.$file_exe;
		 move_uploaded_file($image['tmp_name'], $file_path);

		 $sql="INSERT INTO categories (photo,name) VALUES(:photo,:name)";
		 $stmt=$pdo->prepare($sql);
		 $stmt->bindParam(':photo',$file_path);
		 $stmt->bindParam(':name',$name);
		 $stmt->execute();

		 if($stmt->rowCount()){
		 	$_SESSION['success_msg']="One Category is <br> CREATED</br> successfullly in our database.";
		 	header("location:category_list.php");
		 	
		 	

		 }else{
		 	$_SESSION['err_msg']="Sorry! Please Try again.There is something in our mistakes.";
		 header("location:category_list.php");
		 }
}
 ?>