<?php
$active = 'master';

require_once '../koneksi.php';
$query = mysqli_query($koneksi, "SELECT id, nama FROM tbl_guru");

?>

<div class="container mt-3">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header">
					<div class="clearfix">
						<div class="float-left">
							Tambah Ekskul
						</div>
						<div class="float-right">
							<a href="?page=ekskul">Kembali</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="ekskul/proses_tambah.php">
						<div class="form-group">
							<label for="nama_ekskul">Nama Ekskul</label>
							<input type="text" class="form-control" id="nama_ekskul" placeholder="nama ekskul" autocomplete="off" required="required" name="nama_ekskul">
						</div>
						<div class="form-group">
							<label for="pembina">Pembina</label>
							<select name="pembina" id="pembina" class="form-control">
								<?php while ($row = mysqli_fetch_assoc($query)) : ?>
									<option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
								<?php endwhile; ?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah</button>
							<button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
							<a href="?page=ekskul" class="btn btn-sm btn-secondary">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../resources/js/jquery.js"></script>
<script src="../resources/js/bootstrap.min.js"></script>