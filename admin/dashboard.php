<?php
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

$siswa = query("SELECT * FROM tbl_siswa");
$guru = query("SELECT * FROM tbl_guru");
$jurusan = query("SELECT * FROM tbl_jurusan");
$ekskul = query("SELECT * FROM tbl_ekskul");
$artikel = query("SELECT * FROM tbl_artikel");
$kategori = query("SELECT * FROM tbl_kategori_artikel");
$bukutamu = query("SELECT * FROM tbl_bukutamu");
?>

<div class="row justify-content-center">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: #7cd1b8;">
            <div class="inner">
                <h3><?= count($siswa); ?></h3>

                <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="?page=siswa" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: #DE834D;">
            <div class="inner">
                <h3><?= count($guru); ?></h3>

                <p>Jumlah Guru</p>
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <a href="?page=guru" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: #BAABDA;">
            <div class="inner">
                <h3><?= count($jurusan); ?></h3>

                <p>Jumlah Jurusan</p>
            </div>
            <div class="icon">
                <i class="fas fa-medal"></i>
            </div>
            <a href="?page=jurusan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: #EEC373;">
            <div class="inner">
                <h3><?= count($ekskul); ?></h3>

                <p>Jumlah Ekskul</p>
            </div>
            <div class="icon">
                <i class="fas fa-futbol"></i>
            </div>
            <a href="?page=ekskul" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: #6ECB63;">
            <div class="inner">
                <h3><?= count($kategori); ?></h3>

                <p>Jumlah Kategori Artikel</p>
            </div>
            <div class="icon">
                <i class="fas fa-list-alt"></i>
            </div>
            <a href="?page=kategori_artikel" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-black-50" style="background-color: #F2FFE9;">
            <div class="inner">
                <h3><?= count($artikel); ?></h3>

                <p>Jumlah Artikel</p>
            </div>
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <a href="?page=artikel" class="small-box-footer text-black-50">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box text-white" style="background-color: #7897ab;">
            <div class="inner">
                <h3><?= count($bukutamu); ?></h3>

                <p>Jumlah Buku Tamu</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="?page=buku_tamu" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>