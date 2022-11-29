<?php
$server = "localhost";
$userDB = "root";
$passDB = "";
$db = "latihan";

//membuat Koneksi
$connect = new mysqli($server, $userDB, $passDB, $db);

//memeriksa Koneksi
if($connect->connect_error){
	die("Koneksi Gagal : ".$connect->connect_error);
}

?>