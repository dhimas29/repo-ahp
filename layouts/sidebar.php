<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../adminweb/index.php" class="brand-link">
        <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PT. Multidaya Medika </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= ucwords($_SESSION['username']); ?></a>
            </div>
        </div> -->
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
                <li class="nav-item">
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
                <?php if ($_SESSION['level'] == 'admin') : ?>
                    <li class="nav-item">
                        <?php if (($pecah == 'user') || ($pecah == 'pelamar') || ($pecah == 'kriteria') || ($pecah == 'subkriteria') || ($pecah == 'lowongan')) { ?>
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Manajemen
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                            <?php } else {
                            ?>
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Manajemen
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                <?php } ?>
                                <li class="nav-item">
                                    <?php if ($pecah == 'user') {
                                    ?>
                                        <a href="index.php?page=user" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=user" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Manajemen User
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
                                            <i class="nav-icon far fa-circle nav-icon"></i>
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
                                            <i class="nav-icon far fa-circle nav-icon"></i>
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
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Manajemen Sub Kriteria
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
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Manajemen Lowongan
                                            </p>
                                            </a>
                                </li>
                                </ul>
                    </li>
                <?php endif; ?>
                <!-- <li class="nav-item">
                    <?php if ($pecah == 'profile') {
                    ?>
                        <a href="index.php?page=profile" class="nav-link active">
                        <?php } else { ?>
                            <a href="index.php?page=profile" class="nav-link">
                            <?php } ?>
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Pengaturan Akun
                            </p>
                            </a>
                </li> -->
                <?php if (($_SESSION['level'] == 'pelamar') || ($_SESSION['level'] == 'karyawan')) : ?>
                    <li class="nav-item">
                        <?php if (($pecah == 'pengalaman') || ($pecah == 'pendidikan') || ($pecah == 'profile')) { ?>
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Pengaturan Akun
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                            <?php } else { ?>
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Pengaturan Akun
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                <?php } ?>
                                <li class="nav-item">
                                    <?php if ($pecah == 'profile') {
                                    ?>
                                        <a href="index.php?page=profile" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=profile" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Profile
                                            </p>
                                            </a>
                                </li>
                                <li class="nav-item">
                                    <?php if ($pecah == 'pengalaman') {
                                    ?>
                                        <a href="index.php?page=pengalaman" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=pengalaman" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Pengalaman
                                            </p>
                                            </a>
                                </li>
                                <!-- Menghitung Alternatif -->
                                <li class="nav-item">
                                    <?php if ($pecah == 'pendidikan') {
                                    ?>
                                        <a href="index.php?page=pendidikan" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=pendidikan" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Pendidikan
                                            </p>
                                            </a>
                                </li>
                                </ul>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['level'] == 'admin') : ?>
                    <li class="nav-item">
                        <?php if (($pecah == 'perbandingan_kriteria') || ($pecah == 'perbandingan_alternatif') || ($pecah == 'hasil') || ($pecah == 'hasil_hitung') || ($pecah == 'hasil_ranking')) { ?>
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-calculator"></i>
                                <p>
                                    Metode AHP
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                            <?php } else { ?>
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-calculator"></i>
                                    <p>
                                        Metode AHP
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                <?php } ?>
                                <li class="nav-item">
                                    <?php if ($pecah == 'perbandingan_kriteria') {
                                    ?>
                                        <a href="index.php?page=perbandingan_kriteria" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=perbandingan_kriteria" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Perbandingan Kriteria
                                            </p>
                                            </a>
                                </li>
                                <!-- Menghitung Alternatif -->
                                <li class="nav-item">
                                    <?php if ($pecah == 'perbandingan_alternatif') {
                                    ?>
                                        <a href="index.php?page=perbandingan_alternatif" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=perbandingan_alternatif" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Perbandingan Alternatif
                                            </p>
                                            </a>
                                </li>
                                <li class="nav-item">
                                    <?php if (($pecah == 'hasil') || ($pecah == 'hasil_hitung') || ($pecah == 'hasil_ranking')) {
                                    ?>
                                        <a href="index.php?page=hasil" class="nav-link active">
                                        <?php } else { ?>
                                            <a href="index.php?page=hasil" class="nav-link">
                                            <?php } ?>
                                            <i class="nav-icon far fa-circle nav-icon"></i>
                                            <p>
                                                Hasil Perhitungan
                                            </p>
                                            </a>
                                </li>
                                </ul>
                    </li>
                <?php endif; ?>
                <?php if (($_SESSION['level'] == 'pimpinan')) : ?>
                    <li class="nav-item">
                        <?php if ($pecah == 'laporan') {
                        ?>
                            <a href="index.php?page=laporan" class="nav-link active">
                            <?php } else { ?>
                                <a href="index.php?page=laporan" class="nav-link">
                                <?php } ?>
                                <i class="nav-icon fas fa-folder"></i>
                                <p>
                                    Lihat Laporan
                                </p>
                                </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>