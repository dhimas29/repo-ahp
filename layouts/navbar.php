<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <!-- <a class="nav-link" data-toggle="dropdown" href="#"> -->
            <a class="navbar-brand" data-toggle="dropdown" href="#">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where email = '$_SESSION[email]'");
                $cek = mysqli_num_rows($query);
                if ($cek > 0) {
                    while ($array = mysqli_fetch_array($query)) {
                        $photo = $array['photo'];
                    }
                } else {
                    $photo = "avatar.png";
                }
                ?>
                <img src="<?php echo "../assets/dist/img_profile/" . $photo ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="30">
                <span class="brand-text font-weight-light"><?= ucwords($_SESSION['fullname']); ?></span>
            </a>
            <!-- </a> -->
            <div class="dropdown-menu">
                <!-- <a href="#" class="dropdown-item">
                    Pengaturan Akun
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="../logout.php" class="dropdown-item">
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>