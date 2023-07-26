<?
    header("Content-Type:application/json");
    header('Access-Control-Allow-Origin', '*');
	$conn = mysqli_connect('localhost', 'root', '', 'bhinneka_dbms'); 
	mysqli_set_charset($conn, 'utf8');
	$method = $_SERVER['REQUEST_METHOD'];
	$results = array();
?>