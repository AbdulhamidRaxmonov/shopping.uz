<?php
	header("Content-Type:application/json");
	$conn = mysqli_connect('localhost', 'root', '', 'bhinneka_dbms'); 
	mysqli_set_charset($conn, 'utf8');
	$method = $_SERVER['REQUEST_METHOD'];
	$results = array();

	if ($method == 'PUT'){
		// parse_str(file_get_contents('php://input'), $_PUT);
		$id = $_GET['id'];
		$username = $_GET['username'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$cpassword = $_GET['cpassword'];
		$ulash = mysqli_connect('localhost', 'root', '', 'phppostapi') or die('Xatto!');
		$sql = "UPDATE users SET username = '$username', email = '$email', password='$password', cpassword='$cpassword' WHERE id ='$id'";
		
		$query = mysqli_query($ulash, $sql) or die(mysqli_error($ulash));

		$results['Status']['success'] = true;
		$results['Status']['code'] = 200;
		$results['Status']['description'] = 'Data Succesfully Updated';
		$results['Hasil'] = array(
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'cpassword' => $cpassword,
			
		);						
	}
	else{
		$results['Status']['code'] = 405;
	}

	//Menampilkan Data JSON dari Database
	$json = json_encode($results);
	print_r($json);
?>