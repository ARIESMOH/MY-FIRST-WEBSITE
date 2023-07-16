<?php
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection here
	$con = new mysqli("localhost","root","","invest");
	if ($con->connect_error) {
		die("Failed to connect : ".$con->connect_error);
	}else{
		$stmt = $con->prepare("select * from register where email = ?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if ($stmt_result->num_rows > 0) {
			$data = $stmt_result->fetch_assoc();
			if ($data['password'] === $password) {
				header("Location: INVESTMENT MAIN PAGE/home.html");
			}
		}else{
			echo "<h2>INVALID EMAIL OR PASSWORD</h2>";
		}
	}
?>