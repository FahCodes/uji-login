<!DOCTYPE html>
<?php
ob_start();
include "koneksi.php";
//memeriksa session
if(!isset($_SESSION[''])){
	session_start();
}
//menangkap nilai login
$errorcheck="";
if($_SERVER['REQUEST_METHOD']=="POST"){

	if(!empty($_POST['username'])){
		$user = $_POST['username'];
	}
	if(!empty($_POST['password'])){
		$pass = sha1($_POST['password']);
	}
	//fungsi memeriksa db
	$sqlcheck = "SELECT id_user,username,password,level,photo FROM user WHERE username = '$user' && password='$pass'";

	$resultcheck = $connect->query($sqlcheck);
	if($resultcheck->num_rows>0){
		//mengambil data dari table
		$data = $resultcheck->fetch_assoc();
		$_SESSION['user'] = $user;
		$_SESSION['level'] = $data["level"];
		$_SESSION['photo'] = $data["photo"];
		header("location:home.php");
		$errorcheck = "Selamat Anda Berhasil Masuk !";
	}else{
		$errorcheck = "Anda Tidak Terdaftar !";
	}
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Halaman Login</title>
</head>
<body>
<div id="bungkus">
	<form name="formLogin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" id="username" name="username" class="form" placeholder="Username...">
		<input type="password" id="password" name="password" class="form" placeholder="Password...">
		<input type="submit" id="submit" name="submit" value="Login">
	</form>
</div>
<?php
	echo $errorcheck;
?>
</body>
<?php
$connect->close();
ob_flush();
?>
</html>