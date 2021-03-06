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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <!-- <h3 class="card-title">Bobot</h3> -->
                    <div class="card-tools float-left">
                        <ul class="pagination pagination-sm">
                            <li class="page-item active">
                                <!-- <form action="../proses/prosespos.php?module=pos&act=kirim" method="POST">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM ranking 
                                    join tb_nilai on ranking.id_calon_karyawan = tb_nilai.id_calon_karyawan 
                                    group by ranking.id_calon_karyawan
                                    order by periode desc");
                                    while ($row = mysqli_fetch_array($query)) : ?>
                                        <input type="hidden" value="<?= $row['id_calon_karyawan'] ?>" name="pos[<?php echo $row['id_calon_karyawan'] ?>]">
                                    <?php endwhile; ?>
                                    <button type="submit" class="page-link">Post</button>
                                    <a href="" type="submit" class="page-link">Post</a>
                                </form> -->
                            </li>
                        </ul>
                    </div>
                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                            <li class="page-item"><a class="page-link" href="index.php?page=hasil">Bobot</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?page=hasil_hitung">Hasil</a></li>
                            <li class="page-item active"><a class="page-link" href="index.php?page=hasil_ranking">Perangkingan</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" aria-sort="ascending">No.</th>
                                    <th class="sorting " tabindex="0" aria-controls="example2" style="text-align: center;">Nik</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" style="text-align: center;">Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" style="text-align: center;">Bobot Skor</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" style="text-align: center;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $p      = new PagingHasilRanking();
                                $batas  = 5;
                                $posisi = $p->cariPosisi($batas);
                                $no = 1;
                                $alt1a = mysqli_query($conn, "SELECT *,ranking.label as rank,tb_nilai.periode as period 
                                FROM tb_nilai 
                                left join ranking on tb_nilai.id_calon_karyawan = ranking.id_calon_karyawan
                                left join tb_calon_karyawan on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id 
                                left join tb_user on tb_user.email = tb_calon_karyawan.email
                                where tb_user.level ='pelamar'
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
                                        <!-- <td><?= $row1['period'] ?></td> -->
                                    </tr>
                                <?php endwhile; ?>
                                <?php $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT *,ranking.label as rank,tb_nilai.periode as period 
                                FROM tb_nilai 
                                left join ranking on tb_nilai.id_calon_karyawan = ranking.id_calon_karyawan
                                left join tb_calon_karyawan on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id 
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
        </div>
    </div>
</section>