<?php  

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}

require '../functions.php';
$siswa = query_siswa("SELECT siswa.*, kelas.* FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas");

    // $siswa = query_siswa("SELECT * FROM siswa join user on user.id_user = siswa.id_user ");

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
                    <h1 class="h3 mb-2 text-gray-800 text-center">Data Siswa / Siswi SMA Muhammadiyah 13 Jakarta</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="tambah_siswa.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-plus-square text-white-50"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="tengah">
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>No Telpon</th>
                                            <th>Kelas</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($siswa as $row) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $row["nis"]; ?></td>
                                            <td><?= $row["nama_siswa"]; ?></td>
                                            <td><?= $row["jenis_kelamin"]; ?></td>
                                            <td><?= $row["tanggal_lahir"]; ?></td>
                                            <td><?= $row["alamat"]; ?></td>
                                            <td><?= $row["no_telp"]; ?></td>
                                            <td><?= $row["nama_kelas"]?></td>
                                            <td>
                                                <a href="ubah_siswa.php?id_user=<?= $row["id_user"] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> |
                                                 <a href="hapus_siswa.php?nis=<?= $row["nis"]?>" onclick="return confirm('Apakah anda yakin')" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                            </td>
                                           
                                        </tr>
                                        
                                    <?php $i++; ?>
                                    <?php endforeach;  ?>
                                    </tbody>
                                </table>
                            </div>
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
    <script src="sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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