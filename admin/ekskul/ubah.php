<?php

if (!isset($_GET['id']) || $_GET['id'] == '') header('Location: ../index.php?page=ekskul');

require_once '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_ekskul WHERE id = $id");
$ekskul = mysqli_fetch_assoc($query);
$query_guru = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

$active = 'master';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ubah ekskul - <?= $identitas['nama']; ?></title>
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
								Ubah Ekskul
							</div>
							<div class="float-right">
								<a href="../index.php?page=ekskul">Kembali</a>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="POST" action="proses_ubah.php?id=<?= $ekskul['id'] ?>">
							<div class="form-group">
								<label for="nama_ekskul">Nama Ekskul</label>
								<input type="text" value="<?= $ekskul['nama_ekskul'] ?>" class="form-control" id="nama_ekskul" placeholder="nama ekskul" autocomplete="off" required="required" name="nama_ekskul">
							</div>
							<div class="form-group">
								<label for="kaprodi">Kaprodi</label>
								<select name="kaprodi" id="kaprodi" class="form-control">
									<?php while ($row = mysqli_fetch_assoc($query_guru)) : ?>
										<option value="<?= $row['id'] ?>" <?= $ekskul['pembina'] == $row['id'] ? 'selected' : '' ?>><?= $row['nama'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah</button>
								<a href="../index.php?page=ekskul" class="btn btn-sm btn-secondary">Kembali</a>
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