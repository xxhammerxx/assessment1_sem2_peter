?php
session_start();
$message = "<p></p>";
$username = $password = "";

if ($_POST){
	$username = test_input($_POST['username']);
	$password = md5($_POST['password']);

include('connect.php');

$query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result)==1){
	
	$_SESSION['loggedin'] = 'true';
	header('location:../index.php');
} else {
	echo $message = "<p>Wrong Username or Password</p>";
}
	
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>