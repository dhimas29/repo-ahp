<?php
session_start();
include '../koneksi.php';
$modul = $_GET['module'];
$ac = $_GET['act'];

if ($modul == 'kriteria' && $ac == 'input') {
    $nama_kriteria = $_POST['nama_kriteria'];
    $bobot_kriteria = 0;
    $id_kriteria = $_POST['id_kriteria'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_kriteria (id_kriteria,nama_kriteria,bobot_kriteria) 
    Values ('$id_kriteria','$nama_kriteria','$bobot_kriteria')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    }
} elseif ($modul == 'subkriteria' && $ac == 'input') {
    $id_alternatif = $_POST['id_alternatif'];
    $kriteria = $_POST['kriteria'];
    $sub_kriteria = $_POST['sub_kriteria'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_alternatif (id_alternatif,id_kriteria,nama_alternatif)
    values ('$id_alternatif','$kriteria','$sub_kriteria')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=subkriteria'; </script>";
    }
} elseif ($modul == 'pelamar' && $ac == 'input') {
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $status = $_POST['status'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
    $nama_photo = $_FILES['photo']['name'];
    $exp_photo = explode('.', $nama_photo);
    $exp_path = pathinfo($nama_photo, PATHINFO_EXTENSION);
    $pth_nama = $nik . "_" . $exp_photo[0] . "." . $exp_path;

    $x_photo = explode('.', $nama_photo);
    $ekstensi_photo = strtolower(end($x_photo));
    $ukuran_photo    = $_FILES['photo']['size'];
    $file_tmp_photo = $_FILES['photo']['tmp_name'];

    if (in_array($ekstensi_photo, $ekstensi_diperbolehkan) === true) {
        if (($ukuran_photo < 1044070)) {
            $up_photo = move_uploaded_file($file_tmp_photo, '../assets/dist/img_profile/' . $pth_nama);
            if ($up_photo) {
                $qcek = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where nik ='$nik' || email='$email'");
                $cek = mysqli_num_rows($qcek);
                if ($cek > 0) {
                    $query = mysqli_query($conn, "UPDATE tb_calon_karyawan 
                    set nik ='$nik',nama_lengkap ='$nama_lengkap',tempat_lahir ='$tempat_lahir',
                    tanggal_lahir='$tanggal_lahir',jenis_kelamin ='$jenis_kelamin',agama='$agama',no_telp='$no_telp',
                    status='$status',alamat='$alamat',photo='$pth_nama' where email ='$email'
                    ");
                    echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=profile'; </script>";
                } else {
                    // $email = $_POST['email'];
                    $query = mysqli_query($conn, "INSERT INTO tb_calon_karyawan 
                    (nik,nama_lengkap,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,status,no_telp,email,photo,alamat)
                    values 
                    ('$nik','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$status','$no_telp','$email','$pth_nama','$alamat')");
                    echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=profile'; </script>";
                }
            }
        }
    }
} elseif ($modul == 'user' && $ac == 'input') {
    $level = $_POST['level'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if ($query = mysqli_query($conn, "INSERT INTO tb_user (level,username,password,fullname,email)
    values ('$level','$username','$password','$fullname','$email')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
    }
} elseif ($modul == 'register' && $ac == 'input') {
    $username = $_POST['username'];
    $level = "pelamar";
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);
    if ($query = mysqli_query($conn, "INSERT INTO tb_user (level,username,password,fullname,email)
    values ('$level','$username','$password','$fullname','$email')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../index.php'; </script>";
    }
} elseif ($modul == 'postlowongan' && $ac == 'input') {
    $post = $_POST['summernote'];
    if ($query = mysqli_query($conn, "INSERT INTO postlowongan (post)
    values ('$post')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=lowongan'; </script>";
    }
}
