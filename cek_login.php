<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
require 'functions.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level_anggota']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_anggota'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");
 
	// cek jika user login sebagai guru
	}else if($data['level_anggota']=="guru"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_anggota'] = "guru";
		// alihkan ke halaman dashboard guru
		header("location:guru/index.php");
 
	// cek jika user login sebagai siswa
	}else if($data['level_anggota']=="siswa"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level_anggota'] = "siswa";
		$_SESSION['id'] = $data['id_user'];
		// alihkan ke halaman dashboard siswa
		header("location:siswa/index.php");
 
	}else if($data['level_anggota']=="kepsek"){
		// buat session login dan kepsek
		$_SESSION['username'] = $username;
		$_SESSION['level_anggota'] = "kepsek";
		// alihkan ke halaman dashboard kepsek
		header("location:kepsek/index.php");
 
	}else if($data['level_anggota']=="wali_kelas"){
		// buat session login dan wali_kelas
		$_SESSION['username'] = $username;
		$_SESSION['level_anggota'] = "wali_kelas";
		// alihkan ke halaman dashboard wali_kelas
		header("location:wali_kelas/index.php");
	}
    else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>
