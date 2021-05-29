<?php
session_start();
include '../koneksi.php';
$modul = $_GET['module'];
$ac = $_GET['act'];

use PHPMailer\PHPMailer\PHPMailer;

if ($modul == 'pos' && $ac == 'kirim') {
    $n = count($_POST['pos']);
    var_dump($n);

    // for ($i = 1; $i <= $n; $i++) {
    $tkk = mysqli_query($conn, "SELECT * FROM ranking");
    while ($rkk = mysqli_fetch_array($tkk)) {
        $id = $_POST['pos'][$rkk['id_calon_karyawan']];
        $query = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan
            where id = '$id'");
        $row = mysqli_fetch_array($query);
        var_dump($row['id']);

        require '../PHPMailer/Exception.php';
        require '../PHPMailer/PHPMailer.php';
        require '../PHPMailer/SMTP.php';
        $mail = new PHPMailer();
        $email = $row['email'];
        try {
            //Server settings
            $mail->SMTPDebug = 1;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'skripsi2021faqih@gmail.com';                     // SMTP username
            $mail->Password   = '@skripsi123';                               // SMTP password
            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('skripsi2021faqih@gmail.com', 'Faqih');
            $mail->addAddress($email);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Pengumuman Seleksi';
            $mail->Body    = 'Halo ' . $row['nama_lengkap'] . '<br><br>
            Berdasarkan test yang sudah dikerjakan anda di nyatakan <span style="color:red"></span>';

            $mail->send();
            echo "<script>alert('Berhasil Mengirim Email'); window.location.href='../adminweb/index.php?page=hasil_ranking'; </script>";
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
} else if ($modul == 'konfirmasi' && $ac == 'kirim') {
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
    $mail = new PHPMailer();
    $email = $_GET['email'];
    $fullname = $_GET['fullname'];
    try {
        //Server settings
        $mail->SMTPDebug = 1;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'skripsi2021faqih@gmail.com';                     // SMTP username
        $mail->Password   = '@skripsi123';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('skripsi2021faqih@gmail.com', 'Faqih');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Konfirmasi Akun';
        $mail->Body    = 'Halo ' . $fullname . '<br><br>
            <p>Silahkan klik link berikut untuk aktivasi login anda </p>
            <a target="_blank" href="localhost/skripsi/proses/prosesubah.php?module=konfirmasi&act=kirim&email=' . $email . '">localhost/skripsi/proses/prosesubah.php?module=pos&act=konfirmasi</a>';

        $mail->send();
        // echo 'Message has been sent';
        echo "<script>alert('Berhasil Daftar Akun'); window.location.href='../index.php?konfirmasi=berhasil'; </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
// }
die;

$nama_kriteria = $_POST['nama_kriteria']['13'];
$bobot_kriteria = 0;
$id_kriteria = $_POST['id_kriteria'];
    // if ($query = mysqli_query($conn, "INSERT INTO tb_kriteria (id_kriteria,nama_kriteria,bobot_kriteria) 
    // Values ('$id_kriteria','$nama_kriteria','$bobot_kriteria')")) {
    //     echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=kriteria'; </script>";
    // }
// }
