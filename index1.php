<?
    header("Content-Type:application/json");
	$conn = mysqli_connect('localhost', 'root', '', 'bhinneka_dbms'); 
	mysqli_set_charset($conn, 'utf8');
	$method = $_SERVER['REQUEST_METHOD'];
	$results = array();

    if ($method == 'POST'){
      $username = $_GET['username'];
      $email = $_GET['email'];
      $password = $_GET['password'];
      $cpassword = $_GET['cpassword'];
     
      $ulash = mysqli_connect('localhost', 'root', '', 'phppostapi') or die('Xatto!');
      $insert = "INSERT INTO users (username, email, password, cpassword) values('{$username}', '{$email}', '{$password}', '{$cpassword}')";
      
      $query = mysqli_query($ulash, $insert) or die(mysqli_error($ulash));
      if($query){
        echo "Bazaga yozildi.";
      }




    }

?>