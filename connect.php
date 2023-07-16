<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','invest');
if ($conn->connect_error) {
	die('Connection Failed : ' .$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into register(name,phone,email,password) values (?,?,?,?)");
	$stmt->bind_param("sssi", $name, $phone, $email, $password);
	$stmt->execute();
	header("Location: http://www.home.com/");
	$stmt->close();
	$conn->close();
}

?>