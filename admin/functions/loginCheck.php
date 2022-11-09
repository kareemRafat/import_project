<?php 
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

include 'connect.php';

$select = "SELECT id FROM users 
			WHERE 
			username = '$username' AND password = '$password'
";

$query = $conn -> query($select);

// check if user exist

if ($query -> num_rows > 0 ) {

	// get id 
	$user = $query -> fetch_assoc();
	$id = $user['id'];

	// user exist
	$_SESSION['login'] = $id ;
	header("location: ../index.php");
} else {

	// user dosn`t exist
	$_SESSION['error'] = '<div class="alert alert-danger">wrong login credentials</div>';
	header("location: ../login.php");
}