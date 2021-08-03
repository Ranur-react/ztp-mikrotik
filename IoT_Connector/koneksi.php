<?php
	$severname = "localhost";
	$username = "id12112963_root";
	$password = "12345678";
	$dbname = "id12112963_antrian";

	$conn = new mysqli($severname, $username, $password, $dbname);
	if(!$conn){
		die("koneksi gagal" . mysqli_connect_error());
	}
	//echo "koneksi berhasil";
?>