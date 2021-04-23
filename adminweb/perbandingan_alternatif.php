<?php
if (isset($_GET['id'])) {
    $altCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$_GET[id]'"));

    $no = 1;
    $r = [];
    $nid = [];

    $alt1 = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$_GET[id]'");
    while ($row = mysqli_fetch_array($alt1)) {
        $alt2 = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$_GET[id]'");
        while ($roww = mysqli_fetch_array($alt2)) {
            $nid[$row['id_alternatif']][] = $roww['id_alternatif'];
        }
        $total = $altCount - $no;
        if ($total >= 1) {
            $r[$row['id_alternatif']] = $total;
        }
        $no++;
    }
    $ni = 1;
    foreach ($nid as $key => $value) {
        array_splice($nid[$key], 0, $ni++);
    }
    $ne = count($nid) - 1;
    array_splice($nid, $ne, 1);
} else {
    $r = [];
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
                                <form method="post" action="?page=analisa_alternatif_tabel">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-3">
                                            <div class="form-group">
                                                <p style="padding:10px 0;"><label>Pilih Kriteria</label></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-9">
                                            <div class="form-group">
                                                <select class="form-control" id="kriteria" name="kriteria">
                                                    <option value="<?php echo $_GET['id'] ?>">Pilih</option>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria ORDER BY id_kriteria ASC");
                                                    while ($row = mysqli_fetch_array($query)) : ?>
                                                        <option value="<?= $row['id_kriteria'] ?>"><?= $row['nama_kriteria'] ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
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
                                        <?php $j = 0;
                                        for ($i = 1; $i <= $v; $i++) : ?>
                                            <?php

                                            $rows = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_alternatif='$k' LIMIT 0,1");
                                            while ($row = mysqli_fetch_array($rows)) : ?>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-3">
                                                        <div class="form-group">
                                                            <?php
                                                            $rows = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_alternatif='$k'");
                                                            while ($row = mysqli_fetch_array($rows)) : ?>
                                                                <input type="text" class="form-control" value="<?= $row['nama_alternatif'] ?>" readonly />
                                                                <input type="hidden" name="<?= $k ?><?= $no ?>" value="<?= $row['id_alternatif'] ?>" />
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <div class="form-group">
                                                            <select class="form-control" name="nl<?= $no ?>">
                                                                <?php
                                                                $stmt1 = mysqli_query($conn, "SELECT * FROM tb_nilai ORDER BY id_nilai ASC");
                                                                while ($row2 = mysqli_fetch_array($stmt1)) : ?>
                                                                    <option value="<?= $row2['jumlah_nilai'] ?>"><?= $row2['jumlah_nilai'] ?> - <?= $row2['keterangan_nilai'] ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-3">
                                                        <div class="form-group">
                                                            <?php
                                                            $rows = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_alternatif='" . $nid[$k][$j] . "'");
                                                            while ($row3 = mysqli_fetch_array($rows)) : ?>
                                                                <input type="text" class="form-control" value="<?= $row3['nama_alternatif'] ?>" readonly />
                                                                <input type="hidden" name="<?= $nid[$k][$j] ?><?= $no ?>" value="<?= $row3['id_alternatif'] ?>" />
                                                            <?php endwhile; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile;
                                            $no++;
                                            $j++; ?>
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
</section>