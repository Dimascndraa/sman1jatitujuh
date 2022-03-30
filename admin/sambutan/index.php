<?php

$query = mysqli_query($koneksi, "SELECT * FROM tbl_sambutan");
$sambutan = mysqli_fetch_assoc($query);

$active = 'master';
?>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="clearfix">
                            <div class="float-left">
                                Sambutan
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
                        <form method="POST" action="sambutan/proses_sambutan.php" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $sambutan['id']; ?>">

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="logo">Foto</label>
                                        <input type="file" name="foto" class="form-control-file mb-2" id="logo" autocomplete="off">
                                    </div>
                                    *foto sebelumnya <br>
                                    <img src="../resources/sambutan/<?= $sambutan['foto'] ?>" alt="" width="80%" class="img-thumbnail mt-2">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="nama">Nama</label>
                                <input type="text" value="<?= $sambutan['nama_kepsek'] ?>" class="form-control" id="nama" placeholder="nama" autocomplete="off" required="required" name="nama_kepsek">
                            </div>
                            <div class="form-group mt-3">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" value="<?= $sambutan['jabatan'] ?>" class="form-control" id="jabatan" placeholder="jabatan" autocomplete="off" required="required" name="jabatan">
                            </div>
                            <div class="form-group mt-3">
                                <label for="ckeditor">Sambutan</label>
                                <textarea name="sambutan" id="ckeditor" class="ckeditor form-control">
									<?= $sambutan['sambutan'] ?>
								</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary" name="ubah">Ubah</button>
                                <a href="./" class="btn btn-sm btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../resources/js/jquery.js"></script>
    <script src="../resources/js/bootstrap.min.js"></script>
    <script src="../resources/ckeditor/ckeditor.js"></script>
</body>

</html>