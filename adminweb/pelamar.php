<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Data Pelamar</h2>
                        <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-primary float-right">Tambah Data</a> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nik</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nama</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Jenis Kelamin</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">No. Telp</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Email</th>
                                                <!-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nilai Wawancara</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nilai Tertulis</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nilai Praktek</th> -->
                                                <!-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Alamat</th> -->
                                                <th colspan="2">
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $p      = new PagingPelamar();
                                            $batas  = 5;
                                            $posisi = $p->cariPosisi($batas);
                                            $tampil = mysqli_query($conn, "SELECT *,tb_calon_karyawan.id as id_calon FROM tb_calon_karyawan
                                            left join tb_nilai on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id
                                            group by id_calon
                                            order by id_calon asc limit $posisi,$batas");
                                            $no = $posisi + 1;
                                            while ($row = mysqli_fetch_array($tampil)) { ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['nik']; ?></td>
                                                    <td><?php echo $row['nama_lengkap']; ?></td>
                                                    <td><?php echo $row['jenis_kelamin']; ?></td>
                                                    <td><?php echo $row['no_telp']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <!-- <td><?php echo $row['nilai_wawancara']; ?></td>
                                                    <td><?php echo $row['nilai_tertulis']; ?></td>
                                                    <td><?php echo $row['nilai_praktek']; ?></td> -->
                                                    <!-- <td><?php echo $row['alamat']; ?></td> -->
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modaldetail<?= $row['id_calon']; ?>" class="btn btn-sm btn-info btn-block">Detail</a></td>
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id_calon']; ?>" class="btn btn-sm btn-danger btn-block">Hapus</a></td>
                                                </tr>
                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="modaldetail<?= $row['id_calon']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" style="max-width: 800px;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mr-3 ml-3">
                                                                    <div class="fc-toolbar-chunk">
                                                                        <div class="btn-group">
                                                                            <button data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modaldetail<?= $row['id_calon']; ?>" class="fc-dayGridMonth-button btn btn-primary active" type="button">Profile</button>
                                                                            <button data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modalnilai<?= $row['id_calon']; ?>" class="fc-timeGridWeek-button btn btn-primary" type="button">Nilai</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card mb-3 mr-3 ml-3" style="max-width: 1070px;">
                                                                    <div class="row g-0">
                                                                        <div class="card-body">
                                                                            <form action="../proses/prosestambah.php?module=pelamar&act=input" onSubmit="return validasi(this)" method="POST" enctype="multipart/form-data">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <!-- text input -->
                                                                                        <div class="form-group">
                                                                                            <div class="card-body box-profile mt-2">
                                                                                                <div class="text-center">
                                                                                                    <img class="bg-light border border-dark rounded-circle" width="80%" src="../assets/dist/img/avatar.png" alt="...">
                                                                                                </div>
                                                                                                <!-- <h3 class="profile-username text-center"></h3> -->
                                                                                                <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-block"><b>Edit</b></a> -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-1"></div>
                                                                                    <div class="col-sm-4">
                                                                                        <?php
                                                                                        $querys = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where id='$row[id_calon]'");
                                                                                        while ($rows = mysqli_fetch_array($querys)) {
                                                                                            $nik = $rows['nik'];
                                                                                            $nama = $rows['nama_lengkap'];
                                                                                            $tempat_lahir = $rows['tempat_lahir'];
                                                                                            $tanggal_lahir = $rows['tanggal_lahir'];
                                                                                            $jenis_kelamin = $rows['jenis_kelamin'];
                                                                                            $agama = $rows['agama'];
                                                                                            $status = $rows['status'];
                                                                                            $no_telp = $rows['no_telp'];
                                                                                            $email = $rows['email'];
                                                                                            $alamat = $rows['alamat'];
                                                                                        }
                                                                                        ?>
                                                                                        <div class="form-group">
                                                                                            <label>Fullname</label>
                                                                                            <input type="text" value="<?php echo $nama ?>" name="nama_lengkap" class="form-control" readonly placeholder="Fullname">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Birthdate</label>
                                                                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                                                                <!-- <input type="date" name="tanggal_lahir"  class="form-control"> -->
                                                                                                <input type="text" value="<?php echo $tanggal_lahir ?>" disabled name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate">
                                                                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Email</label>
                                                                                            <input type="email" readonly value="<?php echo $email ?>" name="email" class="form-control" placeholder="Email">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Gender</label>
                                                                                            <select name="jenis_kelamin" class="form-control" disabled>
                                                                                                <option selected value="<?php echo $jenis_kelamin ?>"><?= ucwords($jenis_kelamin); ?></option>
                                                                                                <option value="laki">Laki</option>
                                                                                                <option value="perempuan">Perempuan</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Religion</label>
                                                                                            <select name="agama" class="form-control" disabled>
                                                                                                <option selected value="<?php echo $agama ?>"><?= ucwords($agama); ?></option>
                                                                                                <option value="islam">Islam</option>
                                                                                                <option value="kristen">Kristen</option>
                                                                                                <option value="budha">Budha</option>
                                                                                                <option value="hindu">Hindu</option>
                                                                                                <option value="katolik">Katolik</option>
                                                                                                <option value="kong hu chu">Kong Hu Chu</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-4">
                                                                                        <div class="form-group">
                                                                                            <label>NIK</label>
                                                                                            <input type="number" value="<?php echo $nik ?>" readonly name="nik" class="form-control" placeholder="nik">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Place of Birth</label>
                                                                                            <input type="text" value="<?php echo $tempat_lahir ?>" readonly name="tempat_lahir" class="form-control" placeholder="Place of Birth">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Phone</label>
                                                                                            <input type="number" value="<?php echo $no_telp ?>" readonly name="no_telp" class="form-control" placeholder="Phone">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Martial Status</label>
                                                                                            <select name="status" class="form-control" disabled>
                                                                                                <option selected value="<?php echo $status ?>"><?= ucwords($status); ?></option>
                                                                                                <option value="Belum Menikah">Belum Menikah</option>
                                                                                                <option value="Menikah">Menikah</option>
                                                                                                <option value="Cerai">Cerai</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Alamat</label>
                                                                                            <textarea class="form-control" readonly name="alamat" rows="3" placeholder="Enter ..."><?= $alamat; ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Detail -->

                                                <!-- Modal Nilai -->
                                                <div class="modal fade" id="modalnilai<?= $row['id_calon']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" style="max-width: 800px;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Nilai</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mr-3 ml-3">
                                                                    <div class="fc-toolbar-chunk">
                                                                        <div class="btn-group">
                                                                            <button data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modaldetail<?= $row['id_calon']; ?>" class="fc-dayGridMonth-button btn btn-primary" type="button">Profile</button>
                                                                            <button data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#modalnilai<?= $row['id_calon']; ?>" class="fc-timeGridWeek-button btn btn-primary active" type="button">Nilai</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card mb-3 mr-3 ml-3" style="max-width: 1070px;">
                                                                    <div class="row g-0">
                                                                        <div class="card-body">
                                                                            <form action="../proses/prosestambah.php?module=pelamar_nilai&act=input" onSubmit="return validasi(this)" method="POST" enctype="multipart/form-data">
                                                                                <div class="row">
                                                                                    <?php
                                                                                    $view = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan
                                                                                    WHERE id='$row[id_calon]'");
                                                                                    while ($r = mysqli_fetch_array($view)) {
                                                                                        $id = $r['id'];
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                                <input type="hidden" name="id_calon_karyawan" value="<?= $id ?>">
                                                                                <?php
                                                                                $kritera = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria != 'C1' && id_kriteria != 'C2'");
                                                                                while ($rowfw = mysqli_fetch_array($kritera)) : ?>
                                                                                    <div class="form-group">
                                                                                        <label><?= $rowfw['nama_kriteria'] ?></label>
                                                                                        <?php
                                                                                        $alter = 0;
                                                                                        $cek = mysqli_query($conn, "SELECT * FROM tb_nilai join tb_alternatif on tb_nilai.id_alternatif = tb_alternatif.id_alternatif where id_calon_karyawan = '$id'");
                                                                                        while ($fetch_cek = mysqli_fetch_array($cek)) {
                                                                                            if (($fetch_cek['id_kriteria'] == $rowfw['id_kriteria'])) {
                                                                                                $alter = $fetch_cek['nilai'];
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                        <input type="text" class="form-control" name="kriteria[<?= $rowfw["id_kriteria"] ?>]" id="<?php echo $rowfw['nama_alternatif']; ?>" value="<?= ($alter == "") ? "" : $alter ?>">
                                                                                    </div>
                                                                                <?php endwhile; ?>
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                    <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Detail -->

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="modalhapus<?= $row['id_calon']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <?php
                                                                $querys = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where id='$row[id_calon]'");
                                                                while ($rows = mysqli_fetch_array($querys)) {
                                                                ?>
                                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data <?= $rows['nik']; ?> ?</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form class="form-horizontal" method="POST" action="../proses/proseshapus.php?module=pelamar&act=hapus" onSubmit="return validasi(this)">
                                                                    <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
                                                                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Yes</button>
                                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                                                <?php } ?>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Hapus -->
                                            <?php
                                                $no++;
                                            }
                                            $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT *,tb_calon_karyawan.id as id_calon FROM tb_calon_karyawan
                                            left join tb_nilai on tb_nilai.id_calon_karyawan = tb_calon_karyawan.id
                                            group by id_calon
                                            order by id_calon asc"));
                                            $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                                            $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No.</th>
                                                <th rowspan="1" colspan="1">Nik</th>
                                                <th rowspan="1" colspan="1">Nama</th>
                                                <th rowspan="1" colspan="1">Jenis Kelamin</th>
                                                <th rowspan="1" colspan="1">No. Telp</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="2">
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                                    <?php
                                                    // $query = mysqli_query($conn, "SELECT * FROM tb_user");
                                                    // $count = mysqli_num_rows($query);
                                                    // echo "1 to " . $count;
                                                    ?>
                                                </div>
                                            </div> -->
                                <!-- <div class="col-sm-12 col-md-7"> -->
                                <!-- <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"> -->
                                <ul class="pagination">
                                    <?php echo "$linkHalaman"; ?>
                                </ul>
                                <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->

            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Calon Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="../proses/prosestambah.php?module=subkriteria&act=input" onSubmit="return validasi(this)">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nik" class="col-sm-4 col-form-label">Nik</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nik" placeholder="Nik" name="nik">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" placeholder="Nama Kriteria" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tempat_lahir" placeholder="Nama Kriteria" name="tempat_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tanggal_lahir" placeholder="Nama Kriteria" name="tanggal_lahir">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="jenis_kelamin" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                        <option value="Laki">Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="agama" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="budha">Budha</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="status" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                        <option value="menikah">Menikah</option>
                                        <option value="belum menikah">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-4 col-form-label">No. Telp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no_telp" placeholder="No. Telp" name="no_telp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" placeholder="contoh@gmail.com" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gpa" class="col-sm-4 col-form-label">Gpa Score</label>
                            <div class="col-sm-8">
                                <input type="gpa" class="form-control" id="gpa" placeholder="1-9" name="gpa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lulusan_tahun" class="col-sm-4 col-form-label">Lulusan Tahun Ke -</label>
                            <div class="col-sm-8">
                                <input type="lulusan_tahun" class="form-control" id="lulusan_tahun" placeholder="Tahun Ke Lulusan" name="lulusan_tahun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pendidikan_terakhir" class="col-sm-4 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="pendidikan_terakhir" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                        <option value="smp">SMP</option>
                                        <option value="smk/sma">SMK/SMA</option>
                                        <option value="d1">D1</option>
                                        <option value="d2">D2</option>
                                        <option value="d3">D3</option>
                                        <option value="s1">S1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-sm-4 col-form-label">Jurusan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_akademi" class="col-sm-4 col-form-label">Nama Akademi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_akademi" placeholder="Nama Akademi" name="nama_akademi">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Simpan</button>
                <!-- <a href="prosestambah.php?module=kriteria&act=input" class="btn btn-info">Simpan</a> -->
            </div>
            </form>
        </div>
    </div>
</div>