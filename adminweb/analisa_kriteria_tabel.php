<?php

$bobotObj = mysqli_query($conn, "SELECT * FROM tb_kriteria");
$count = mysqli_num_rows($bobotObj);

if (isset($_POST['submit'])) {
    $oke = mysqli_query($conn, "DELETE FROM analisa_kriteria");
    $kriteriaObj = mysqli_query($conn, "SELECT * FROM tb_kriteria");
    $kriteriaCount = mysqli_num_rows($kriteriaObj);
    $r = [];
    $kriterias = mysqli_query($conn, "SELECT * FROM tb_kriteria");
    while ($row = mysqli_fetch_array($kriterias)) {
        $kriteriass = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria = '$row[id_kriteria]'");
        while ($roww = mysqli_fetch_array($kriteriass)) {
            $pcs = explode("C", $roww['id_kriteria']);
            $c = $kriteriaCount - $pcs[1];
        }
        if ($c >= 1) {
            $r[$row['id_kriteria']] = $c;
        }
    }
    $no = 1;
    foreach ($r as $k => $v) {
        for ($i = 1; $i <= $v; $i++) {
            $pcs = explode("C", $k);
            $nid = "C" . ($pcs[1] + $i);

            if ($query = mysqli_query(
                $conn,
                "INSERT INTO analisa_kriteria 
				VALUES('" . $_POST[$k . $no] . "', '" . $_POST['nl' . $no] . "', '0', '" . $_POST[$nid . $no] . "')"
            )) {
                // ...
            } else {
                $query = mysqli_query(
                    $conn,
                    "UPDATE analisa_kriteria SET hasil_analisa_kriteria='" . $_POST['nl' . $no] . "' WHERE kriteria_pertama='" . $_POST[$k . $no] . "' AND kriteria_kedua='" . $_POST[$nid . $no] . "'"
                );
            }

            if ($query = mysqli_query(
                $conn,
                "INSERT INTO analisa_kriteria VALUES('" . $_POST[$nid . $no] . "', '" . (1 / $_POST['nl' . $no]) . "', '0', '" . $_POST[$k . $no] . "')"
            )) {
                // ...
            } else {
                $query = mysqli_query(
                    $conn,
                    "UPDATE analisa_kriteria SET hasil_analisa_kriteria='" . (1 / $_POST['nl' . $no]) . "' WHERE kriteria_pertama='" . $_POST[$nid . $no] . "' AND kriteria_kedua='" . $_POST[$k . $no] . "'"
                );
            }
            $no++;
        }
    }
}

if (isset($_POST['hapus'])) {
    $query = mysqli_query($conn, "DELETE FROM analisa_kriteria");
    header("location: analisa-kriteria.php");
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Analisa Kriteria Tabel</h3>
                    </div>
                    <div class="card-body">
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Antar Kriteria</th>
                                    <?php
                                    $bobots1 = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                    while ($row = mysqli_fetch_array($bobots1)) : ?>
                                        <th><?= $row['nama_kriteria'] ?></th>
                                    <?php endwhile; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $bobots2 = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                while ($baris = mysqli_fetch_array($bobots2)) : ?>
                                    <tr>
                                        <th class="active"><?= $baris['nama_kriteria'] ?></th>
                                        <?php $bobots3 = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                        while ($kolom = mysqli_fetch_array($bobots3)) : ?>
                                            <td>
                                                <?php
                                                if ($baris['id_kriteria'] == $kolom['id_kriteria']) {
                                                    echo '1';
                                                    if ($query = mysqli_query($conn, "INSERT INTO analisa_kriteria VALUES('$baris[id_kriteria]', '1', 0, '$kolom[id_kriteria]')")) {
                                                        // ...
                                                    } else {
                                                        $query = "UPDATE  analisa_kriteria SET nilai_analisa_kriteria = '1' WHERE kriteria_pertama = '$baris[id_kriteria]' and kriteria_kedua = '$kolom[id_kriteria]'";
                                                    }
                                                } else {
                                                    $query = mysqli_query($conn, "SELECT * FROM analisa_kriteria WHERE kriteria_pertama = '$baris[id_kriteria]' AND kriteria_kedua = '$kolom[id_kriteria]' LIMIT 0,1");
                                                    $row = mysqli_fetch_array($query);
                                                    echo number_format($row['nilai_analisa_kriteria'], 4, '.', ',');
                                                }
                                                ?>
                                            </td>
                                        <?php endwhile; ?>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr class="bg-infox">
                                    <th>Jumlah</th>
                                    <?php
                                    $stmt5 = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                    while ($row = mysqli_fetch_array($stmt5)) : ?>
                                        <th>
                                            <?php
                                            $querys =
                                                mysqli_query($conn, "SELECT sum(nilai_analisa_kriteria) AS jumkr FROM analisa_kriteria WHERE kriteria_kedua='$row[id_kriteria]'");
                                            $rows = mysqli_fetch_array($querys);
                                            echo number_format($rows['jumkr'], 4, '.', ',');
                                            $query =
                                                mysqli_query($conn, "UPDATE tb_kriteria SET jumlah_kriteria='$rows[jumkr]' WHERE id_kriteria='$row[id_kriteria]'");
                                            ?>
                                        </th>
                                    <?php endwhile; ?>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Perbandingan</th>
                                    <?php
                                    $bobots1x = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                    while ($row2x = mysqli_fetch_array($bobots1x)) : ?>
                                        <th><?= $row2x['nama_kriteria'] ?></th>
                                    <?php endwhile; ?>
                                    <th class="bg-infox">Jumlah</th>
                                    <th class="bg-successx">Prioritas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bobots2x = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                while ($baris = mysqli_fetch_array($bobots2x)) : ?>
                                    <tr>
                                        <th class="active"><?= $baris['nama_kriteria'] ?></th>
                                        <?php
                                        $stmt4x = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                        while ($kolom = mysqli_fetch_array($stmt4x)) : ?>
                                            <td>
                                                <?php
                                                if ($baris['id_kriteria'] == $kolom['id_kriteria']) {
                                                    $c = (1 / $kolom['jumlah_kriteria']);
                                                    $query = mysqli_query($conn, "UPDATE analisa_kriteria SET hasil_analisa_kriteria='$c' WHERE kriteria_pertama='$baris[id_kriteria]' AND kriteria_kedua='$kolom[id_kriteria]'");
                                                    echo number_format($c, 4, '.', ',');
                                                } else {
                                                    $query = mysqli_query($conn, "SELECT * FROM analisa_kriteria WHERE kriteria_pertama = '$baris[id_kriteria]' AND kriteria_kedua = '$kolom[id_kriteria]' LIMIT 0,1");
                                                    $row = mysqli_fetch_array($query);
                                                    // var_dump($row);
                                                    $c = $row['nilai_analisa_kriteria'] / $kolom['jumlah_kriteria'];
                                                    $query = mysqli_query($conn, "UPDATE analisa_kriteria SET hasil_analisa_kriteria='$c' WHERE kriteria_pertama='$baris[id_kriteria]' AND kriteria_kedua='$kolom[id_kriteria]'");
                                                    echo number_format($c, 4, '.', ',');
                                                }
                                                ?>
                                            </td>
                                        <?php endwhile; ?>
                                        <th class="bg-infox">
                                            <?php
                                            $query = mysqli_query($conn, "SELECT sum(hasil_analisa_kriteria) AS jumlah FROM analisa_kriteria WHERE kriteria_pertama='$baris[id_kriteria]'");
                                            $row = mysqli_fetch_array($query);
                                            $j = $row['jumlah'];
                                            echo number_format($j, 4, '.', ',');
                                            ?>
                                        </th>
                                        <th class="bg-successx">
                                            <?php
                                            $query = mysqli_query($conn, "SELECT avg(hasil_analisa_kriteria) AS avgkr FROM analisa_kriteria WHERE kriteria_pertama = '$baris[id_kriteria]'");
                                            $row = mysqli_fetch_array($query);
                                            $b = $row['avgkr'];
                                            $query = mysqli_query($conn, "UPDATE tb_kriteria SET bobot_kriteria='$b' WHERE id_kriteria='$baris[id_kriteria]'");
                                            echo number_format($b, 4, '.', ',');
                                            ?>
                                        </th>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <br>
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Penjumlahan</th>
                                    <?php
                                    $bobots1y = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                    while ($row = mysqli_fetch_array($bobots1y)) : ?>
                                        <th><?= $row['nama_kriteria'] ?></th>
                                    <?php endwhile; ?>
                                    <th class="bg-infox">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sumRow = [];
                                $bobots2y = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                while ($baris = mysqli_fetch_array($bobots2y)) : ?>
                                    <tr>
                                        <th class="active"><?= $baris['nama_kriteria'] ?></th>
                                        <?php $jumlah = 0;
                                        $bobots3y = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                        while ($kolom = mysqli_fetch_array($bobots3y)) : ?>
                                            <td>
                                                <?php
                                                if ($baris['id_kriteria'] == $kolom['id_kriteria']) {
                                                    $c = $kolom['bobot_kriteria'] * 1;
                                                    echo number_format($c, 4, '.', ',');
                                                    $jumlah += $c;
                                                } else {
                                                    $query = mysqli_query($conn, "SELECT * FROM analisa_kriteria WHERE kriteria_pertama = '$baris[id_kriteria]' AND kriteria_kedua = '$kolom[id_kriteria]' LIMIT 0,1");
                                                    $row = mysqli_fetch_array($query);
                                                    $c = $kolom['bobot_kriteria'] * $row['nilai_analisa_kriteria'];
                                                    echo number_format($c, 4, '.', ',');
                                                    $jumlah += $c;
                                                }
                                                ?>
                                            </td>
                                        <?php endwhile; ?>
                                        <th class="bg-infox">
                                            <?php
                                            $sumRow[$baris['id_kriteria']] = $jumlah;
                                            echo number_format($jumlah, 4, '.', ',');
                                            ?>
                                        </th>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <br>
                        <table width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Rasio Konsistensi</th>
                                    <th class="bg-infox">Jumlah</th>
                                    <th class="bg-successx">Prioritas</th>
                                    <th class="bg-warningx">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                $bobots1z = mysqli_query($conn, "SELECT * FROM tb_kriteria");
                                while ($row1 = mysqli_fetch_array($bobots1z)) : ?>
                                    <tr>
                                        <th class="active"><?= $row1["nama_kriteria"] ?></th>
                                        <th class="bg-infox"><?= number_format($sumRow[$row1["id_kriteria"]], 4, '.', ',') ?></th>
                                        <th class="bg-successx"><?= number_format($row1["bobot_kriteria"], 4, '.', ','); ?></th>
                                        <?php $jumlah = $sumRow[$row1["id_kriteria"]] + $row1["bobot_kriteria"]; ?>
                                        <th class="bg-warningx"><?= number_format($jumlah, 4, '.', ','); ?></th>
                                        <?php $total += $jumlah; ?>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr class="bg-dangerx">
                                    <th colspan="3">Rata-rata</th>
                                    <th><?php $rata = $total / $count;
                                        echo number_format($rata, 4, '.', ','); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        <table width="100%" class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>N (kriteria)</th>
                                    <td><?php echo $count ?></td>
                                </tr>
                                <tr>
                                    <th>Hasil Akhir (X maks)</th>
                                    <td><?= number_format($rata, 4, '.', ','); ?></td>
                                </tr>
                                <tr>
                                    <th>IR</th>
                                    <td><?php
                                        switch ($count) {
                                            case 3:
                                                $ir = 0.58;
                                                break;
                                            case 4:
                                                $ir = 0.90;
                                                break;
                                            case 5:
                                                $ir = 1.12;
                                                break;
                                            case 6:
                                                $ir = 1.24;
                                                break;
                                            case 7:
                                                $ir = 1.32;
                                                break;
                                            case 8:
                                                $ir = 1.41;
                                                break;
                                            case 9:
                                                $irr = 1.45;
                                                break;
                                            case 10:
                                                $ir = 1.49;
                                                break;
                                            case 11:
                                                $ir = 1.51;
                                                break;
                                            case 12:
                                                $ir = 1.48;
                                                break;
                                            case 13:
                                                $ir = 1.56;
                                                break;
                                            case 14:
                                                $ir = 1.57;
                                                break;
                                            case 15:
                                                $ir = 1.59;
                                                break;
                                            default:
                                                $ir = 0.00;
                                                break;
                                        }
                                        echo $ir;
                                        ?></td>
                                </tr>
                                <tr>
                                    <th>CI</th>
                                    <td><?php $ci = ($rata - $count) / ($count - 1);
                                        echo number_format($ci, 4, '.', ','); ?></td>
                                </tr>
                                <tr>
                                    <th>CR</th>
                                    <td><?php
                                        if ($ir == 0) {
                                            $cr = 0;
                                        } elseif ($ci == 0) {
                                            $cr = 0;
                                        } else {
                                            $cr = ($ci / $ir);
                                        }
                                        echo number_format($cr, 4, '.', ','); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>