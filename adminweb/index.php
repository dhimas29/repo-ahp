<?php require_once('../koneksi.php'); ?>
<?php session_start(); ?>
<?php include('../layouts/header.php'); ?>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php include('../layouts/navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include('../layouts/sidebar.php'); ?>
        <!-- Sidebar Menu -->

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <?php
                            if (empty($_GET['page'])) {
                                echo "Dashboard";
                            } else {
                                if ($_GET['page'] == 'hasil_hitung') {
                                    echo "Hasil Hitung";
                                } elseif ($_GET['page'] == 'hasil_ranking') {
                                    echo "Hasil Perangkingan";
                                } elseif ($_GET['page'] == 'perbandingan_kriteria') {
                                    echo "Perbandingan Kriteria";
                                } elseif ($_GET['page'] == 'perbandingan_alternatif') {
                                    echo "Perbandingan Alternatif";
                                } else {
                                    echo ucwords($_GET['page']);
                                }
                            } ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">
                                <?php
                                if (empty($_GET['page'])) {
                                    echo "Dashboard";
                                } else {
                                    if ($_GET['page'] == 'hasil_hitung') {
                                        echo "Hasil Hitung";
                                    } elseif ($_GET['page'] == 'hasil_ranking') {
                                        echo "Hasil Perangkingan";
                                    } elseif ($_GET['page'] == 'perbandingan_kriteria') {
                                        echo "Perbandingan Kriteria";
                                    } elseif ($_GET['page'] == 'perbandingan_alternatif') {
                                        echo "Perbandingan Alternatif";
                                    } else {
                                        echo ucwords($_GET['page']);
                                    }
                                } ?>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <?php
        if (empty($_GET['page'])) {
            $url = "dashboard";
        } else {

            $url = $_GET['page'];
        }
        // var_dump($url);
        switch ($url) {
            case null:
                include 'dashboard.php';
                break;
            case 'dashboard':
                include 'dashboard.php';
                break;
            case 'user':
                include 'user.php';
                break;
            case 'pelamar':
                include 'pelamar.php';
                break;
            case 'kriteria':
                include 'kriteria.php';
                break;
            case 'subkriteria':
                include 'subkriteria.php';
                break;
            case 'hasil':
                include 'hasil.php';
                break;
            case 'hasil_hitung':
                include 'hasil_hitung.php';
                break;
            case 'hasil_ranking':
                include 'hasil_ranking.php';
                break;
            case 'laporan':
                include 'laporan.php';
                break;
            case 'profile':
                include 'profile.php';
                break;
            case 'pengalaman':
                include 'pengalaman.php';
                break;
            case 'pendidikan':
                include 'pendidikan.php';
                break;
            case 'lowongan':
                include 'lowongan.php';
                break;
            case 'perbandingan_kriteria':
                include 'perbandingan_kriteria.php';
                break;
            case 'perbandingan_alternatif':
                include 'perbandingan_alternatif.php';
                break;
            case 'analisa_kriteria_tabel':
                include 'analisa_kriteria_tabel.php';
                break;
            case 'analisa_alternatif_tabel':
                include 'analisa_alternatif_tabel.php';
                break;
            default:
                include '404.php';
        }

        ?>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('../layouts/footer.php'); ?>