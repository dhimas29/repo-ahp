<?php
error_reporting(1);
session_start();
include "../koneksi.php";
//function antiinjection($data){
//	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
//	return $filter_sql;
// }
$username = $_POST['username'];
$pass     = md5($_POST['password']);

$login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$pass'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// Apabila username dan password ditemukan

if (($r['username'] == $username) && ($r['password'] == $pass) && ($r['level'] != '-')) {

    $_SESSION['id']        = $r['id'];
    $_SESSION['username']     = $r['username'];
    $_SESSION['email']      = $r['email'];
    $_SESSION['fullname']      = $r['fullname'];
    $_SESSION['password']     = $r['password'];
    $_SESSION['level']     = $r['level'];
    echo "<script>alert('Berhasil Login'); window.location.href='../adminweb/index.php'; </script>";
} elseif (($r['username'] == $username) && ($r['password'] == $pass) && ($r['level'] == '-')) {
    echo "<script>alert('Akun anda belom dikonfirmasi!'); 
    window.location.href='../'; </script>";
} else {
    echo "<script>alert('Login Gagal, Username atau Password Anda Salah!'); 
    window.location.href='../'; </script>";
}
