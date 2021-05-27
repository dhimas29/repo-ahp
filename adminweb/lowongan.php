    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Pengumuman Lowongan
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="../proses/prosestambah.php?module=postlowongan&act=input" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <label for="">Judul</label>
                                    <input class="form-control" type="text" name="judul">
                                </div>
                            </div>
                            <input type="hidden" name="tanggal" value="<?php date_default_timezone_set("Asia/Bangkok");
                                                                        echo date("d-m-Y, h:i"), " WIB" ?>">
                            <div class="form-group row">
                                <textarea id="summernote" name="summernote"></textarea>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary btn-block">Post</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>