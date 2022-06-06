<?php 
 require 'db_connect.php';
 session_start();

 $name=$_POST['name'];
 $image=$_FILES['image'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $phone=$_POST['phone'];
 $address=$_POST['address'];
 $role="2";
if($name==null  || $email==null || $password==null) // name or image null
{
	if($name==null && $email ==null && $password==null )//image & name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Name is required.</span>';
		$_SESSION['validate_email_msg']='<span class="text-danger">Please enter your email.</span>';
		$_SESSION['validate_password_msg']='<span class="text-danger">Password must be added.</span>';
	}
	elseif ($name==null && $email==null) //name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Name is required.</span>';
		$_SESSION['validate_email_msg']='<span class="text-danger">Please enter your email</span>'; // ayin pon ka win nay lox image folder ko

	}
	elseif ($name==null && $password==null) //name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Name is required.</span>';
		$_SESSION['validate_password_msg']='<span class="text-danger">Password must be added.</span>'; // ayin pon ka win nay lox image folder ko

	}
	elseif ($email==null && $password==null) //name null
	{
		$_SESSION['validate_email_msg']='<span class="text-danger">Please enter your email.</span>';
		$_SESSION['validate_password_msg']='<span class="text-danger">Password must be added.</span>'; // ayin pon ka win nay lox image folder ko

	}
	elseif ($name==null) //name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Category name is required.</span>';
		
	}
	elseif ($email==null) //name null
	{
		$_SESSION['validate_name_msg']='<span class="text-danger">Please enter your email.</span>';
		
	}
	else //image null
	{
		$_SESSION['validate_password_msg']='<span class="text-danger">Password must be added.</span>';
	}
	header('location:register.php');
}
else 
{

 // echo $name;
 // die();

		 $source_dir="image/user/";
		 $file_name=mt_rand(100000,999999);
		 $file_exe_array=explode('.', $image['name']);
		 $file_exe=$file_exe_array[1];
		 $file_path=$source_dir.$file_name.'.'.$file_exe;
		 move_uploaded_file($image['tmp_name'], $file_path);

		 $sql="INSERT INTO users (name,profile,email,password,phone,address,role_id) VALUES(:name,:profile, :email, :password, :phone, :address, :role)";
		 $stmt=$pdo->prepare($sql);
		 $stmt->bindParam(':profile',$file_path);
		 $stmt->bindParam(':name',$name);
		 $stmt->bindParam(':email',$email);
		 $stmt->bindParam(':password',$password);
		 $stmt->bindParam(':phone',$phone);
		 $stmt->bindParam(':address',$address);
		 $stmt->bindParam(':role',$role);
		 $stmt->execute();

		 if($stmt->rowCount()){
		 	$_SESSION['success_msg']="Success Register!";
		 	header("location:login.php");
		 	
		 	

		 }else{
		 	$_SESSION['err_msg']="Sorry! Please Try again.There is something in our mistakes.";
		 header("location:login.php");
		 }
     }
 ?>