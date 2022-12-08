<?php  

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}

require '../functions.php';

$nip = $_GET["nip"];
	
	if (hapus_guru($nip) > 0) {
		echo "
		<script>
			alert('data berhasil dihapus');
			document.location.href = 'tabel_guru.php';
		</script>
		";
	}else {
		echo "
		<script>
			alert('data gagal dihapus');
			document.location.href = 'tabel_guru.php';
		</script>
		";
	}
?>