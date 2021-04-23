<?php
$skoObj = mysqli_query($conn, "SELECT * FROM analisa_alternatif");
$altObj = mysqli_query($conn, "SELECT * FROM tb_alternatif");

$altkriteria = isset($_POST['kriteria']) ? $_POST['kriteria'] : $_GET['kriteria'];

if (isset($altkriteria)) {
    $query = mysqli_query($conn, "SELECT * FROM tb_kriteria WHERE id_kriteria='$altkriteria'");
    $row = mysqli_fetch_array($query);
    $namkri = $row['nama_kriteria'];
    // $row = mysqli_fetch_assoc($query);
    $query = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_alternatif"));

    if (isset($_POST['submit'])) {
        $altCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'"));
        $no = 1;
        $r = [];
        $nid = [];
        $alt1 = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");

        while ($row = mysqli_fetch_array($alt1)) {
            $alt2 = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
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
        $no = 1;
        foreach ($r as $k => $v) {
            $j = 0;
            for ($i = 1; $i <= $v; $i++) {
                if (
                    mysqli_query(
                        $conn,
                        "INSERT INTO analisa_alternatif 
						VALUES('" . $_POST[$k . $no] . "','" . $_POST['nl' . $no] . "','0','" . $_POST[$nid[$k][$j] . $no] . "','$altkriteria')"
                    )
                ) {
                } else {
                    mysqli_query(
                        $conn,
                        "UPDATE analisa_alternatif 
						SET nilai_analisa_alternatif = '" . ($_POST['nl' . $no]) . "' 
						WHERE alternatif_pertama = '" . ($_POST[$k . $no]) . "' and alternatif_kedua = '" . ($_POST[$nid[$k][$j] . $no]) . "' and id_kriteria = '$altkriteria'"
                    );
                }
                if (
                    mysqli_query(
                        $conn,
                        "INSERT INTO analisa_alternatif 
						VALUES('" . ($_POST[$nid[$k][$j] . $no]) . "','" . (1 / $_POST['nl' . $no]) . "','0','" . ($_POST[$k . $no]) . "','$altkriteria')"
                    )
                ) {
                    // ...
                } else {
                    mysqli_query(
                        $conn,
                        "UPDATE  analisa_alternatif 
							SET nilai_analisa_alternatif = '" . (1 / $_POST['nl' . $no]) . "' 
							WHERE alternatif_pertama = '" . ($_POST[$nid[$k][$j] . $no]) . "' and alternatif_kedua = '" . ($_POST[$k . $no]) . "' and id_kriteria = '$altkriteria'"
                    );
                }
                $no++;
                $j++;
                // }
            }
        }
    }
    if (isset($_POST['hapus'])) {
        $query = mysqli_query($conn, "DELETE FROM analisa_alternatif");
        header("location: analisa_alternatif_tabel.php");
    }
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Analisa Alternatif Tabel</h3>
                        </div>
                        <div class="card-body">
                            <table width="100%" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?= $namkri ?></th>
                                        <?php
                                        $alt1a = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
                                        while ($row = mysqli_fetch_array($alt1a)) : ?>
                                            <th><?= $row['nama_alternatif'] ?></th>
                                        <?php endwhile; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $alt2a = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
                                    while ($baris = mysqli_fetch_array($alt2a)) : ?>
                                        <tr>
                                            <th class="active"><?= $baris['nama_alternatif'] ?></th>
                                            <?php
                                            $alt3a = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
                                            while ($kolom = mysqli_fetch_array($alt3a)) : ?>
                                                <td>
                                                    <?php
                                                    if ($baris['id_alternatif'] == $kolom['id_alternatif']) {
                                                        echo '1';
                                                        if (
                                                            !mysqli_query($conn, "INSERT INTO analisa_alternatif VALUES('$baris[id_alternatif]','1','0','$kolom[id_alternatif]','$altkriteria')")
                                                        ) {
                                                            $query = mysqli_query($conn, "UPDATE analisa_alternatif SET nilai_analisa_alternatif = '1' WHERE alternatif_pertama = '$baris[id_alternatif]' and alternatif_kedua = '$kolom[id_alternatif]' and id_kriteria = '$altkriteria'");
                                                        }
                                                    } else {
                                                        $query = mysqli_query($conn, "SELECT * FROM analisa_alternatif WHERE alternatif_pertama='$baris[id_alternatif]' AND alternatif_kedua='$kolom[id_alternatif]' AND id_kriteria='$altkriteria' LIMIT 0,1");
                                                        $row = mysqli_fetch_array($query);
                                                        echo number_format($row['nilai_analisa_alternatif'], 4, '.', ',');
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
                                        <?php /*$jumlahBobot=[];*/
                                        $alt4a = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
                                        while ($row = mysqli_fetch_array($alt4a)) : ?>
                                            <th>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT sum(nilai_analisa_alternatif) AS jumkr FROM analisa_alternatif WHERE alternatif_kedua='$row[id_alternatif]' AND id_kriteria='$altkriteria'");
                                                $rows = mysqli_fetch_array($query);
                                                echo number_format($rows['jumkr'], 4, '.', ',');
                                                if (
                                                    !mysqli_query($conn, "INSERT INTO jum_alt_kri VALUES('$row[id_alternatif]', '$altkriteria','$rows[jumkr]', 0, 0)")
                                                ) {
                                                    mysqli_query($conn, "UPDATE jum_alt_kri SET jumlah_alt_kri='$rows[jumkr]' WHERE id_alternatif='$row[id_alternatif]' AND id_kriteria='$altkriteria'");
                                                }
                                                // $jumlahBobot[$row["id_alternatif"]] = $skoObj->nak;
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
                                        $alt1b = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
                                        while ($row = mysqli_fetch_array($alt1b)) : ?>
                                            <th><?= $row['nama_alternatif'] ?></th>
                                        <?php endwhile; ?>
                                        <th class="bg-successx">Prioritas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $alt2b = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
                                    while ($baris = mysqli_fetch_array($alt2b)) : ?>
                                        <tr>
                                            <th class="active"><?= $baris['nama_alternatif'] ?></th>
                                            <?php $alt3b = mysqli_query($conn, "SELECT * FROM tb_alternatif WHERE id_kriteria='$altkriteria'");
                                            while ($kolom = mysqli_fetch_array($alt3b)) : ?>
                                                <td>
                                                    <?php
                                                    $query = mysqli_query($conn, "SELECT * FROM jum_alt_kri WHERE id_alternatif='$kolom[id_alternatif]' AND id_kriteria='$altkriteria' LIMIT 0,1");
                                                    $row = mysqli_fetch_array($query);
                                                    $jumlahBobot = $row['jumlah_alt_kri'];
                                                    if ($baris['id_alternatif'] == $kolom['id_alternatif']) {
                                                        $n = 1 / $jumlahBobot;
                                                        $query = mysqli_query($conn, "UPDATE analisa_alternatif SET hasil_analisa_alternatif = '$n' WHERE alternatif_pertama = '$baris[id_alternatif]' AND alternatif_kedua = '$kolom[id_alternatif]' AND id_kriteria='$altkriteria'");
                                                        echo number_format($n, 4, '.', ',');
                                                    } else {
                                                        $query = mysqli_query($conn, "SELECT * FROM analisa_alternatif WHERE alternatif_pertama='$baris[id_alternatif]' AND alternatif_kedua='$kolom[id_alternatif]' AND id_kriteria='$altkriteria' LIMIT 0,1");
                                                        $row = mysqli_fetch_array($query);
                                                        $bobot = $row['nilai_analisa_alternatif'];
                                                        $n = $bobot / $jumlahBobot;
                                                        $query = mysqli_query($conn, "UPDATE analisa_alternatif SET hasil_analisa_alternatif = '$n' WHERE alternatif_pertama = '$baris[id_alternatif]' AND alternatif_kedua = '$kolom[id_alternatif]' AND id_kriteria='$altkriteria'");
                                                        echo number_format($n, 4, '.', ',');
                                                    }
                                                    ?>
                                                </td>
                                            <?php endwhile; ?>
                                            <th class="bg-successx">
                                                <?php
                                                $query = mysqli_query($conn, "SELECT avg(hasil_analisa_alternatif) AS avgkr FROM analisa_alternatif WHERE alternatif_pertama = '$baris[id_alternatif]'");
                                                $row = mysqli_fetch_array($query);
                                                // var_dump($query);
                                                $prioritas = $row['avgkr'];
                                                $query = mysqli_query($conn, "UPDATE jum_alt_kri SET skor_alt_kri='$prioritas' WHERE id_alternatif='$baris[id_alternatif]' AND id_kriteria='$altkriteria'");
                                                echo number_format($prioritas, 4, '.', ',');
                                                ?>
                                            </th>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } else {
                echo "<script>location.href='?page=analisa_alternatif_tabel'</script>";
            }
                ?>
                </div>
            </div>
        </div>
    </section>