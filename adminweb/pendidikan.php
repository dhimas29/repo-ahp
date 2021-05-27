<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Pendidikan</h3>
                    </div>
                    <form class="form-horizontal" method="POST" action="../proses/prosestambah.php?module=pelamar_pendidikan&act=input" onSubmit="return validasi(this)">
                        <div class="card-body">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where email = '$_SESSION[email]'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id_calon_karyawan = $row['id'];
                            }
                            ?>
                            <input type="hidden" name="id_calon_karyawan" value="<?= $id_calon_karyawan ?>">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tb_pendidikan_kerja 
                            left join tb_alternatif on tb_alternatif.id_alternatif = tb_pendidikan_kerja.id_alternatif
                            where id_calon_karyawan = '$id_calon_karyawan'");
                            while ($row = mysqli_fetch_array($query)) {
                                $institusi = $row['institusi'];
                                $tahun_lulus = $row['tahun_lulus'];
                                $kualifikasi = $row['id_alternatif'];
                                $program_studi = $row['program_studi'];
                                $nilai_akhir = $row['nilai_akhir'];
                            }
                            ?>
                            <div class="form-group row">
                                <label for="institusi" class="ml-5 col-sm-2 col-form-label">Institusi/ Universitas</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php if (empty($institusi)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $institusi;
                                                                } ?>" class="form-control" id="institusi" placeholder="ex: Universitas" name="institusi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="ml-5 col-sm-2 col-form-label">Tahun Lulus</label>
                                <div class="col-sm-4">
                                    <input type="text" value="<?php if (empty($tahun_lulus)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $tahun_lulus;
                                                                } ?>" name="tahun_lulus" class="form-control" id="inputPassword3" placeholder="ex: 2020">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kualifikasi" class="ml-5 col-sm-2 col-form-label">Kualifikasi</label>
                                <div class="col-sm-8">
                                    <select name="kualifikasi" id="kualifikasi" class="form-control">
                                        <option value="<?php if (empty($kualifikasi)) {
                                                            echo "";
                                                        } else {
                                                            $query = mysqli_query($conn, "SELECT * FROM tb_alternatif where id_alternatif ='$kualifikasi'");
                                                            $qr = mysqli_fetch_array($query);
                                                            echo $qr['id_alternatif'];
                                                        } ?>"><?php if (empty($kualifikasi)) {
                                                                    echo "--Pilih--";
                                                                } else {
                                                                    $query = mysqli_query($conn, "SELECT * FROM tb_alternatif where id_alternatif ='$kualifikasi'");
                                                                    $qr = mysqli_fetch_array($query);
                                                                    echo $qr['nama_alternatif'];
                                                                } ?></option>
                                        <?php
                                        $id_kriteria = "C2";
                                        $query = mysqli_query($conn, "SELECT * FROM tb_alternatif where id_kriteria ='$id_kriteria'");
                                        while ($row = mysqli_fetch_array($query)) :
                                        ?>
                                            <option value="<?= $row['id_alternatif'] ?>"><?= $row['nama_alternatif'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_studi" class="ml-5 col-sm-2 col-form-label">Program Studi</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php if (empty($program_studi)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $program_studi;
                                                                } ?>" class="form-control" name="program_studi" id="program_studi" placeholder="Program Studi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai_akhir" class="ml-5 col-sm-2 col-form-label">Nilai Akhir</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php if (empty($nilai_akhir)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $nilai_akhir;
                                                                } ?>" class="form-control" id="nilai_akhir" placeholder="Nilai Akhir" name="nilai_akhir">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                            <button type="submit" class="btn btn-default float-right">Batal</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
</section>