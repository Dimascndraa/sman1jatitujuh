<?php

require_once '../koneksi.php';
require_once 'cek_session.php';
$tentang_website = mysqli_real_escape_string($koneksi, isset($_POST['tentang_website']) ? $_POST['tentang_website'] : '');
$query = mysqli_query($koneksi, "UPDATE tbl_tentang_website SET tentang_website = '$tentang_website' WHERE id = 1");

if ($query) {
	$_SESSION['sukses'] = 'Tentang Website Berhasil Diubah!';
	header('Location: index.php?page=tentang_website');
} else {
	$_SESSION['gagal'] = 'Tentang Website Gagal Diubah!';
	header('Location: index.php?page=tentang_website');
}
