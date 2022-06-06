<?php 
 require 'db_connect.php';

 $name=$_POST['name'];
 $category=$_POST['category'];

 if($name==null  || $category==null) // name or image null
{
	if($name==null && $category==null)//image & name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Category name is required.</span>';
		$_SESSION['validate_category_msg']='<span class="text-danger">Category must be choosed.</span>';
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

 $sql="INSERT INTO subcategories (name,category_id) VALUES(:name, :category)";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':category',$category);
 $stmt->execute();

 if($stmt->rowCount()){
 	header("location:subcategory_list.php");
 }else{
 	echo "Error";
 }
}
 ?>