<?php 

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$cat = $_POST['cat'];

include '../connect.php';

$insert = "INSERT INTO products (name , price , sale , cat_id) VALUES ('$name','$price','$sale','$cat')";


$query = $conn -> query($insert);

if($query) {

	header('location: ../../products.php');

} else {

	echo $conn -> error ;

}