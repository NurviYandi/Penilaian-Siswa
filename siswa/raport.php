<?php  

session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level_anggota']==""){
		header("location:index.php?pesan=gagal");
	}
    
require '../functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Nilai</title>

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
                <a class="nav-link" href="nilai.php">
                    <i class='fa fa-users'></i>
                    <span>Nilai</span></a>
            </li>

            <!-- Nav Item - Kelola Kelas -->
            <li class="nav-item active">
                <a class="nav-link" href="raport.php">
                    <i class='fa fa-graduation-cap'></i>
                    <span>Raport</span></a>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Raport SMA Muhammadiyah 13 Jakarta</h1>
                        <a href="cetak_raport.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <h4>Nama : <?= $_SESSION['username'] ?></h4>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th rowspan="3">MATA PELAJARAN</th>
                                    <th colspan="3">Pengetahuan</th>
                                    <th colspan="3">Keterampilan</th>
                                    <!-- <th>Sikap</th> -->
                                </tr>
                               
                                <tr>
                                    <th>KKM</th>
                                    <th>Angka</th>
                                    <th>Huruf</th>
                                    <th>KKM</th>
                                    <th>Angka</th>
                                    <th>Huruf</th>
                                    <!-- <th>Keterangan</th> -->
                                </tr>
                                </thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <!-- <th></th> -->
                                </tr>

                                <?php 
                                
                                $koneksi = mysqli_connect("localhost", "root", "", "sekolahku");
                                
                                $query = mysqli_query($koneksi, "select avg(nilai) as total_nilai FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 1 AND id_user = '".$_SESSION['id']."'");
                                $query2 = mysqli_query($koneksi, "select avg(nilai) as total_nilai2 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 1 AND id_user = '".$_SESSION['id']."'");
                                $query3 = mysqli_query($koneksi, "select avg(nilai) as total_nilai3 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 7 AND id_user = '".$_SESSION['id']."'");
                                $query4 = mysqli_query($koneksi, "select avg(nilai) as total_nilai4 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 7 AND id_user = '".$_SESSION['id']."'");
                                $query5 = mysqli_query($koneksi, "select avg(nilai) as total_nilai5 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 8 AND id_user = '".$_SESSION['id']."'");
                                $query6 = mysqli_query($koneksi, "select avg(nilai) as total_nilai6 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 8 AND id_user = '".$_SESSION['id']."'");
                                $query7 = mysqli_query($koneksi, "select avg(nilai) as total_nilai7 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 3 AND id_user = '".$_SESSION['id']."'");
                                $query8 = mysqli_query($koneksi, "select avg(nilai) as total_nilai8 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 3 AND id_user = '".$_SESSION['id']."'");
                                $query9 = mysqli_query($koneksi, "select avg(nilai) as total_nilai9 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 9 AND id_user = '".$_SESSION['id']."'");
                                $query10 = mysqli_query($koneksi, "select avg(nilai) as total_nilai10 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 9 AND id_user = '".$_SESSION['id']."'");
                                $query11 = mysqli_query($koneksi, "select avg(nilai) as total_nilai11 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 10 AND id_user = '".$_SESSION['id']."'");
                                $query12 = mysqli_query($koneksi, "select avg(nilai) as total_nilai12 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 10 AND id_user = '".$_SESSION['id']."'");
                                $query13 = mysqli_query($koneksi, "select avg(nilai) as total_nilai13 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 11 AND id_user = '".$_SESSION['id']."'");
                                $query14 = mysqli_query($koneksi, "select avg(nilai) as total_nilai14 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 11 AND id_user = '".$_SESSION['id']."'");
                                $query15 = mysqli_query($koneksi, "select avg(nilai) as total_nilai15 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 12 AND id_user = '".$_SESSION['id']."'");
                                $query16 = mysqli_query($koneksi, "select avg(nilai) as total_nilai16 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 12 AND id_user = '".$_SESSION['id']."'");
                                $query17 = mysqli_query($koneksi, "select avg(nilai) as total_nilai17 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 13 AND id_user = '".$_SESSION['id']."'");
                                $query18 = mysqli_query($koneksi, "select avg(nilai) as total_nilai18 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 13 AND id_user = '".$_SESSION['id']."'");
                                $query19 = mysqli_query($koneksi, "select avg(nilai) as total_nilai19 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 14 AND id_user = '".$_SESSION['id']."'");
                                $query20 = mysqli_query($koneksi, "select avg(nilai) as total_nilai20 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 14 AND id_user = '".$_SESSION['id']."'");
                                $query21 = mysqli_query($koneksi, "select avg(nilai) as total_nilai21 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 15 AND id_user = '".$_SESSION['id']."'");
                                $query22 = mysqli_query($koneksi, "select avg(nilai) as total_nilai22 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 15 AND id_user = '".$_SESSION['id']."'");
                                $query23 = mysqli_query($koneksi, "select avg(nilai) as total_nilai23 FROM nilai where jenis_nilai != 'Keterampilan' and id_mapel = 16 AND id_user = '".$_SESSION['id']."'");
                                $query24 = mysqli_query($koneksi, "select avg(nilai) as total_nilai24 FROM nilai where jenis_nilai = 'Keterampilan' and id_mapel = 16 AND id_user = '".$_SESSION['id']."'");
                                // $query3 = mysqli_query($koneksi, "select avg(nilai) as total_nilai3 FROM nilai where id_mapel = 7 AND id_user = '".$_SESSION['id']."'");
                                $data = mysqli_fetch_array($query);
                                $data2 = mysqli_fetch_array($query2);
                                $data3 = mysqli_fetch_array($query3);
                                $data4 = mysqli_fetch_array($query4);
                                $data5 = mysqli_fetch_array($query5);
                                $data6 = mysqli_fetch_array($query6);
                                $data7 = mysqli_fetch_array($query7);
                                $data8 = mysqli_fetch_array($query8);
                                $data9 = mysqli_fetch_array($query9);
                                $data10 = mysqli_fetch_array($query10);
                                $data11 = mysqli_fetch_array($query11);
                                $data12 = mysqli_fetch_array($query12);
                                $data13 = mysqli_fetch_array($query13);
                                $data14 = mysqli_fetch_array($query14);
                                $data15 = mysqli_fetch_array($query15);
                                $data16 = mysqli_fetch_array($query16);
                                $data17 = mysqli_fetch_array($query17);
                                $data18 = mysqli_fetch_array($query18);
                                $data19 = mysqli_fetch_array($query19);
                                $data20 = mysqli_fetch_array($query20);
                                $data21 = mysqli_fetch_array($query21);
                                $data22 = mysqli_fetch_array($query22);
                                $data23 = mysqli_fetch_array($query23);
                                $data24 = mysqli_fetch_array($query24);

                                $join = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Bahasa Indonesia' AND id_user = '".$_SESSION['id']."'");
                                $join2 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Pendidikan Pancasila dan Kewarganegaraan'");
                                $join3 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Pendidikan Agama dan Budi Pekerti'");
                                $join4 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Matematika'");
                                $join5 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Sejarah Indonesia'");
                                $join6 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Bahasa Inggris'");
                                $join7 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Seni Budaya'");
                                $join8 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Pendidikan Jasmani Olahraga dan Kesehatan'");
                                $join9 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Prakarya dan Kewirausahaan'");
                                $join10 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Biologi'");
                                $join11 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Fisika'");
                                $join12 = mysqli_query($koneksi,"SELECT nilai.*,mapel.nm_mapel FROM nilai
                                                                JOIN mapel ON mapel.id_mapel = nilai.id_mapel WHERE nm_mapel = 'Kimia'");

                                $a = mysqli_fetch_array($join);
                                $b = mysqli_fetch_array($join2);
                                $c = mysqli_fetch_array($join3);
                                $d = mysqli_fetch_array($join4);
                                $e = mysqli_fetch_array($join5);
                                $f = mysqli_fetch_array($join6);
                                $g = mysqli_fetch_array($join7);
                                $h = mysqli_fetch_array($join8);
                                $i = mysqli_fetch_array($join9);
                                $j = mysqli_fetch_array($join10);
                                $k = mysqli_fetch_array($join11);
                                $l = mysqli_fetch_array($join12);
                                
                                ?>
                                <tr>
                                    <td><?= $a["nm_mapel"]; ?></td>
                                    <td>80</td>
                                    <td><?= round($data["total_nilai"])?></td>
                                    <td>Sembilan Puluh Lima</td>
                                    <td>80</td>
                                    <td><?= round($data2["total_nilai2"])?></td>
                                    <td>Sembilan Puluh</td>
                                </tr>
                                
                                <tr>
                                    <td><?= $b["nm_mapel"]; ?></td>
                                    <td>80</td>
                                    <td><?= round($data3["total_nilai3"])?></td>
                                    <td>Sembilan Puluh Delapan</td>
                                    <td>80</td>
                                    <td><?= round($data4["total_nilai4"])?></td>
                                    <td>Delapan Puluh Tujuh</td>
                                </tr>

                                <tr>
                                    <td><?= $c["nm_mapel"]; ?></td>
                                    <td>72</td>
                                    <td><?= round($data5["total_nilai5"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>72</td>
                                    <td><?= round($data6["total_nilai6"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                 <tr>
                                    <td><?= $d["nm_mapel"]; ?></td>
                                    <td>78</td>
                                    <td><?= round($data7["total_nilai7"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>78</td>
                                    <td><?= round($data8["total_nilai8"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $e["nm_mapel"]; ?></td>
                                    <td>78</td>
                                    <td><?= round($data9["total_nilai9"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>78</td>
                                    <td><?= round($data10["total_nilai10"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $f["nm_mapel"]; ?></td>
                                    <td>78</td>
                                    <td><?= round($data11["total_nilai11"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>78</td>
                                    <td><?= round($data12["total_nilai12"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $g["nm_mapel"]; ?></td>
                                    <td>80</td>
                                    <td><?= round($data13["total_nilai13"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>80</td>
                                    <td><?= round($data14["total_nilai14"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $h["nm_mapel"]; ?></td>
                                    <td>80</td>
                                    <td><?= round($data15["total_nilai15"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>80</td>
                                    <td><?= round($data16["total_nilai16"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $i["nm_mapel"]; ?></td>
                                    <td>79</td>
                                    <td><?= round($data17["total_nilai17"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>79</td>
                                    <td><?= round($data18["total_nilai18"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $j["nm_mapel"]; ?></td>
                                    <td>80</td>
                                    <td><?= round($data19["total_nilai19"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>80</td>
                                    <td><?= round($data20["total_nilai20"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $k["nm_mapel"]; ?></td>
                                    <td>80</td>
                                    <td><?= round($data21["total_nilai21"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>80</td>
                                    <td><?= round($data22["total_nilai22"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <tr>
                                    <td><?= $l["nm_mapel"]; ?></td>
                                    <td>80</td>
                                    <td><?= round($data23["total_nilai23"])?></td>
                                    <td>Tujuh Puluh Enam</td>
                                    <td>80</td>
                                    <td><?= round($data24["total_nilai24"])?></td>
                                    <td>Delapan Puluh</td>
                                </tr>

                                <?php  ?>
                                
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