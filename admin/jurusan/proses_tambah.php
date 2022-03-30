<?php

if (!isset($_POST['tambah'])) header('Location: tambah.php');

require_once '../../koneksi.php';
$nama_jurusan = mysqli_real_escape_string($koneksi, isset($_POST['nama_jurusan']) ? $_POST['nama_jurusan'] : '');
$query = mysqli_query($koneksi, "INSERT INTO tbl_jurusan (nama_jurusan) VALUES ('$nama_jurusan')");
if ($query) {
	$_SESSION['sukses'] = 'Data Berhasil Ditambahkan!';
	header('Location: ../index.php?page=jurusan');
} else {
	$_SESSION['gagal'] = 'Data Gagal Ditambahkan!';
	header('Location: ../index.php?page=jurusan');
}
