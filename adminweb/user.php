<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Data User</h2>
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
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Level User</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nama</th>
                                                <th class="sorting " tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Username</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Password</th>
                                                <th colspan="2">
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $p      = new PagingUser();
                                            $batas  = 5;
                                            $posisi = $p->cariPosisi($batas);
                                            $tampil = mysqli_query($conn, "SELECT * FROM tb_user 
                                                        order by level asc limit $posisi,$batas");
                                            $no = $posisi + 1;
                                            while ($row = mysqli_fetch_array($tampil)) { ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['level']; ?></td>
                                                    <td><?php echo $row['fullname']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
                                                    <td><?php echo $row['password']; ?></td>
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modalubah<?= $row['id']; ?>" class="btn btn-sm btn-warning btn-block">Ubah</a></td>
                                                    <td><a href="" data-bs-toggle="modal" data-bs-target="#modalhapus<?= $row['id']; ?>" class="btn btn-sm btn-danger btn-block">Hapus</a></td>
                                                </tr>
                                                <!-- Modal Ubah -->
                                                <div class="modal fade" id="modalubah<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" method="POST" action="../proses/prosesubah.php?module=user&act=ubah" onSubmit="return validasi(this)">
                                                                    <?php
                                                                    $querys = mysqli_query($conn, "SELECT * FROM tb_user where id='$row[id]'");
                                                                    while ($rows = mysqli_fetch_array($querys)) {
                                                                    ?>
                                                                        <input type="hidden" value="<?php echo $rows['id']; ?>" name="id">
                                                                        <div class="card-body">
                                                                            <div class="form-group row">
                                                                                <label for="level" class="col-sm-4 col-form-label">Level User</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="level" value="<?php echo $rows['level']; ?>" placeholder=" Level" name="level" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="fullname" class="col-sm-4 col-form-label">Fullname</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="fullname" value="<?php echo $rows['fullname']; ?>" placeholder=" Fullname" name="fullname">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="email" value="<?php echo $rows['email']; ?>" placeholder=" Email" name="email">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" class="form-control" id="username" value="<?php echo $rows['username']; ?>" placeholder=" Username" name="username">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="password" class="form-control" id="password" placeholder=" Password" name="password">
                                                                                    <i>
                                                                                        <font size="1">*) Apa bila password tidak dirubah maka kosongkan saja..!</font>
                                                                                    </i>
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
                                                <div class="modal fade" id="modalhapus<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <?php
                                                                $querys = mysqli_query($conn, "SELECT * FROM tb_user where id='$row[id]'");
                                                                while ($rows = mysqli_fetch_array($querys)) {
                                                                ?>
                                                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data <?= $rows['username']; ?> ?</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form class="form-horizontal" method="POST" action="../proses/proseshapus.php?module=user&act=hapus" onSubmit="return validasi(this)">
                                                                    <input type="hidden" name="id" value="<?php echo $rows['id'] ?>">
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
                                            $jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_user"));
                                            $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
                                            $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No.</th>
                                                <th rowspan="1" colspan="1">Level</th>
                                                <th rowspan="1" colspan="1">Nama</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">Username</th>
                                                <th rowspan="1" colspan="1">Password</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="../proses/prosestambah.php?module=user&act=input" onSubmit="return validasi(this)">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="level" class="col-sm-4 col-form-label">Level User</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="level" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
                                        <option selected="selected" data-select2-id="19">-- Pilih --</option>
                                        <option value="admin">Admin</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fullname" class="col-sm-4 col-form-label">Fullname</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="fullname" placeholder="Fullname" name="fullname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
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