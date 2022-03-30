<?php

if (!isset($_POST['ubah'])) header('Location: index.php');


require_once '../koneksi.php';
$nama = mysqli_real_escape_string($koneksi, isset($_POST['nama']) ? $_POST['nama'] : '');
$logo = mysqli_real_escape_string($koneksi, isset($_POST['logo']) ? $_POST['logo'] : '');
$jumbotron = mysqli_real_escape_string($koneksi, isset($_POST['jumbotron']) ? $_POST['jumbotron'] : '');
$slogan = mysqli_real_escape_string($koneksi, isset($_POST['slogan']) ? $_POST['slogan'] : '');
$telp = mysqli_real_escape_string($koneksi, isset($_POST['telp']) ? $_POST['telp'] : '');
$email = mysqli_real_escape_string($koneksi, isset($_POST['email']) ? $_POST['email'] : '');

// persiapan upload foto

if ($_FILES['logo']['error'] == 0) {
    $ekstensi = $_FILES['logo']['name'];
    $ekstensi = pathinfo($ekstensi, PATHINFO_EXTENSION);

    $nama_logo = strtolower("logo.{$ekstensi}");
    $nama_logo = str_replace(' ', '-', $nama_logo);

    $asal = $_FILES['logo']['tmp_name'];
} else {
    // hapus foto sebelumnya
    $query_logo = mysqli_query($koneksi, "SELECT logo FROM tbl_identitas");
    $row = mysqli_fetch_assoc($query_logo);

    $nama_logo = $row['logo'];
}

if ($_FILES['jumbotron']['error'] == 0) {
    $ekstensi = $_FILES['jumbotron']['name'];
    $ekstensi = pathinfo($ekstensi, PATHINFO_EXTENSION);

    $nama_jumbotron = strtolower("jumbotron.{$ekstensi}");
    $nama_jumbotron = str_replace(' ', '-', $nama_jumbotron);

    $asal = $_FILES['jumbotron']['tmp_name'];
} else {
    // hapus foto sebelumnya
    $query_jumbotron = mysqli_query($koneksi, "SELECT jumbotron FROM tbl_identitas");
    $row = mysqli_fetch_assoc($query_jumbotron);

    $nama_jumbotron = $row['jumbotron'];
}

$tujuan = '../resources/images/';

if ($_FILES['logo']['error'] == 0) {
    if ($_FILES['logo']['size'] && $_FILES['jumbotron']['size'] < 100000000) {
        if (file_exists('../resources/images/' . $nama_logo)) unlink('../resources/images/' . $nama_logo);
        if (file_exists('../resources/images/' . $nama_logo)) unlink('../resources/images/' . $nama_logo);
        move_uploaded_file($asal, $tujuan . $nama_logo) or die('gagal upload foto');
        // move_uploaded_file($asal, $tujuan . $nama_jumbotron) or die('gagal upload foto');

        // ubah data
        $query = mysqli_query($koneksi, "UPDATE tbl_identitas SET nama = '$nama', logo = '$nama_logo', jumbotron = '$nama_jumbotron', slogan = '$slogan', telp = '$telp', telp = '$telp', email = '$email'") or die(mysqli_error($koneksi));
        if ($query) {
            $_SESSION['sukses'] = 'Data Berhasil Diubah!';
            header('Location: index.php?page=identitas');
        } else {
            $_SESSION['gagal'] = 'Data Gagal Diubah!';
            header('Location: index.php?page=identitas');
        }
    } else {
        $_SESSION['gagal'] = 'ukuran gambar tidak boleh lebih dari 1000kb!';
        header('Location: index.php?page=identitas');
    }
} else if ($_FILES['jumbotron']['error'] == 0) {
    if ($_FILES['jumbotron']['size'] && $_FILES['jumbotron']['size'] < 100000000) {
        if (file_exists('../resources/images/' . $nama_jumbotron)) unlink('../resources/images/' . $nama_jumbotron);
        if (file_exists('../resources/images/' . $nama_jumbotron)) unlink('../resources/images/' . $nama_jumbotron);
        move_uploaded_file($asal, $tujuan . $nama_jumbotron) or die('gagal upload foto');
        // move_uploaded_file($asal, $tujuan . $nama_jumbotron) or die('gagal upload foto');

        // ubah data
        $query = mysqli_query($koneksi, "UPDATE tbl_identitas SET nama = '$nama', logo = '$nama_logo', jumbotron = '$nama_jumbotron', slogan = '$slogan', telp = '$telp', telp = '$telp', email = '$email'") or die(mysqli_error($koneksi));
        if ($query) {
            $_SESSION['sukses'] = 'Data Berhasil Diubah!';
            header('Location: index.php?page=identitas');
        } else {
            $_SESSION['gagal'] = 'Data Gagal Diubah!';
            header('Location: index.php?page=identitas');
        }
    } else {
        $_SESSION['gagal'] = 'ukuran gambar tidak boleh lebih dari 1000kb!';
        header('Location: index.php?page=identitas');
    }
} else {
    $query = mysqli_query($koneksi, "UPDATE tbl_identitas SET nama = '$nama', logo = '$nama_logo', jumbotron = '$nama_jumbotron', slogan = '$slogan', telp = '$telp', telp = '$telp', email = '$email'") or die(mysqli_error($koneksi));

    if ($query) {
        $_SESSION['sukses'] = 'Data Berhasil Diubah!';
        header('Location: index.php?page=identitas');
    } else {
        $_SESSION['gagal'] = 'Data Gagal Diubah!';
        header('Location: index.php?page=identitas');
    }
}
