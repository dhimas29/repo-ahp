<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Data Kriteria</h2>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-sm btn-primary float-right">Tambah Data</a>
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
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nama Kriteria</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Bobot Kriteria</th>
                                                <th colspan="2">
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $p      = new PagingKriteria();
                                            $batas  = 5;
                                            $posisi = $p->cariPosisi($batas);
                                            $tampil = mysqli_query($conn, "SELECT * FROM tb_kriteria 
                                                        order by id_kriteria asc limit $posisi,$batas");
                                            $no = $posisi + 1;
                                            while ($row = mysqli_fetch_array($tampil)) { ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['nama_kriteria']; ?></td>
                                                    <td><?php echo $row['bobot_kriteria']; ?></td>
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modalubah<?= $row['id_kriteria']; ?>" class="btn btn-sm btn-warning btn-block">Ubah</a></td>
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id_kriteria']; ?>" class="btn btn-sm btn-danger btn-block">Hapus</a></td>
                                                </tr>
                                                <!-- Modal Ubah -->
                                                <div class="modal fade" id="modalubah<?= $row['id_kriteria']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Kriteria</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="POST" action="../proses/prosesubah.php?module=kriteria&act=ubah" onSubmit="return validasi(this)">
                                                                    <?php
                                                                    $querys = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria='$row[id_kriteria]'");
                                                                    while ($rows = mysqli_fetch_array($querys)) {
                                                                    ?>
                                                                        <input type="hidden" value="<?php echo $rows['id_kriteria']; ?>" name="id_kriteria">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <label for="nama_kriteria" class="col-sm-4 col-form-label">Nama Kriteria</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="nama_kriteria" value="<?php echo $rows['nama_kriteria']; ?>" placeholder=" Nama Kriteria" name="nama_kriteria">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
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
                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="modalhapus<?= $row['id_kriteria']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <?php
                                                                $querys = mysqli_query($conn, "SELECT * FROM tb_kriteria where id_kriteria='$row[id_kriteria]'");
                                                                while ($rows = mysqli_fetch_array($querys)) {
                                                                ?>
                                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data <?= $rows['nama_kriteria']; ?> ?</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form class="form-horizontal" method="POST" action="../proses/proseshapus.php?module=kriteria&act=hapus" onSubmit="return validasi(this)">
                                                                    <input type="hidden" name="id_kriteria" value="<?php echo $rows['id_kriteria'] ?>">
                                                                    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-floppy-save"></span> Yes</button>
                                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                                                <?php } ?>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $no++;
                                            }
                                            $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_kriteria"));
                                            $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                                            $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No.</th>
                                                <th rowspan="1" colspan="1">Nama Kriteria</th>
                                                <th rowspan="1" colspan="1">Bobot Kriteria</th>
                                                <th rowspan="1" colspan="2">
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
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

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="../proses/prosestambah.php?module=kriteria&act=input" onSubmit="return validasi(this)">
                    <?php
                    $query = mysqli_query($conn, "SELECT max(id_kriteria) as kode_besar FROM tb_kriteria");
                    while ($row = mysqli_fetch_array($query)) {
                        $id_alternatif = $row['kode_besar'];
                    }
                    if (empty($id_alternatif)) {
                        $id_alternatif = 'C1';
                    } else {
                        $pecah = substr($id_alternatif, '1', '1');
                        $jumlah = $pecah + 1;
                        $id_alternatif = "C" . sprintf("%1s", $jumlah);
                    }
                    ?>
                    <input type="hidden" name="id_kriteria" value="<?php echo $id_alternatif ?>">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_kriteria" class="col-sm-4 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_kriteria" placeholder="Nama Kriteria" name="nama_kriteria">
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