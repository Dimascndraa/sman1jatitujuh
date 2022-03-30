<?php
require_once '../koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM tbl_kategori_artikel");
$no = 1;
$active = 'artikel';
?>
<div class="container mt-3">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header">
					<div class="clearfix">
						<div class="float-left">
							Daftar Kategori Artikel
						</div>
						<div class="float-right">
							<a href="?page=tambah_kategori">Tambah</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<?php if (isset($_SESSION['sukses'])) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Berhasil!</strong> <?= $_SESSION['sukses'] ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php unset($_SESSION['sukses']) ?>
					<?php elseif (isset($_SESSION['gagal'])) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Gagal!</strong> <?= $_SESSION['gagal'] ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php unset($_SESSION['gagal']) ?>
					<?php endif; ?>
					<table id="table_id" class="dataTable table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_assoc($query)) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $row['nama_kategori'] ?></td>
									<td>
										<a href="kategori_artikel/ubah.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Ubah</a>
										<a href="kategori_artikel/hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin?')">Hapus</a>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../../resources/js/jquery.js"></script>
<script src="../../resources/js/bootstrap.min.js"></script>
<script src="../../resources/datatables/datatables.min.js"></script>
<script src="../../resources/datatables/datatable.js"></script>