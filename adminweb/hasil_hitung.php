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
                            <li class="page-item"><a class="page-link" href="index.php?page=hasil">Bobot</a></li>
                            <li class="page-item active"><a class="page-link" href="index.php?page=hasil_hitung">Hasil</a></li>
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
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="3" colspan="1" aria-sort="ascending" style="padding-bottom: 31px;">No.</th>
                                    <th class="sorting " tabindex="0" aria-controls="example2" rowspan="3" colspan="1" style="text-align: center;padding-bottom: 31px;">Nik</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="3" colspan="1" style="text-align: center;padding-bottom: 31px;">Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="<?php $kri1a = mysqli_query($conn, "SELECT * FROM tb_kriteria ORDER BY id_kriteria ASC");
                                                                                                                    echo mysqli_num_rows($kri1a); ?>" class="text-center" style="text-align: center;">Kriteria</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="3" colspan="1" style="text-align: center;padding-bottom: 31px;">Total Skor</th>
                                </tr>
                                <?php
                                $no = 1;
                                $kri2b = mysqli_query($conn, "SELECT *FROM tb_kriteria ORDER BY id_kriteria ASC");
                                while ($row = mysqli_fetch_array($kri2b)) : ?>
                                    <th><?= $row['nama_kriteria'] ?></th>
                                <?php endwhile; ?>
                            </thead>
                            <tbody>
                                <?php
                                $value = 0;
                                $jml_kriteria = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_kriteria"));
                                $datakk = mysqli_query(
                                    $conn,
                                    "SELECT *,
                            tb_nilai.id_alternatif as altrid,
                            tb_alternatif.id_kriteria as alid 
                            FROM tb_nilai 
                            left join tb_alternatif on tb_nilai.id_alternatif = tb_alternatif.id_alternatif
                            left join tb_kriteria on tb_alternatif.id_kriteria = tb_kriteria.id_kriteria
                            "
                                );
                                while ($ro = mysqli_fetch_array($datakk)) : ?>
                                <?php
                                    $ran = mysqli_query(
                                        $conn,
                                        "SELECT * FROM jum_alt_kri where id_kriteria='$ro[alid]' and id_alternatif='$ro[altrid]'
							"
                                    );
                                    while ($ranz = mysqli_fetch_array($ran)) {
                                        $norx = $ranz['skor_alt_kri'] * $ro['bobot_kriteria'];
                                    }
                                    $query = mysqli_query($conn, "UPDATE jum_alt_kri
							SET
								hasil_alt_kri = '$norx'
							WHERE
								id_alternatif = '$ro[altrid]'
							AND
								id_kriteria = '$ro[alid]'");
                                endwhile;
                                ?>
                                <?php
                                $data = mysqli_query($conn, "SELECT * FROM tb_nilai 
                        left join tb_calon_karyawan on tb_calon_karyawan.id = tb_nilai.id_calon_karyawan 
                        left join ranking on ranking.id_calon_karyawan = tb_nilai.id_calon_karyawan
					group by tb_nilai.id_calon_karyawan order by ranking.skor_bobot desc");
                                while ($rowdata = mysqli_fetch_array($data)) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $rowdata['nik'] ?></td>
                                        <td><?= $rowdata['nama_lengkap'] ?></td>
                                        <?php
                                        $uso = mysqli_query($conn, "SELECT * FROM tb_nilai 
                                left join jum_alt_kri on tb_nilai.id_alternatif = jum_alt_kri.id_alternatif
                                where id_calon_karyawan = '$rowdata[id_calon_karyawan]'
                                order by id_calon_karyawan,id_kriteria asc");
                                        while ($ruso = mysqli_fetch_array($uso)) :
                                        ?>
                                            <td><?php
                                                if (!$ruso['nilai']) {
                                                    echo round(($ruso['hasil_alt_kri']), 4);
                                                } else {
                                                    echo round(($ruso['hasil_alt_kri'] * $ruso['nilai']), 4);
                                                } ?>
                                            </td>
                                        <?php endwhile; ?>
                                        <?php
                                        $nowarga = mysqli_query($conn, "SELECT * FROM tb_nilai group by id_calon_karyawan");
                                        while ($rowarga = mysqli_fetch_array($nowarga)) {
                                            $jml = mysqli_query(
                                                $conn,
                                                "SELECT *,AVG(jum_alt_kri.hasil_alt_kri*tb_nilai.nilai) as total from jum_alt_kri 
                                    left join tb_nilai on tb_nilai.id_alternatif = jum_alt_kri.id_alternatif
                                    where tb_nilai.id_calon_karyawan = '$rowarga[id_calon_karyawan]'"
                                            );
                                            while ($tesjml = mysqli_fetch_array($jml)) {
                                                if ($query = mysqli_query($conn, "INSERT INTO ranking(skor_bobot,id_calon_karyawan)
						            values('$tesjml[total]','$rowarga[id_calon_karyawan]')")) {
                                                } else {
                                                    $query = mysqli_query($conn, "UPDATE ranking set skor_bobot = '$tesjml[total]' 
                                        where id_calon_karyawan = '$rowarga[id_calon_karyawan]'");
                                                }
                                            }
                                        }
                                        ?>
                                        <?php
                                        $totalz = mysqli_query($conn, "SELECT * FROM ranking where id_calon_karyawan = '$rowdata[id_calon_karyawan]'");
                                        $rowtotalz = mysqli_fetch_array($totalz);
                                        ?>
                                        <td><?= round($rowtotalz['skor_bobot'], 4) ?></td>
                                        <!-- <td><?= $rowqs['label'] ?></td> -->
                                    <?php endwhile; ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>