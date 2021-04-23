<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PT. Multidaya Medika </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords($_SESSION['username']); ?></a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <?php
                    if (empty($_GET['page'])) {
                        $url = 'dashboard';
                    } else {
                        $url = $_GET['page'];
                    }
                    $pecah = $url;
                    if ($pecah == 'dashboard') {
                    ?>
                        <a href="index.php?page=dashboard" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=dashboard" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'user') {
                    ?>
                        <a href="index.php?page=user" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=user" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Manajemen User
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'profile') {
                    ?>
                        <a href="index.php?page=profile" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=profile" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Profile
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'lowongan') {
                    ?>
                        <a href="index.php?page=lowongan" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=lowongan" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Lowongan
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'pelamar') {
                    ?>
                        <a href="index.php?page=pelamar" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=pelamar" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Manajemen Pelamar
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'kriteria') {
                    ?>
                        <a href="index.php?page=kriteria" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=kriteria" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Manajemen Kriteria
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'subkriteria') {
                    ?>
                        <a href="index.php?page=subkriteria" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=subkriteria" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Manajemen Sub Kriteria
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'perbandingan_kriteria') {
                    ?>
                        <a href="index.php?page=perbandingan_kriteria" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=perbandingan_kriteria" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>
                                Perbandingan Kriteria
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'perbandingan_alternatif') {
                    ?>
                        <a href="index.php?page=perbandingan_alternatif" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=perbandingan_alternatif" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>
                                Perbandingan Alternatif
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'hasil') {
                    ?>
                        <a href="index.php?page=hasil" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=hasil" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>
                                Hasil Perhitungan
                            </p>
                            </a>
                </li>
                <li class="nav-item">
                    <?php if ($pecah == 'laporan') {
                    ?>
                        <a href="index.php?page=laporan" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=laporan" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Laporan
                            </p>
                            </a>
                </li>
            </ul>
        </nav>