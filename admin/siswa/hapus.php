<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: ../index.php?page=siswa');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT foto FROM tbl_siswa WHERE id = {$id}");
$row = mysqli_fetch_assoc($query);

if (file_exists("../../images/siswa/" . $row['foto'])) unlink("../../images/siswa/" . $row['foto']) or die('foto tidak bisa dihapus');

$query = mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id = {$id}");
if ($query) {
	$_SESSION['sukses'] = 'Data Berhasil Dihapus!';
	unlink("../../images/siswa/" . $row['foto']);
	header('Location: ../index.php?page=siswa');
} else {
	$_SESSION['gagal'] = 'Data Gagal Dihapus!';
	header('Location: ../index.php?page=siswa');
}
