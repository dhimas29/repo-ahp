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

                                <!-- <div class="card-tools"> -->
                                <ul class="pagination pagination-sm float-right">
                                    <li class="page-item active"><a class="page-link" href="index.php?page=laporan">Bobot</a></li>
                                    <li class="page-item"><a class="page-link" href="index.php?page=laporan_hitung">Hasil</a></li>
                                    <li class="page-item"><a class="page-link" href="index.php?page=laporan_ranking">Perangkingan</a></li>
                                </ul>
                                <!-- </div> -->
                                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="3" colspan="1" aria-sort="ascending" style="padding-bottom: 61px;">No.</th>
                                            <th class="sorting " tabindex="0" aria-controls="example2" rowspan="3" colspan="1" style="text-align: center;padding-bottom: 61px;">Nik</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="3" colspan="1" style="text-align: center;padding-bottom: 61px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="<?php $kri1a = mysqli_query($conn, "SELECT * FROM tb_kriteria ORDER BY id_kriteria ASC");
                                                                                                                            echo mysqli_num_rows($kri1a); ?>" class="text-center" style="text-align: center;">Kriteria</th>
                                        </tr>
                                        <tr>
                                            <?php
                                            $kri2a = mysqli_query($conn, "SELECT * FROM tb_kriteria ORDER BY id_kriteria ASC");
                                            while ($row = mysqli_fetch_array($kri2a)) : ?>
                                                <th><?= $row['nama_kriteria'] ?></th>
                                            <?php endwhile; ?>
                                        </tr>
                                        <tr class="success">
                                            <?php
                                            $bobot1 = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                            while ($row = mysqli_fetch_array($bobot1)) : ?>
                                                <td style="background-color: azure;font-weight: bold ;"><?= number_format($row['bobot_kriteria'], 4, '.', ',') ?></td>
                                            <?php endwhile; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $p      = new PagingLapor();
                                        $batas  = 5;
                                        $posisi = $p->cariPosisi($batas);
                                        $no = 1;
                                        $alt1a = mysqli_query($conn, "SELECT *,tb_calon_karyawan.id as id_calon FROM tb_calon_karyawan 
            left join tb_pendidikan_kerja on tb_pendidikan_kerja.id_calon_karyawan = tb_calon_karyawan.id 
            left join tb_pengalaman_kerja on tb_pengalaman_kerja.id_calon_karyawan = tb_calon_karyawan.id
            left join tb_nilai on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id
            left join tb_alternatif on tb_alternatif.id_alternatif = tb_nilai.id_alternatif
            left join tb_user on tb_user.email = tb_calon_karyawan.email
                                where tb_user.level = 'pelamar'
            group by tb_calon_karyawan.id
            order by id_kriteria asc limit $posisi,$batas
            ");
                                        while ($row1 = mysqli_fetch_array($alt1a)) :
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row1['nik'] ?></td>
                                                <td><?= $row1['nama_lengkap'] ?></td>
                                                <?php $usoz = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan 
                                                join tb_nilai on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id
                                                join jum_alt_kri on tb_nilai.id_alternatif = jum_alt_kri.id_alternatif
                                                left join tb_user on tb_user.email = tb_calon_karyawan.email
                                                            where tb_user.level = 'pelamar'
                                                and tb_calon_karyawan.id = '$row1[id_calon]'
                                                order by tb_calon_karyawan.id,jum_alt_kri.id_kriteria asc
                                                ");
                                                while ($rusoz = mysqli_fetch_array($usoz)) :
                                                ?>
                                                    <td><?= number_format($rusoz['skor_alt_kri'], 4) ?></td>
                                                <?php endwhile; ?>
                                            <?php endwhile; ?>
                                            </tr>
                                            <?php $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT *,tb_calon_karyawan.id as id_calon FROM tb_calon_karyawan 
                left join tb_pendidikan_kerja on tb_pendidikan_kerja.id_calon_karyawan = tb_calon_karyawan.id 
                left join tb_pengalaman_kerja on tb_pengalaman_kerja.id_calon_karyawan = tb_calon_karyawan.id
                left join tb_nilai on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id
                left join tb_alternatif on tb_alternatif.id_alternatif = tb_nilai.id_alternatif
                left join tb_user on tb_user.email = tb_calon_karyawan.email
                                where tb_user.level = 'pelamar'
                group by tb_calon_karyawan.id
                order by id_kriteria asc "));
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
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
</section>