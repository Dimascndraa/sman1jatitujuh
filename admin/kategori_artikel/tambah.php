<?php $active = 'artikel'; ?>
<div class="container mt-3">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header">
					<div class="clearfix">
						<div class="float-left">
							Tambah Kategori Artikel
						</div>
						<div class="float-right">
							<a href="?page=kategori_artikel">Kembali</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="kategori_artikel/proses_tambah.php">
						<div class="form-group">
							<label for="nama_kategori">Kategori</label>
							<input type="text" class="form-control" id="nama_kategori" placeholder="nama kategori" autocomplete="off" required="required" name="nama_kategori">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary" name="tambah">Tambah</button>
							<button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
							<a href="?page=kategori_artikel" class="btn btn-sm btn-secondary">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../../resources/js/jquery.js"></script>
<script src="../../resources/js/bootstrap.min.js"></script>