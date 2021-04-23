<?php
$kriteriaCount = mysqli_query($conn, "SELECT * FROM tb_kriteria order by id_kriteria");
$data = mysqli_num_rows($kriteriaCount);
$r = [];
$kriterias = mysqli_query($conn, "SELECT * FROM tb_kriteria ORDER BY id_kriteria ASC");
while ($row = mysqli_fetch_array($kriterias)) {
    $kriteriass = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria = '$row[id_kriteria]' LIMIT 0,1");
    while ($roww = mysqli_fetch_array($kriteriass)) {
        $pcs = explode("C", $roww['id_kriteria']);
        $c = $data - $pcs[1];
    }
    if ($c >= 1) {
        $r[$row['id_kriteria']] = $c;
    }
}

?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Nilai Preferensi</h3>
                    </div>
                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form method="post" action="?page=analisa_kriteria_tabel">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                <label>Kriteria Pertama</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div class="form-group">
                                                <label>Pernilaian</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                <label>Kriteria Kedua</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $no = 1;
                                    foreach ($r as $k => $v) : ?>
                                        <?php for ($i = 1; $i <= $v; $i++) : ?>
                                            <?php
                                            $rows = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria = '$k' LIMIT 0,1");
                                            while ($row = mysqli_fetch_array($rows)) : ?>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-3">
                                                        <div class="form-group">
                                                            <?php
                                                            $rows = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria = '$k' LIMIT 0,1");
                                                            while ($row = mysqli_fetch_array($rows)) : ?>
                                                                <input type="text" class="form-control" value="<?= $row['nama_kriteria'] ?>" readonly />
                                                                <input type="hidden" name="<?= $k ?><?= $no ?>" value="<?= $row['id_kriteria'] ?>" />
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group">
                                                            <select class="form-control" name="nl<?= $no ?>">
                                                                <?php
                                                                $rows = mysqli_query($conn, "SELECT * FROM tb_nilai ORDER BY id_nilai ASC");
                                                                while ($row = mysqli_fetch_array($rows)) :
                                                                ?>
                                                                    <option value="<?= $row['jumlah_nilai'] ?>"><?= $row['jumlah_nilai'] ?> - <?= $row['keterangan_nilai'] ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-3">
                                                        <div class="form-group">
                                                            <?php $pcs = explode("C", $k);
                                                            $nid = "C" . ($pcs[1] + $i);
                                                            $rows = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria = '$nid'");
                                                            while ($row = mysqli_fetch_array($rows)) : ?>
                                                                <input type="text" class="form-control" value="<?= $row['nama_kriteria'] ?>" readonly />
                                                                <input type="hidden" name="<?= $nid ?><?= $no ?>" value="<?= $row['id_kriteria'] ?>" />
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile;
                                            $no++; ?>
                                        <?php endfor; ?>
                                    <?php endforeach; ?>
                                    <button type="submit" name="submit" class="btn btn-dark"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>