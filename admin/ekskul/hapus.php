<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: ../index.php?page=ekskul');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tbl_ekskul WHERE id = {$id}");
if ($query) {
	$_SESSION['sukses'] = 'Data Berhasil Dihapus!';
	header('Location: ../index.php?page=ekskul');
} else {
	$_SESSION['gagal'] = 'Data Gagal Dihapus!';
	header('Location: ../index.php?page=ekskul');
}
