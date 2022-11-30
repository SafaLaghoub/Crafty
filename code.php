<?php

      	session_start();

      include 'config/dbconn.php'; 
	  include 'myfunctions.php'; 

if (isset($_POST['add-category-btn']))

{
	$name = $_POST['name'];
    $slug = $_POST['slug'];
	$id = $_POST['id'];
    $price = $_POST['price'];
    $description = $_POST['description'];
	$stock = $_POST['stock'];



	$image = $_FILES['image']['name'];
	$path = "../uploads";
	$image_ext = pathinfo($image,PATHINFO_EXTENSION);
	$filename = time().'.'.$image_ext;



	$cate_query = "INSERT INTO products (category_id,product_name,product_description,image,counter,price,slug) 
	VALUES ('$id','$name','$description','$filename','$stock',' $price',' $slug')";

	$cate_query_run = mysqli_query($connection,$cate_query);

	if($cate_query_run)
	{
		move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
					redirect("add-category.php","category added succesfully");

	}
	else
	{

			redirect("add-category.php","Something went wrong");


	}

}

?>