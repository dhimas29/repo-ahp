<?php
$altObj = mysqli_query($conn, "SELECT * FROM tb_alternatif");

$kriObj = mysqli_query($conn, "SELECT * FROM tb_kriteria");

$ranObj = mysqli_query($conn, "SELECT * FROM ranking");

$stmt = mysqli_query($conn, "SELECT * FROM tb_alternatif a, tb_kriteria b, ranking c where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria order by a.id_alternatif asc");

$stmty = mysqli_query($conn, "SELECT * FROM tb_alternatif a, tb_kriteria b, ranking c where a.id_alternatif=c.id_alternatif and b.id_kriteria=c.id_kriteria order by a.id_alternatif asc");

$count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM ranking"));
$stmtx1y = mysqli_query($conn, "SELECT * FROM tb_kriteria");
$stmtx2y = mysqli_query($conn, "SELECT * FROM tb_kriteria");
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Laporan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="card-body p-0">
                            <div class="col-sm-12">
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item"><a class="page-link" href="index.php?page=laporan">Bobot</a></li>
                                    <li class="page-item"><a class="page-link" href="index.php?page=laporan_hitung">Hasil</a></li>
                                    <li class="page-item active"><a class="page-link" href="index.php?page=laporan_ranking">Perangkingan</a></li>
                                </ul>
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" aria-sort="ascending">No.</th>
                                            <th class="sorting " tabindex="0" aria-controls="example2" style="text-align: center;">Nik</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" style="text-align: center;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" style="text-align: center;">Bobot Skor</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" style="text-align: center;">Keterangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" style="text-align: center;">Kirim Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $p      = new PagingLaporRanking();
                                        $batas  = 5;
                                        $posisi = $p->cariPosisi($batas);
                                        $no = 1;
                                        $alt1a = mysqli_query($conn, "SELECT *,ranking.label as rank,tb_nilai.periode as period 
                                FROM tb_nilai 
                                left join ranking on tb_nilai.id_calon_karyawan = ranking.id_calon_karyawan
                                left join tb_calon_karyawan on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id 
                                left join tb_user on tb_user.email = tb_calon_karyawan.email
                                where tb_user.level = 'pelamar'
                                group by tb_nilai.id_calon_karyawan
                                order by ranking.skor_bobot,periode desc");
                                        while ($row1 = mysqli_fetch_array($alt1a)) : ?>
                                            <?php
                                            if ($no <= 1) {
                                                $up = mysqli_query($conn, "UPDATE ranking set label ='Lulus' where id_calon_karyawan ='$row1[id]'");
                                            } elseif ($no > 2) {
                                                $up = mysqli_query($conn, "UPDATE ranking set label ='Tidak Lulus' where id_calon_karyawan ='$row1[id]'");
                                            }
                                            ?>
                                            <tr style="text-align: center;">
                                                <td><?= $no++; ?></td>
                                                <td><?= $row1['id'] ?></td>
                                                <td><?= $row1['nama_lengkap'] ?></td>
                                                <td><?= round($row1['skor_bobot'], 4) ?></td>
                                                <td><?= $row1['rank'] ?></td>
                                                <td><a type="button" <?php $cekdb = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_user where email='$row1[email]'"));
                                                                        if ($cekdb['level'] == 'pelamar') { ?> class="btn btn-sm btn-success" <?php } else { ?> class="btn btn-sm btn-success disabled" <?php } ?> href="../proses/prosespos.php?module=pos&act=kirim&id=<?php echo $row1['id_calon_karyawan'] ?>">Kirim</a></td>
                                            </tr>
                                        <?php endwhile; ?>
                                        <?php $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT *,ranking.label as rank,tb_nilai.periode as period 
                                FROM tb_nilai 
                                left join ranking on tb_nilai.id_calon_karyawan = ranking.id_calon_karyawan
                                left join tb_calon_karyawan on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id 
                                left join tb_user on tb_user.email = tb_calon_karyawan.email
                                where tb_user.level = 'pelamar'
                                group by tb_nilai.id_calon_karyawan
                                order by ranking.skor_bobot,periode desc"));
                                        $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                                        $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                                        ?>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <ul class="pagination">
                                        <?php echo "$linkHalaman"; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>