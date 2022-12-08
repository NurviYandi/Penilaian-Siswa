<?php  

$koneksi = mysqli_connect("localhost", "root", "", "sekolahku");

function query_siswa($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_kelas($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_guru($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_ta($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_mapel($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_jadwal_guru($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_nilai($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_raport($query) {
	global $koneksi;
	$result = mysqli_query($koneksi, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function query_admin($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah_siswa($data) {
	global $koneksi;

	$nis = htmlspecialchars($data["nis"] );
	$nama_siswa = htmlspecialchars($data["nama_siswa"] );
	$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"] );
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"] );
	$alamat = htmlspecialchars($data["alamat"] );
	$no_telp = htmlspecialchars($data["no_telp"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );
	$username = htmlspecialchars($data["username"] );
	$password = htmlspecialchars($data["password"] );
	

	$query_user = "INSERT INTO user SET nama_siswa = '$nama_siswa', username = '$username', password = '$password', level_anggota = 'siswa'";


	if(mysqli_query($koneksi, $query_user)){
		$last_id = mysqli_insert_id($koneksi);

		$query_siswa = "INSERT INTO siswa SET nis = '$nis', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_telp = '$no_telp', id_kelas = '$id_kelas', id_user = '$last_id'";

		mysqli_query($koneksi, $query_siswa);
	}


	return mysqli_affected_rows($koneksi);

}

function tambah_kelas($data) {
	global $koneksi;

	$nama_kelas = htmlspecialchars($data["nama_kelas"] );

	$query = "INSERT INTO kelas VALUES('', '$nama_kelas')";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambah_guru($data) {
	global $koneksi;

	$nip = htmlspecialchars($data["nip"] );
	$nama_guru = htmlspecialchars($data["nama_guru"] );
	$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"] );
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"] );
	$alamat = htmlspecialchars($data["alamat"] );
	$no_telp = htmlspecialchars($data["no_telp"] );
	$username = htmlspecialchars($data["username"] );
	$password = htmlspecialchars($data["password"] );
	
	$query_user = "INSERT INTO user SET nama_guru = '$nama_guru', username = '$username', password = '$password', level_anggota = 'guru'";


	if(mysqli_query($koneksi, $query_user)) {
		$last_id = mysqli_insert_id($koneksi);
	
		$query_guru = "INSERT INTO guru SET nip = '$nip', nama_guru = '$nama_guru', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_telp = '$no_telp', id_user = '$last_id'";

		mysqli_query($koneksi, $query_guru);
	}

	return mysqli_affected_rows($koneksi);
}

function tambah_mapel($data) {
	global $koneksi;

	$nm_mapel = htmlspecialchars($data["nm_mapel"] );
	$kategori = htmlspecialchars($data["kategori"] );

	$query = "INSERT INTO mapel SET nm_mapel =  '$nm_mapel', kategori ='$kategori'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function tambah_ta($data) {
	global $koneksi;

	$ta_ajaran = htmlspecialchars($data["ta_ajaran"] );
	$nis = htmlspecialchars($data["nis"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );

		$query_ta = "INSERT INTO tahun_ajaran2 set ta_ajaran = '$ta_ajaran', nis = '$nis', id_kelas = '$id_kelas'";

		mysqli_query($koneksi, $query_ta);


	return mysqli_affected_rows($koneksi);
}

function tambah_jadwal_guru($data) {
	global $koneksi;

	$hari = htmlspecialchars($data["hari"] );
	$tanggal = htmlspecialchars($data["tanggal"] );
	$jam_awal = htmlspecialchars($data["jam_awal"] );
	$jam_akhir = htmlspecialchars($data["jam_akhir"] );
	$nip = htmlspecialchars($data["nip"] );
	$id_mapel = htmlspecialchars($data["id_mapel"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );

	$query = "INSERT INTO jadwal_guru SET hari = '$hari', tanggal = '$tanggal', jam_awal = '$jam_awal', jam_akhir = '$jam_akhir', nip = '$nip', id_mapel = '$id_mapel', id_kelas = '$id_kelas'";

	mysqli_query($koneksi,$query);

	return mysqli_affected_rows($koneksi);
}

function tambah_nilai($data) {
	global $koneksi;

	$nilai = htmlspecialchars($data["nilai"] );
	$jenis_nilai = htmlspecialchars($data["jenis_nilai"] );
	$id_ta = htmlspecialchars($data["id_ta"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );
	$id_mapel = htmlspecialchars($data["id_mapel"] );
	$id_user = htmlspecialchars($data["id_user"] );
	$nip = htmlspecialchars($data["nip"] );

	$query = "INSERT INTO nilai SET nilai = '$nilai', jenis_nilai = '$jenis_nilai', id_ta = '$id_ta', id_kelas = '$id_kelas',
				id_mapel = '$id_mapel', id_user = '$id_user', nip = '$nip'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function tambah_raport($data) {
	global $koneksi;

	$kkm = htmlspecialchars($data["kkm"] );
	$angka_pengetahuan = htmlspecialchars($data["angka_pengetahuan"] );
	$huruf_pengetahuan = htmlspecialchars($data["huruf_pengetahuan"] );
	$angka_keterampilan = htmlspecialchars($data["angka_keterampilan"] );
	$huruf_keterampilan = htmlspecialchars($data["huruf_keterampilan"] );
	$nis = htmlspecialchars($data["nis"] );
	$id_mapel = htmlspecialchars($data["id_mapel"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );
	$nip = htmlspecialchars($data["nip"] );
	$id_ta = htmlspecialchars($data["id_ta"] );
	$semester = htmlspecialchars($data["semester"] );
	$keterangan = htmlspecialchars($data["keterangan"] );

	$query = "INSERT INTO raport SET kkm = '$kkm', angka_pengetahuan = '$angka_pengetahuan', huruf_pengetahuan = '$huruf_pengetahuan', 
					angka_keterampilan = '$angka_keterampilan', huruf_keterampilan = '$huruf_keterampilan', nis = '$nis', id_mapel = '$id_mapel,
					id_kelas = '$id_kelas', nip = '$nip', id_ta = '$id_ta', semester = '$semester', keterangan = '$keterangan'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);

}

function tambah_admin($data) {
    global $koneksi;

    $nama_admin = htmlspecialchars($data["nama_admin"] );
    $username = htmlspecialchars($data["username"] );
    $password = htmlspecialchars($data["password"] );

    $query = "INSERT INTO user set nama_admin = '$nama_admin', username = '$username', password = '$password', level_anggota = 'admin'";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function ubah_siswa($data) {
	global $koneksi;
	
	$id_user = htmlspecialchars($_GET["id_user"] );
	$nama_siswa = htmlspecialchars($data["nama_siswa"] );
	$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"] );
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"] );
	$alamat = htmlspecialchars($data["alamat"] );
	$no_telp = htmlspecialchars($data["no_telp"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );
	$username = htmlspecialchars($data["username"] );
	$password = htmlspecialchars($data["password"] );

	$query_siswa = "UPDATE siswa SET id_user = '$id_user', nama_siswa = '$nama_siswa', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_telp ='$no_telp', id_kelas = '$id_kelas' WHERE id_user = $id_user";

	mysqli_query($koneksi, $query_siswa);

	$query_user = "UPDATE user SET nama_siswa = '$nama_siswa', username = '$username', password = '$password', level_anggota = 'siswa' WHERE id_user = '$id_user'";

	mysqli_query($koneksi, $query_user);
	return mysqli_affected_rows($koneksi);
}

function ubah_kelas($data) {
	global $koneksi;

	$id_kelas = $data["id_kelas"];
	$nama_kelas = htmlspecialchars($data["nama_kelas"] );

	$query = "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = '$id_kelas'";
	
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function ubah_guru($data) {
	global $koneksi;
	
	$id_user = htmlspecialchars($_GET["id_user"] );
	$nama_guru = htmlspecialchars($data["nama_guru"] );
	$jenis_kelamin = htmlspecialchars($data["jenis_kelamin"] );
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"] );
	$alamat = htmlspecialchars($data["alamat"] );
	$no_telp = htmlspecialchars($data["no_telp"] );
	$username = htmlspecialchars($data["username"] );
	$password = htmlspecialchars($data["password"] );

	$query_guru = "UPDATE guru SET id_user = '$id_user', nama_guru = '$nama_guru', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', no_telp ='$no_telp'WHERE id_user = $id_user";

	mysqli_query($koneksi, $query_guru);

	$query_user = "UPDATE user SET nama_guru = '$nama_guru', username = '$username', password = '$password', level_anggota = 'guru' WHERE id_user = '$id_user'";

	mysqli_query($koneksi, $query_user);
	return mysqli_affected_rows($koneksi);
}

function ubah_ta($data){
	global $koneksi;

	$id_ta = $data["id_ta"];
	$ta_ajaran = htmlspecialchars($data["ta_ajaran"] );
	$nis = htmlspecialchars($data["nis"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );

	$query = "UPDATE tahun_ajaran2 SET ta_ajaran = '$ta_ajaran', nis = '$nis', id_kelas = '$id_kelas' WHERE id_ta = '$id_ta'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function ubah_mapel($data) {
	global $koneksi;

	$id_mapel = $data["id_mapel"];
	$nm_mapel = htmlspecialchars($data["nm_mapel"] );
	$kategori = htmlspecialchars($data["kategori"] );

	$query = "UPDATE mapel SET nm_mapel = '$nm_mapel', kategori = '$kategori' WHERE id_mapel = '$id_mapel'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function ubah_jadwal_guru($data){
	global $koneksi;

	$id_jadwal_guru = $data["id_jadwal_guru"];
	$hari = htmlspecialchars($data["hari"] );
	$tanggal = htmlspecialchars($data["tanggal"] );
	$jam_awal = htmlspecialchars($data["jam_awal"] );
	$jam_akhir = htmlspecialchars($data["jam_akhir"] );
	$nip = htmlspecialchars($data["nip"] );
	$id_mapel = htmlspecialchars($data["id_mapel"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );

	$query = "UPDATE jadwal_guru SET hari = '$hari', tanggal = '$tanggal', jam_awal = '$jam_awal', jam_akhir = '$jam_akhir', nip = '$nip',
		id_mapel = '$id_mapel', id_kelas = '$id_kelas' WHERE id_jadwal_guru = '$id_jadwal_guru'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function ubah_nilai($data) {
	global $koneksi;

	$id_nilai = $data["id_nilai"];
	$nilai = htmlspecialchars($data["nilai"] );
	$jenis_nilai = htmlspecialchars($data["jenis_nilai"] );
	$id_ta = htmlspecialchars($data["id_ta"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );
	$id_mapel = htmlspecialchars($data["id_mapel"] );
	$id_user = htmlspecialchars($data["id_user"] );
	$nip = htmlspecialchars($data["nip"] );

	$query = "UPDATE nilai SET nilai = '$nilai', jenis_nilai = '$jenis_nilai', id_ta = '$id_ta', id_kelas = '$id_kelas',
				id_mapel = '$id_mapel', id_user = '$id_user', nip = '$nip' WHERE id_nilai = '$id_nilai'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function ubah_raport($data) {
	global $koneksi;

	$id_raport = $data["id_raport"];
	$kkm = htmlspecialchars($data["kkm"] );
	$angka_pengetahuan = htmlspecialchars($data["anga_pengetahuan"] );
	$huruf_pengetahuan = htmlspecialchars($data["huruf_pengetahuan"] );
	$angka_keterampilan = htmlspecialchars($data["angka_keterampilan"] );
	$huruf_keterampilan = htmlspecialchars($data["huruf_keterampilan"] );
	$nis = htmlspecialchars($data["nis"] );
	$id_mapel = htmlspecialchars($data["id_mapel"] );
	$id_kelas = htmlspecialchars($data["id_kelas"] );
	$nip = htmlspecialchars($data["nip"] );
	$id_ta = htmlspecialchars($data["id_ta"] );
	$semester = htmlspecialchars($data["semester"] );
	$keterangan = htmlspecialchars($data["keterangan"] );

	$query = "UPDATE raport SET kkm = '$kkm', angka_pengetahuan = '$angka_pengetahuan', huruf_pengetahuan = '$huruf_pengetahuan', 
					angka_keterampilan = '$angka_keterampilan', huruf_keterampilan = '$huruf_keterampilan', nis = '$nis', id_mapel = 'id_mapel,
					id_kelas = '$id_kelas', nip = '$nip', id_ta = '$id_ta', semester = '$semester', keterangan = '$keterangan' WHERE id_raport = '$id_raport'";

	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}

function ubah_admin($data) {
    global $koneksi;

    $id_user = $data["id_user"];
    $nama_admin = htmlspecialchars($data["nama_admin"] );
    $username = htmlspecialchars($data["username"] );
    $password = htmlspecialchars($data["password"] );

    $query = "UPDATE user set nama_admin = '$nama_admin', username = '$username', password = '$password' WHERE id_user = '$id_user'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus_siswa($nis) {
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM siswa WHERE nis = $nis");

	return mysqli_affected_rows($koneksi);
}

function hapus_kelas($id_kelas) {
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas = $id_kelas");

	return mysqli_affected_rows($koneksi);
}

function hapus_guru($nip) {
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM guru WHERE nip = $nip");

	return mysqli_affected_rows($koneksi);
}

function hapus_ta($id_ta){
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM tahun_ajaran2 WHERE id_ta = $id_ta");

	return mysqli_affected_rows($koneksi);
}

function hapus_mapel($id_mapel) {
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM mapel WHERE id_mapel = $id_mapel");

	return mysqli_affected_rows($koneksi);

}

function hapus_jadwal_guru($id_jadwal_guru) {
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM jadwal_guru WHERE id_jadwal_guru = $id_jadwal_guru");

	return mysqli_affected_rows($koneksi);
}

function hapus_nilai($id_nilai) {
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai = $id_nilai");

	return mysqli_affected_rows($koneksi);
}

function hapus_raport($id_raport) {
	global $koneksi;

	mysqli_query($koneksi, "DELETE FROM raport WHERE id_raport = $id_raport");

	return mysqli_affected_rows($koneksi);
}

function hapus_admin($id_user) {
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id_user");
    
    return mysqli_affected_rows($koneksi);
}

?>