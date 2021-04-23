<?php
session_start();
include '../koneksi.php';
$modul = $_GET['module'];
$ac = $_GET['act'];

if ($modul == 'kriteria' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_kriteria WHERE id_kriteria='$_POST[id_kriteria]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    }
} elseif ($modul == 'subkriteria' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_alternatif WHERE id_alternatif='$_POST[id_alternatif]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=subkriteria'; </script>";
    }
} elseif ($modul == 'user' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_user WHERE id='$_POST[id]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=user'; </script>";
    }
} elseif ($modul == 'pelamar' and $ac == 'hapus') {
    if (mysqli_query($conn, "DELETE FROM tb_calon_karyawan WHERE id='$_POST[id]'")) {
        echo "<script>alert('Berhasil Menghapus Data'); window.location.href='../adminweb/index.php?page=pelamar'; </script>";
    }
}
