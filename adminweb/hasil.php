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

                    <div class="card-tools">
                        <ul class="pagination pagination-sm float-right">
                            <li class="page-item active"><a class="page-link" href="index.php?page=hasil">Bobot</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?page=hasil_hitung">Hasil</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?page=hasil_ranking">Perangkingan</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">


                    <div class="col-sm-12">
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
                                $no = 1;
                                $alt1a = mysqli_query($conn, "SELECT *,tb_calon_karyawan.id as id_calon FROM tb_calon_karyawan 
                                left join tb_pendidikan_kerja on tb_pendidikan_kerja.id_calon_karyawan = tb_calon_karyawan.id 
                                left join tb_pengalaman_kerja on tb_pengalaman_kerja.id_calon_karyawan = tb_calon_karyawan.id
                                group by tb_calon_karyawan.id");
                                while ($row1 = mysqli_fetch_array($alt1a)) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row1['nik'] ?></td>
                                        <td><?= $row1['nama_lengkap'] ?></td>
                                        <?php $usoz = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan 
                                        join tb_nilai on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id
                                        join jum_alt_kri on tb_nilai.id_alternatif = jum_alt_kri.id_alternatif
                                        where tb_calon_karyawan.id = '$row1[id_calon]'
                                        order by tb_calon_karyawan.id,jum_alt_kri.id_kriteria asc
                                        ");
                                        while ($rusoz = mysqli_fetch_array($usoz)) :
                                        ?>
                                            <td><?= number_format($rusoz['skor_alt_kri'], 4) ?></td>
                                        <?php endwhile; ?>
                                        <?php
                                        // $usoz = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan  
                                        // left join jum_alt_kri on tb_kk_pengajuan.id_alternatif = jum_alt_kri.id_alternatif 
                                        // where tb_kk_pengajuan.id_kk = '$row1[id_kk]'
                                        // order by id_kk_pengajuan asc
                                        // ");
                                        // while ($rusoz = mysqli_fetch_array($usoz)) :
                                        ?>
                                        <!-- <td></td> -->
                                    <?php endwhile; ?>
                                    </tr>
                                    <?php //endwhile; 
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>