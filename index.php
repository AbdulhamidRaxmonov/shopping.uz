<?php
	header("Content-Type:application/json");
	
	mysqli_set_charset($conn, 'utf8');
	$method = $_SERVER['REQUEST_METHOD'];
	$results = array();

	if ($method == 'DELETE'){
		// parse_str(file_get_contents('php://input'), $_DELETE);
		$id = $_GET['id'];
        $ulash = mysqli_connect('localhost', 'root', '', 'phppostapi') or die('Xatto!');
		$sql = "DELETE FROM users WHERE id ='$id'";
        $query = mysqli_query($ulash, $sql) or die(mysqli_error($ulash));


		$results['Status']['success'] = true;
		$results['Status']['code'] = 200;
		$results['Status']['description'] = 'Data Succesfully Deleted';		
	}
	else{
		$results['Status']['code'] = 405;
	}

	//Menampilkan Data JSON dari Database
	$json = json_encode($results);
	print_r($json);
?>