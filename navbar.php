<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Navigasi</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link text-white navlink <?= $aktif == 'home' ? 'active' : '' ?>" href="index.html">Home</a>
				<a class="nav-item nav-link text-white navlink <?= $aktif == 'artikel' ? 'active' : '' ?>" href="artikel.html">Artikel</a>
				<div class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white navlink" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Profil Sekolah
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<li>
							<a class="nav-item nav-link text-primary navlink2 <?= $aktif == 'siswa' ? 'active' : '' ?>" href="siswa.html">Siswa</a>
						</li>
						<li>
							<a class="nav-item nav-link text-primary navlink2 <?= $aktif == 'guru' ? 'active' : '' ?>" href="guru.html">Guru</a>
						</li>
						<li>
							<a class="nav-item nav-link text-primary navlink2 <?= $aktif == 'jurusan' ? 'active' : '' ?>" href="jurusan.html">Jurusan</a>
						</li>
						<li>
							<a class="nav-item nav-link text-primary navlink2 <?= $aktif == 'ekskul' ? 'active' : '' ?>" href="ekskul.html">Ekskul</a>
						</li>
						<li>
							<a class="nav-item nav-link text-primary navlink2 <?= $aktif == 'visi_misi' ? 'active' : '' ?>" href="visi_misi.html">Visi Misi</a>
						</li>
					</ul>
				</div>
				<a class="nav-item nav-link text-white navlink <?= $aktif == 'bukutamu' ? 'active' : '' ?>" href="bukutamu.html">Buku Tamu</a>
				<a class="nav-item nav-link text-white navlink <?= $aktif == 'tentang_website' ? 'active' : '' ?>" href="tentang_website.html">Tentang Website</a>
				<a class="nav-item nav-link text-white navlink <?= $aktif == 'login' ? 'active' : '' ?>" href="login.html">Login</a>
			</div>
		</div>
	</div>
</nav>