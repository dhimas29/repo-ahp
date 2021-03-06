<?php
// bagian untuk Paging Group
class PagingUser
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=user'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=user&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingPelamar
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=pelamar'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=pelamar&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingKriteria
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=kriteria'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=kriteria&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingSubKriteria
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=subkriteria'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=subkriteria&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingHasil
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=hasil'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=hasil&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingHasilHitung
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=hasil_hitung'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=hasil_hitung&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingHasilRanking
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=hasil_ranking'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=hasil_ranking&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingLaporRanking
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=laporan_ranking'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=laporan_ranking&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingLaporHitung
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=laporan_hitung'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=laporan_hitung&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
class PagingLapor
{
    // Fungsi untuk mencek halaman dan posisi data
    function cariPosisi($batas)
    {
        if (empty($_GET['halaman'])) {
            $posisi = 0;
            $_GET['halaman'] = 1;
        } else {
            $posisi = ($_GET['halaman'] - 1) * $batas;
        }
        return $posisi;
    }

    // Fungsi untuk menghitung total halaman
    function jumlahHalaman($jmldata, $batas)
    {
        $jmlhalaman = ceil($jmldata / $batas);
        return $jmlhalaman;
    }

    // Fungsi untuk link halaman 1,2,3 (untuk admin)
    function navHalaman($halaman_aktif, $jmlhalaman)
    {
        $link_halaman = "";

        // Link halaman 1,2,3, ...
        for ($i = 1; $i <= $jmlhalaman; $i++) {
            if ($i == $halaman_aktif) {
                $link_halaman .= "<li class='active'><a href='$_SERVER[PHP_SELF]?page=laporan'>$i</a></li>  ";
            } else {
                $link_halaman .= "<li><a href='$_SERVER[PHP_SELF]?page=laporan&halaman=$i'>$i</a> </li>";
            }
            $link_halaman .= " ";
        }
        return $link_halaman;
    }
}
