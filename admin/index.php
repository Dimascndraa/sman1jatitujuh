<?php
require_once 'cek_session.php';
$data = mysqli_query($koneksi, "SELECT * FROM tbl_identitas");
$identitas = mysqli_fetch_assoc($data);

$username = $_SESSION['username'];
$dataPengguna = mysqli_query($koneksi, "SELECT * FROM tbl_pengguna WHERE username = '$username'");
$pengguna = mysqli_fetch_assoc($dataPengguna);

$active = 'dashboard';
if (!isset($_GET['page'])) {
	header('Location: ./?page=dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $identitas['nama'] ?></title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="../asset/plugins/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" href="../asset/dist/css/adminlte.min.css?v=3.2.0">
	<link rel="stylesheet" href="../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="icon" type="image/png" href="../resources/images/<?= $identitas['logo']; ?>">
</head>

<body class="hold-transition sidebar-mini">

	<div class="wrapper">

		<nav class="main-header navbar navbar-expand navbar-white navbar-light">

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		</nav>


		<aside class="main-sidebar sidebar-dark-primary elevation-4">

			<a href="./" class="brand-link">
				<img src="../resources/images/<?= $identitas['logo']; ?>" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
				<span class="brand-text font-weight-light"><?= "Halaman Admin" ?></span>
			</a>

			<div class="sidebar">

				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="../images/pengguna/<?= $pengguna['foto']; ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $pengguna['nama'] ?></a>
					</div>
				</div>

				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item">
							<a href="?page=dashboard" class="nav-link <?= $_GET['page'] == 'dashboard' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-desktop"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=identitas" class="nav-link <?= $_GET['page'] == 'identitas' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-school"></i>
								<p>
									Identitas
								</p>
							</a>
						</li>
						<li class="nav-item <?= $_GET['page'] == 'kategori_artikel' || $_GET['page'] == 'artikel' ? 'menu-open' : ''; ?>">
							<a href="#" class="nav-link  <?= $_GET['page'] == 'kategori_artikel' || $_GET['page'] == 'artikel' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-newspaper"></i>
								<p>
									Artikel
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=kategori_artikel" class="nav-link <?= $_GET['page'] == 'kategori_artikel' ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Kategori Artikel</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=artikel" class="nav-link  <?= $_GET['page'] == 'artikel' ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Artikel</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item <?= $_GET['page'] == 'guru' || $_GET['page'] == 'jurusan' || $_GET['page'] == 'siswa' || $_GET['page'] == 'ekskul' || $_GET['page'] == 'pengguna' ? 'menu-open' : ''; ?>">
							<a href="#" class="nav-link <?= $_GET['page'] == 'guru' || $_GET['page'] == 'jurusan' || $_GET['page'] == 'siswa' || $_GET['page'] == 'ekskul' || $_GET['page'] == 'pengguna' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-database"></i>
								<p>
									Data Master
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="?page=guru" class="nav-link <?= $_GET['page'] == 'guru' ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Guru</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=siswa" class="nav-link <?= $_GET['page'] == 'siswa' ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Siswa</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=jurusan" class="nav-link <?= $_GET['page'] == 'jurusan' ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Jurusan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=ekskul" class="nav-link <?= $_GET['page'] == 'ekskul' ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Ekskul</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="?page=pengguna" class="nav-link <?= $_GET['page'] == 'pengguna' ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Data Pengguna</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="?page=visi_misi" class="nav-link <?= $_GET['page'] == 'visi_misi' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-chalkboard"></i>
								<p>
									Visi Misi
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=sambutan" class="nav-link <?= $_GET['page'] == 'sambutan' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-chalkboard-teacher"></i>
								<p>
									Sambutan
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=buku_tamu" class="nav-link <?= $_GET['page'] == 'buku_tamu' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-envelope"></i>
								<p>
									Buku Tamu
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?page=tentang_website" class="nav-link <?= $_GET['page'] == 'tentang_website' ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-info-circle"></i>
								<p>
									Tentang Website
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="logout.php" class="nav-link">
								<i class="nav-icon fa fa-power-off"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</aside>

		<div class="content-wrapper">

			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?= $identitas['nama'] ?></h1>
						</div>
					</div>
				</div>
			</section>

			<section class="content">

				<?php
				if (!empty($_GET['page'])) {
					switch (@$_GET['page']) {
						case 'dashboard':
							include 'dashboard.php';
							break;

						case 'kategori_artikel':
							include 'kategori_artikel/index.php';
							break;

						case 'artikel':
							include 'artikel/index.php';
							break;

						case 'tambah_artikel':
							include 'artikel/tambah.php';
							break;

						case 'tambah_kategori':
							include 'kategori_artikel/tambah.php';
							break;

						case 'guru':
							include 'guru/index.php';
							break;

						case 'tambah_guru':
							include 'guru/tambah.php';
							break;

						case 'ekskul':
							include 'ekskul/index.php';
							break;

						case 'tambah_ekskul':
							include 'ekskul/tambah.php';
							break;

						case 'jurusan':
							include 'jurusan/index.php';
							break;

						case 'tambah_jurusan':
							include 'jurusan/tambah.php';
							break;

						case 'pengguna':
							include 'pengguna/index.php';
							break;

						case 'tambah_pengguna':
							include 'pengguna/tambah.php';
							break;

						case 'siswa':
							include 'siswa/index.php';
							break;

						case 'tambah_siswa':
							include 'siswa/tambah.php';
							break;

						case 'buku_tamu':
							include 'bukutamu.php';
							break;

						case 'visi_misi':
							include 'visi_misi.php';
							break;

						case 'tentang_website':
							include 'tentang_website.php';
							break;

						case 'identitas':
							include 'identitas.php';
							break;

						case 'sambutan':
							include 'sambutan/index.php';
							break;

						default:
							echo "<h3 class='text-center text-muted'>*Halaman Tidak Ditemukan</h3>";
							break;
					}
				}

				?>

			</section>

		</div>

		<footer class="main-footer">
			<strong>Copyright &copy; <?= date("Y") . " " . $identitas['nama'] ?>.</strong>
		</footer>

	</div>


	<script src="../asset/plugins/jquery/jquery.min.js"></script>

	<script src="../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="../asset/dist/js/adminlte.min.js?v=3.2.0"></script>

	<script src="../asset/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
	</script>
</body>

</html>