<?php
session_start();
include '../koneksi.php';
$modul = $_GET['module'];
$ac = $_GET['act'];

if ($modul == 'kriteria' && $ac == 'ubah') {
    $nama_kriteria = $_POST['nama_kriteria'];
    $id_kriteria = $_POST['id_kriteria'];
    if ($query = mysqli_query($conn, "UPDATE tb_kriteria set nama_kriteria = '$nama_kriteria' 
    where id_kriteria = '$id_kriteria'")) {
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    }
} elseif ($modul == 'subkriteria' && $ac == 'ubah') {
    $nama_alternatif = $_POST['nama_alternatif'];
    $id_alternatif = $_POST['id_alternatif'];
    if ($query = mysqli_query($conn, "UPDATE tb_alternatif set nama_alternatif = '$nama_alternatif' 
    where id_alternatif = '$id_alternatif'")) {
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=subkriteria'; </script>";
    }
} elseif ($modul == 'user' && $ac == 'ubah') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $id = $_POST['id'];
    if (empty($_POST['password'])) {
        if ($query = mysqli_query($conn, "UPDATE tb_user set username = '$username',email ='$email',fullname ='$fullname' 
        where id = '$id'")) {
            echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        }
    } else {
        $password = md5($_POST['password']);
        if ($query = mysqli_query($conn, "UPDATE tb_user set username = '$username',password = '$password' 
        where id = '$id'")) {
            echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
        }
    }
} elseif ($modul == 'konfirmasi' && $ac == 'kirim') {
    $query = mysqli_query($conn, "Update tb_user set level = 'pelamar' where email='$_GET[email]'");
    echo "<script>alert('Berhasil Aktivasi Akun'); window.location.href='../index.php'</script>";
} elseif ($modul == 'konfirmasi_pelamar' && $ac == 'kirim') {
    $query = mysqli_query($conn, "Update tb_user set level = 'karyawan' where email='$_GET[email]'");
    echo "<script>alert('Terima kasih atas konfirmasinya'); window.location.href='../index.php'</script>";
}
