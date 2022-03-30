<?php
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'sekolah') or die('gagal konek');

$data = mysqli_query($koneksi, "SELECT * FROM tbl_identitas");
$identitas = mysqli_fetch_assoc($data);

$datasambutan = mysqli_query($koneksi, "SELECT * FROM tbl_sambutan");
$sambutan = mysqli_fetch_assoc($datasambutan);
