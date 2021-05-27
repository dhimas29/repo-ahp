<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card mb-3 mr-3 ml-3" style="max-width: 1070px;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <div class="card-body box-profile mt-3">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where email = '$_SESSION[email]'");
                            $cek = mysqli_num_rows($query);
                            if ($cek > 0) {
                                while ($array = mysqli_fetch_array($query)) {
                                    $nama = $array['nama_lengkap'];
                                    $nik = $array['nik'];
                                    $tempat_lahir = $array['tempat_lahir'];
                                    $tanggal_lahir = $array['tanggal_lahir'];
                                    $no_telp = $array['no_telp'];
                                    $status = $array['status'];
                                    $agama = $array['agama'];
                                    $alamat = $array['alamat'];
                                    $jenis_kelamin = $array['jenis_kelamin'];
                                    $photo = $array['photo'];
                                }
                            } else {
                                $nama = $_SESSION['fullname'];
                                $nik = "-";
                                $tempat_lahir = "-";
                                $tanggal_lahir = "-";
                                $no_telp = "-";
                                $status = "-";
                                $agama = "-";
                                $alamat = "-";
                                $jenis_kelamin = "-";
                                $photo = "avatar.png";
                            }
                            ?>
                            <div class="text-center">
                                <img class="bg-light border border-dark rounded-circle" width="100%" src="<?php echo "../assets/dist/img_profile/" . $photo ?>" alt="...">
                            </div>
                            <h3 class="profile-username text-center"><?= ucwords($_SESSION['fullname']); ?></h3>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-block"><b>Edit</b></a>
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Fullname</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= ucwords($nama); ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Birthdate</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= $tanggal_lahir; ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Email</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= $_SESSION['email']; ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Gender</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= ucwords($jenis_kelamin); ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Religion</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= ucwords($agama); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Nik</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= $nik; ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Place of Birth</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= $tempat_lahir; ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Phone</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= $no_telp; ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Marital Status</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= $status; ?></p>
                            <p class="mb-1" style="font-family: sans-serif;font-weight: bold;">Alamat</p>
                            <p style="font-family: sans-serif;font-size: .9375rem;"><?= $alamat; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .modal-dialog {
        position: relative;
        max-width: 1000px;
    }
</style>
<!-- Modal Edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3 mr-3 ml-3" style="max-width: 1070px;">
                    <div class="row g-0">
                        <div class="card-body">
                            <form action="../proses/prosestambah.php?module=pelamar&act=input" onSubmit="return validasi(this)" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM tb_calon_karyawan where email = '$_SESSION[email]'");
                                            $cek = mysqli_num_rows($query);
                                            if ($cek > 0) {
                                                while ($array = mysqli_fetch_array($query)) {
                                                    $nama = $array['nama_lengkap'];
                                                    $nik = $array['nik'];
                                                    $tempat_lahir = $array['tempat_lahir'];
                                                    $tanggal_lahir = $array['tanggal_lahir'];
                                                    $no_telp = $array['no_telp'];
                                                    $status = $array['status'];
                                                    $agama = $array['agama'];
                                                    $alamat = $array['alamat'];
                                                    $jenis_kelamin = $array['jenis_kelamin'];
                                                    $photo = $array['photo'];
                                                }
                                            } else {
                                                $nama = $_SESSION['fullname'];
                                                $nik = "";
                                                $tempat_lahir = "";
                                                $tanggal_lahir = "";
                                                $no_telp = "";
                                                $status = "";
                                                $agama = "";
                                                $alamat = "";
                                                $photo = "avatar.png";
                                            }
                                            ?>
                                            <div class="card-body box-profile mt-2">
                                                <div class="text-center">
                                                    <img class="bg-light border border-dark rounded-circle" width="100%" src="<?php echo "../assets/dist/img_profile/" . $photo ?>" alt="...">
                                                </div>
                                                <!-- <h3 class="profile-username text-center"><?= ucwords($_SESSION['fullname']); ?></h3> -->
                                                <!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary btn-block"><b>Edit</b></a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-1"></div> -->
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input type="text" value="<?php echo $_SESSION['fullname'] ?>" name="nama_lengkap" class="form-control" placeholder="Fullname">
                                        </div>
                                        <div class="form-group">
                                            <label>Birthdate</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <!-- <input type="date" name="tanggal_lahir"  class="form-control"> -->
                                                <input type="text" value="<?php echo $tanggal_lahir ?>" name="tanggal_lahir" class="form-control datetimepicker-input" data-target="#reservationdate">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" readonly value="<?php echo $_SESSION['email'] ?>" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option selected value="<?php echo $jenis_kelamin ?>"><?= ucwords($jenis_kelamin); ?></option>
                                                <option value="laki">Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <select name="agama" class="form-control">
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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="number" value="<?php echo $nik ?>" name="nik" class="form-control" placeholder="nik">
                                        </div>
                                        <div class="form-group">
                                            <label>Place of Birth</label>
                                            <input type="text" value="<?php echo $tempat_lahir ?>" name="tempat_lahir" class="form-control" placeholder="Place of Birth">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="number" value="<?php echo $no_telp ?>" name="no_telp" class="form-control" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <label>Martial Status</label>
                                            <select name="status" class="form-control">
                                                <option selected value="<?php echo $status ?>"><?= ucwords($status); ?></option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Cerai">Cerai</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="file" name="photo" class="form-control" placeholder="Photo">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Pendidikan Terakhir</label>
                                            <select name="status" class="form-control">
                                                <option selected value="<?php echo $status ?>"><?= ucwords($status); ?></option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Cerai">Cerai</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Sekolah / Universitas</label>
                                            <input type="number" value="<?php echo $no_telp ?>" name="no_telp" class="form-control" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <label>Pengalaman Bekerja</label>
                                            <input type="date" name="mulai_kerja" class="form-control">
                                            <input type="date" name="akhir_kerja" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Photo</label>
                                            <input type="file" name="photo" class="form-control" placeholder="Photo">
                                        </div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" placeholder="Enter ..."><?= $alamat; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>