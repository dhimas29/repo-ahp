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
} elseif ($modul == 'pelamar_nilai' && $ac == 'input') {
    $id_calon_karyawan = $_POST['id_calon_karyawan'];
    $tkk = mysqli_query($conn, "SELECT * FROM tb_kriteria 
    where id_kriteria != 'C1' && id_kriteria != 'C2'
    order by id_kriteria");
    $dta = mysqli_num_rows($tkk);
    while ($row = mysqli_fetch_array($tkk)) {
        $kriteria = $_POST['kriteria'][$row['id_kriteria']];
        if (($kriteria >= 90) && ($kriteria <= 100)) {
            $nilai = "A";
        } elseif (($kriteria >= 80) && ($kriteria < 90)) {
            $nilai = "B";
        } elseif (($kriteria >= 70) && ($kriteria < 80)) {
            $nilai = "C";
        } elseif (($kriteria >= 65) && ($kriteria < 70)) {
            $nilai = "D";
        } else {
            $nilai = "E";
        }
        $ck = mysqli_query($conn, "SELECT id_alternatif FROM tb_alternatif
        where id_kriteria = '$row[id_kriteria]' && nama_alternatif = '$nilai'");
        $ck_fetch = mysqli_fetch_array($ck);

        $cek_data = mysqli_query($conn, "SELECT * FROM tb_nilai 
        join tb_alternatif on tb_nilai.id_alternatif = tb_alternatif.id_alternatif
        where id_calon_karyawan = '$id_calon_karyawan' && id_kriteria ='$row[id_kriteria]' && periode='2021'");
        $count_data = mysqli_num_rows($cek_data);

        if ($count_data > 0) {
            // $query = mysqli_query($conn, "UPDATE tb_nilai set id_alternatif = '$ck_fetch[id_alternatif]',nilai ='$kriteria',periode = '2022'
            // where id_calon_karyawan ='$id_calon_karyawan'");
            echo "<script>alert('Data Pada Periode Ini Sudah Ada !'); window.location.href='../adminweb/index.php?page=pelamar'; </script>";
        } else {
            $query = mysqli_query($conn, "INSERT INTO tb_nilai 
            (id_calon_karyawan,id_alternatif,nilai,periode)
            values ('$id_calon_karyawan','$ck_fetch[id_alternatif]','$kriteria','2021')");
            // echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=pelamar'; </script>";
        }
        var_dump($id_calon_karyawan);
    }
    die;
    $nilai_tertulis = $_POST['nilai_tertulis'];
    $nilai_praktek = $_POST['nilai_praktek'];
    if ($query = mysqli_query($conn, "INSERT INTO tb_nilai (id_calon_karyawan,nilai_wawancara,nilai_tertulis,nilai_praktek)
    values ('$id_calon_karyawan','$nilai_wawancara','$nilai_tertulis','$nilai_praktek')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=pelamar'; </script>";
    }
} elseif ($modul == 'pelamar_pengalaman' && $ac == 'input') {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $kerja_awal = $_POST['kerja_awal'];
    $kerja_akhir = $_POST['kerja_akhir'];
    $tgl1 = new DateTime($kerja_awal);
    $tgl2 = new DateTime($kerja_akhir);
    $pengalaman_kerja = date_diff($tgl1, $tgl2);
    $bidang_kerja = $_POST['bidang_kerja'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $id_calon_karyawan = $_POST['id_calon_karyawan'];
    $qcek = mysqli_query($conn, "SELECT * FROM tb_pengalaman_kerja where id_calon_karyawan = '$id_calon_karyawan'");
    $cek = mysqli_num_rows($qcek);

    if ($pengalaman_kerja->days > 0) {
        $id_alternatif = 'A001';
    } else {
        $id_alternatif = 'A002';
    }

    $cek_kriteria = mysqli_query($conn, "SELECT * FROM tb_alternatif
    where id_alternatif = '$id_alternatif'");
    $query_kriteria = mysqli_fetch_array($cek_kriteria);

    $cek_data = mysqli_query($conn, "SELECT * FROM tb_nilai 
        join tb_alternatif on tb_nilai.id_alternatif = tb_alternatif.id_alternatif
        where id_calon_karyawan = '$id_calon_karyawan' and id_kriteria ='$query_kriteria[id_kriteria]' and periode='2021'");
    $count_data = mysqli_num_rows($cek_data);
    $query_data = mysqli_fetch_array($cek_data);
    if ($cek > 0) {
        $query = mysqli_query($conn, "UPDATE tb_pengalaman_kerja set nama_perusahaan = '$nama_perusahaan',kerja_awal = '$kerja_awal',kerja_akhir='$kerja_akhir',
        bidang_kerja='$bidang_kerja',jabatan='$jabatan',gaji='$gaji' where id_calon_karyawan = '$id_calon_karyawan'");
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=pengalaman'; </script>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_pengalaman_kerja (id_calon_karyawan,nama_perusahaan,kerja_awal,kerja_akhir,bidang_kerja,jabatan,gaji)
        values ('$id_calon_karyawan','$nama_perusahaan','$kerja_awal','$kerja_akhir','$bidang_kerja','$jabatan','$gaji')");
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=pengalaman'; </script>";
    }

    if ($count_data > 0) {
        $query1 = mysqli_query($conn, "UPDATE tb_nilai set id_alternatif ='$id_alternatif',nilai='$pengalaman_kerja->days',periode='2021'
        where id_calon_karyawan = '$id_calon_karyawan' and id='$query_data[id]'");
    } else {
        $query1 = mysqli_query($conn, "INSERT INTO tb_nilai (id_calon_karyawan,id_alternatif,nilai,periode)
        values('$id_calon_karyawan','$id_alternatif','$pengalaman_kerja->days','2021')");
    }
} elseif ($modul == 'pelamar_pendidikan' && $ac == 'input') {
    $institusi = $_POST['institusi'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $kualifikasi = $_POST['kualifikasi'];
    $program_studi = $_POST['program_studi'];
    $nilai_akhir = $_POST['nilai_akhir'];
    $id_calon_karyawan = $_POST['id_calon_karyawan'];
    $cek_kriteria = mysqli_query($conn, "SELECT id_kriteria FROM tb_alternatif
    where id_alternatif = '$kualifikasi'");
    $query_kriteria = mysqli_fetch_array($cek_kriteria);

    $cek_data = mysqli_query($conn, "SELECT * FROM tb_nilai 
        join tb_alternatif on tb_nilai.id_alternatif = tb_alternatif.id_alternatif
        where id_calon_karyawan = '$id_calon_karyawan' and id_kriteria ='$query_kriteria[id_kriteria]' 
        and periode='2021'");
    $count_data = mysqli_num_rows($cek_data);
    $query_data = mysqli_fetch_array($cek_data);

    $qcek = mysqli_query($conn, "SELECT * FROM tb_pendidikan_kerja 
    where id_calon_karyawan = '$id_calon_karyawan'");
    $cek = mysqli_num_rows($qcek);
    if ($cek > 0) {
        $query = mysqli_query($conn, "UPDATE tb_pendidikan_kerja set institusi = '$institusi',tahun_lulus = '$tahun_lulus',kualifikasi='$kualifikasi',
        program_studi='$program_studi',nilai_akhir='$nilai_akhir' where id_calon_karyawan = '$id_calon_karyawan'");
        echo "<script>alert('Berhasil Mengubah Data'); window.location.href='../adminweb/index.php?page=pendidikan'; </script>";
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_pendidikan_kerja (id_calon_karyawan,institusi,tahun_lulus,kualifikasi,program_studi,nilai_akhir)
        values ('$id_calon_karyawan','$institusi','$tahun_lulus','$kualifikasi','$program_studi','$nilai_akhir')");
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=pendidikan'; </script>";
    }
    if ($count_data > 0) {
        $query1 = mysqli_query($conn, "UPDATE tb_nilai set id_alternatif ='$kualifikasi',periode='2021'
        where id_calon_karyawan = '$id_calon_karyawan' and id='$query_data[id]'");
    } else {
        $query1 = mysqli_query($conn, "INSERT INTO tb_nilai (id_calon_karyawan,id_alternatif,periode)
        values('$id_calon_karyawan','$kualifikasi','2021')");
    }
} elseif ($modul == 'register' && $ac == 'input') {
    $username = $_POST['username'];
    $level = "-";
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $password = md5($_POST['password']);
    if ($query = mysqli_query($conn, "INSERT INTO tb_user (level,username,password,fullname,email)
    values ('$level','$username','$password','$fullname','$email')")) {
        echo "<script>window.location.href='prosespos.php?module=konfirmasi&act=kirim&email=$email&fullname=$fullname'; </script>";
    }
} elseif ($modul == 'postlowongan' && $ac == 'input') {
    $post = $_POST['summernote'];
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    if ($query = mysqli_query($conn, "INSERT INTO postlowongan (judul,post,tanggal)
    values ('$judul','$post','$tanggal')")) {
        echo "<script>alert('Berhasil Menambah Data'); window.location.href='../adminweb/index.php?page=lowongan'; </script>";
    }
}
