<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: ../index.php?page=jurusan');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan WHERE id = $id");
$jurusan = mysqli_fetch_assoc($query);
$query_guru = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

$active = 'master';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Jurusan - <?= $identitas['nama']; ?></title>
	<link rel="stylesheet" href="../../resources/css/bootstrap.min2.css">
	<link rel="icon" type="image/png" href="../../resources/images/<?= $identitas['logo']; ?>">
</head>

<body>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<div class="card shadow">
					<div class="card-header">
						<div class="clearfix">
							<div class="float-left">
								Ubah Jurusan
							</div>
							<div class="float-right">
								<a href="../index.php?page=jurusan">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_ubah.php?id=<?= $jurusan['id'] ?>">
							<div class="form-group">
								<label for="nama_jurusan">Nama Jurusan</label>
								<input type="text" value="<?= $jurusan['nama_jurusan'] ?>" class="form-control" id="nama_jurusan" placeholder="nama jurusan" autocomplete="off" required="required" name="nama_jurusan">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah</button>
								<a href="../index.php?page=jurusan" class="btn btn-sm btn-secondary">Kembali</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../../resources/js/jquery.js"></script>
	<script src="../../resources/js/bootstrap.min.js"></script>
</body>

</html>