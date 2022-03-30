<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: ../index.php?page=kategori_artikel');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_kategori_artikel WHERE id = {$id}");
$row = mysqli_fetch_assoc($query);
$active = 'artikel';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah Kategori Artikel - <?= $identitas['nama']; ?></title>
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
								Ubah Kategori Artikel
							</div>
							<div class="float-right">
								<a href="../index.php?page=kategori_artikel">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_ubah.php?id=<?= $row['id'] ?>">
							<div class="form-group">
								<label for="nama_kategori">Kategori</label>
								<input type="text" class="form-control" id="nama_kategori" placeholder="nama kategori" autocomplete="off" required="required" name="nama_kategori" value="<?= $row['nama_kategori'] ?>">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah</button>
								<a href="../index.php?page=kategori_artikel" class="btn btn-sm btn-secondary">Kembali</a>
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