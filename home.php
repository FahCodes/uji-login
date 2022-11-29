<!DOCTYPE html>
<?php
ob_start();
$izin = FALSE;
$user = "";
//start sesi
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_SESSION['user']) && $_SESSION['level'] == "Admin"){
	$user = $_SESSION['user'];
	$level = $_SESSION['level'];
	$photo = $_SESSION['photo'];
	$izin = TRUE;
}
if(isset($_SESSION['user']) && $_SESSION['level'] == "Operator"){
	$user = $_SESSION['user'];
	$level = $_SESSION['level'];
	$photo = $_SESSION['photo'];
	$izin = TRUE;
}
?>
<html>
<head>
	<title>Home</title>
</head>
<body>
<?php
if($izin == TRUE){
?>
<div id="viewuser">
	<?php echo "Welcome User ".$user."<br>"; ?>
	<?php echo "Level User ".$level."<br>"; ?>
	<?php echo "Photo User ".$photo."<br>"; ?>
	<br>
	<img src="<?php echo 'PhotoUser/'.$photo ?>" width="100" height="100">
	<ul>
		<?php if($_SESSION['level'] == "Admin") { ?>
		<li>Menu Admin</li>
		<?php } if ($_SESSION['level']== "Operator") { ?>
		<li>Menu Operator</li>
		<?php } if ($_SESSION['level']== "User") { ?>
		<li>Menu User</li>
		<?php } ?>
	</ul>
	<a href="logout.php">LogOut</a>
</div>
<?php
}else{
?>
<div id="pesan">
	<b>Anda Tidak Memiliki Access !</b>
	<br>
	<a href="login.php">Kamu Harus Login</a>
</div>
<?php } ?>
</body>
<?php
ob_flush();	
?>
</html>