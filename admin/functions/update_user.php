<?php 


if($_SERVER['REQUEST_METHOD'] != "POST") {

  header('location: ../users.php');

  exit();

}

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$priv = $_POST['priv'];

include 'connect.php';

// password logic

if (!empty($_POST['password'])) {

	$pass = md5($_POST['password']);
	$updatePass ="UPDATE users SET password = '$pass' WHERE id = $id";
	$queryPass = $conn->query($updatePass);

}



$update = "UPDATE users SET
				
				username = '$username' , 
				email = '$email',
				address = '$address',
				gender = '$gender',
				priv = '$priv'

			WHERE id = $id

 ";

 $query = $conn -> query($update);

if($query) {

	header('location: ../users.php');

} else {

	echo $conn -> error ;

}