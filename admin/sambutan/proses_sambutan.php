<?php

if (!isset($_POST['ubah'])) header('Location: ubah.php');


require_once '../../koneksi.php';
$nama = mysqli_real_escape_string($koneksi, isset($_POST['nama_kepsek']) ? $_POST['nama_kepsek'] : '');
$jabatan = mysqli_real_escape_string($koneksi, isset($_POST['jabatan']) ? $_POST['jabatan'] : '');
$sambutan = mysqli_real_escape_string($koneksi, isset($_POST['sambutan']) ? $_POST['sambutan'] : '');
$tanggal = date('Ymd');
$id = $_POST['id'];

// persiapan upload foto

if ($_FILES['foto']['error'] == 0) {
	$ekstensi = $_FILES['foto']['name'];
	$ekstensi = pathinfo($ekstensi, PATHINFO_EXTENSION);

	$nama_foto = $tanggal . '-';
	$nama_foto = $nama_foto . strtolower($nama);
	$nama_foto = str_replace(' ', '-', $nama_foto) . '.' . $ekstensi;

	$asal = $_FILES['foto']['tmp_name'];
} else {
	// hapus foto sebelumnya
	$query_artikel = mysqli_query($koneksi, "SELECT foto FROM tbl_sambutan WHERE id = $id");
	$row = mysqli_fetch_assoc($query_artikel);


	$nama_foto = $row['foto'];
}

$tujuan = '../../resources/sambutan/';

if ($_FILES['foto']['error'] == 0) {
	if ($_FILES['foto']['size'] < 1000000) {
		if (file_exists('../../resources/sambutan/' . $nama_foto)) unlink('../../resources/sambutan/' . $nama_foto . '.' . $ekstensi);
		if (file_exists('../../resources/sambutan/' . $row['foto'])) unlink('../../resources/sambutan/' . $row['foto']);
		move_uploaded_file($asal, $tujuan . $nama_foto) or die('gagal upload foto');

		// ubah data
		$query = mysqli_query($koneksi, "UPDATE tbl_sambutan SET nama_kepsek = '$nama', jabatan = '$jabatan', foto = '$nama_foto', sambutan = '$sambutan' WHERE id = $id") or die(mysqli_error($koneksi));
		if ($query) {
			$_SESSION['sukses'] = 'Data Berhasil Diubah!';
			header('Location: ../index.php?page=artikel');
		} else {
			$_SESSION['gagal'] = 'Data Gagal Diubah!';
			header('Location: ../index.php?page=artikel');
		}
	} else {
		$_SESSION['gagal'] = 'ukuran gambar tidak boleh lebih dari 1000kb!';
		header('Location: ../index.php?page=artikel');
	}
} else {
	$query = mysqli_query($koneksi, "UPDATE tbl_sambutan SET nama_kepsek = '$nama', jabatan = '$jabatan', foto = '$nama_foto', sambutan = '$sambutan' WHERE id = $id") or die(mysqli_error($koneksi));

	if ($query) {
		$_SESSION['sukses'] = 'Data Berhasil Diubah!';
		header('Location: ../index.php?page=artikel');
	} else {
		$_SESSION['gagal'] = 'Data Gagal Diubah!';
		header('Location: ../index.php?page=artikel');
	}
}
