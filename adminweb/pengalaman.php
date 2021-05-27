<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Pengalaman Kerja</h3>
                    </div>
                    <form class="form-horizontal" method="POST" action="../proses/prosestambah.php?module=pelamar_pengalaman&act=input" onSubmit="return validasi(this)">

                        <div class="card-body">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where email = '$_SESSION[email]'");
                            while ($row = mysqli_fetch_array($query)) {
                                $id_calon_karyawan = $row['id'];
                            }
                            ?>
                            <input type="hidden" name="id_calon_karyawan" value="<?= $id_calon_karyawan ?>">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tb_pengalaman_kerja where id_calon_karyawan = '$id_calon_karyawan'");
                            while ($row = mysqli_fetch_array($query)) {
                                $nama_perusahaan = $row['nama_perusahaan'];
                                $kerja_awal = $row['kerja_awal'];
                                $kerja_akhir = $row['kerja_akhir'];
                                $bidang_kerja = $row['bidang_kerja'];
                                $jabatan = $row['jabatan'];
                                $gaji = $row['gaji'];
                            }
                            ?>
                            <div class="form-group row">
                                <label for="nama_perusahaan" class="ml-5 col-sm-2 col-form-label">Nama Perusahaan</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php if (empty($nama_perusahaan)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $nama_perusahaan;
                                                                } ?>" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan" name="nama_perusahaan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="ml-5 col-sm-2 col-form-label">Lama Bekerja</label>
                                <div class="col-sm-4">
                                    <input type="date" value="<?php if (empty($kerja_awal)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $kerja_awal;
                                                                } ?>" name="kerja_awal" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="ml-5 col-sm-2 col-form-label"></label>
                                <div class="col-sm-4">
                                    Sampai
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="ml-5 col-sm-2 col-form-label"></label>
                                <div class="col-sm-4">
                                    <input type="date" value="<?php if (empty($kerja_akhir)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $kerja_akhir;
                                                                } ?>" name="kerja_akhir" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                                <!-- <div class="col-sm-4 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="kerja_akhir">
                                        <label class="form-check-label">Sekarang</label>
                                    </div>
                                </div> -->
                            </div>
                            <div class="form-group row">
                                <label for="bidang_kerja" class="ml-5 col-sm-2 col-form-label">Bidang Pekerjaan</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php if (empty($bidang_kerja)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $bidang_kerja;
                                                                } ?>" class="form-control" name="bidang_kerja" id="bidang_kerja" placeholder="Bidang Pekerjaan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan" class="ml-5 col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-8">
                                    <select name="jabatan" id="jabatan" class="form-control">
                                        <option value="<?php if (empty($jabatan)) {
                                                            echo "";
                                                        } else {
                                                            echo $jabatan;
                                                        } ?>"><?php if (empty($jabatan)) {
                                                                    echo "--Pilih--";
                                                                } else {
                                                                    echo $jabatan;
                                                                } ?></option>
                                        <option value="CEO/GM/Direktur/Manajer Senior">CEO/GM/Direktur/Manajer Senior</option>
                                        <option value="Manajer/Asisten Manajer">Manajer/Asisten Manajer</option>
                                        <option value="Supervisor/Koordinator">Supervisor/Koordinator</option>
                                        <option value="Pegawai (non-manajemen & non-supervisor)">Pegawai (non-manajemen & non-supervisor)</option>
                                        <option value="Lulusan baru/Pengalaman kerja kurang dari 1 tahun">Lulusan baru/Pengalaman kerja kurang dari 1 tahun</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gaji" class="ml-5 col-sm-2 col-form-label">Gaji Bulanan</label>
                                <div class="col-sm-8">
                                    <input type="text" value="<?php if (empty($gaji)) {
                                                                    echo "";
                                                                } else {
                                                                    echo $gaji;
                                                                } ?>" class="form-control" id="gaji" placeholder="Gaji Bulanan" name="gaji">
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