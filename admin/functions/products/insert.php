<?php 

$name = $_POST['name'];
$price = $_POST['price'];
$sale = $_POST['sale'];
$cat = $_POST['cat'];


$imgName = $_FILES['img']['name'];
$temp 	 = $_FILES['img']['tmp_name'];


/**
 * 1 - check if there is uploaded image
 * 2 - specify file extensions
 * 3 - specify file size < 2m
 * 4 - change file name to a random name
 * 5 - move uploaded image to the server with the new name
 * 6 - store image name into the database with the new name
 */

//  1 - check if there is uploaded image
if ($_FILES['img']['error'] == 0 ) {

	//2 - specify file extensions
	$extensions = ['png','gif','jpg','jpeg'];
	$ext  = pathinfo($imgName , PATHINFO_EXTENSION);
	if (in_array($ext, $extensions)) {

		// 3 - specify file size < 2m
		if ($_FILES['img']['size'] < 2000000) {

			// 4 - change file name to a random name
			$newName = md5(uniqid()) .".". $ext;

			move_uploaded_file($temp, "../../images/$newName");


		} else {

			echo 'file size is too big';
			exit();

		}
		
	} else {
		echo 'wrong file extension';
		exit();
	}

} else {

	echo "you must upload an image";
	exit();
}
	


include '../connect.php';

$insert = "INSERT INTO products (name , price , sale , cat_id , img) VALUES ('$name','$price','$sale','$cat' , '$newName')";


$query = $conn -> query($insert);

if($query) {

	header('location: ../../products.php');

} else {

	echo $conn -> error ;

}