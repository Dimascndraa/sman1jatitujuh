<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: ../index.php?page=jurusan');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_jurusan WHERE id = {$id}");
if ($query) {
	$_SESSION['sukses'] = 'Data Berhasil Dihapus!';
	header('Location: ../index.php?page=jurusan');
} else {
	$_SESSION['gagal'] = 'Data Gagal Dihapus!';
	header('Location: ../index.php?page=jurusan');
}
