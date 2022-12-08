<?php  

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
    
require '../functions.php';

    if(isset($_POST["submit"]) ){

    // cek apakah data telah berhasil ditambah atau tidak
    if(tambah_ta($_POST) > 0){
        echo "
             <script>
             alert('Data berhasil ditambahkan');
             document.location.href = 'tabel_ta.php';
             </script>
             ";
    }else{
        echo "
             <script>
             alert('Data gagal ditambahkan');
             document.location.href = 'tabel_ta.php';
             </script>
             ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Siswa</title>

    <!-- Custom fonts for this template -->
    <link href="../sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        .tengah{
            text-align: center;
        }
    </style>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="../img/gambar.png" style="width: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>HALAMAN UTAMA</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Kelola Siswa -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_siswa.php">
                    <i class='fa fa-users'></i>
                    <span>Kelola Siswa</span></a>
            </li>

            <!-- Nav Item - Kelola Kelas -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_kelas.php">
                    <i class='fa fa-graduation-cap'></i>
                    <span>Kelola Kelas</span></a>
            </li>

            <!-- Nav Item - Data Guru -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_guru.php">
                    <i class='fa fa-graduation-cap'></i>
                    <span>Kelola Guru</span></a>
            </li>

            <!-- Nav Item - Tahun ajaran -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_ta.php">
                    <i class='fa fa-graduation-cap'></i>
                    <span>Kelola Tahun Ajaran</span></a>
            </li>
            
            <!-- Nav Item - Kelola Mata Pelajaran -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_mapel.php">
                    <i class='fa fa-book'></i>
                    <span>Kelola Mata pelajaran</span></a>
            </li>

            <!-- Nav Item - Kelola Jadwal Guru -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_jadwal_guru.php">
                    <i class='fa fa-graduation-cap'></i>
                    <span>Kelola Jadwal Guru</span></a>
            </li>

            <!-- Nav Item - Kelola Nilai -->
            <li class="nav-item active">
                <a class="nav-link" href="tabel_nilai.php">
                    <i class='fa fa-graduation-cap'></i>
                    <span>Kelola Nilai</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../logout.php">
                    <i class='fa fa-graduation-cap'></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai.<?= $_SESSION["username"]; ?></span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4>FORM TAMBAH TAHUN AJARAN</h4>
                        </div>
                        <div class="card-body">
              <form action="" method="post">
                
                <div class="form-group">
                  <label>Tahun Ajaran</label>
                  <input type="text" name="ta_ajaran" id="ta_ajaran" required="" class="form-control">
                </div>

                <div class="form-group">
                  <label>NAMA</label>
                  <select name="nis" id="nis" class="form-control">
                    <option>PILIH NAMA</option>
                    <?php
                    $koneksi = mysqli_connect("localhost", "root", "", "sekolahku");
                    $data = mysqli_query($koneksi,"SELECT * FROM siswa");
                    while($a = mysqli_fetch_array($data)){
                    ?>
                    <option value="<?= $a['nis'] ?>"><?= $a['nama_siswa'] ?></option>
                    <?php } ?>
                  </select>
                  <!-- <input type="text" name="nis" id="nis" required="" class="form-control"> -->
                </div>

                
                <div class="form-group">
                  <label>KELAS</label>
                  <select name="id_kelas" id="id_kelas" class="form-control">
                    <option>PILIH KELAS</option>
                    <?php
                    $koneksi = mysqli_connect("localhost", "root", "", "sekolahku");
                    $data = mysqli_query($koneksi,"SELECT * FROM kelas");
                    while($a = mysqli_fetch_array($data)){
                    ?>
                    <option value="<?= $a['id_kelas'] ?>"><?= $a['nama_kelas'] ?></option>
                    <?php } ?>
                  </select>
                  <!-- <input type="text" name="nis" id="nis" required="" class="form-control"> -->
                </div>

                <button type="submit" name="submit" class="btn btn-success">SIMPAN</button>

              </form>
            </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="../sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../sbadmin/js/demo/datatables-demo.js"></script>

</body>

</html>