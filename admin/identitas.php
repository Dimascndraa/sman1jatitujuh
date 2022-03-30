<?php

$query = mysqli_query($koneksi, "SELECT * FROM tbl_identitas");
$dentitas = mysqli_fetch_assoc($query);

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
                                Ubah Identitas
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
                        <form method="POST" action="proses_identitas.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="<?= $identitas['nama'] ?>" class="form-control" id="nama" placeholder="nama" autocomplete="off" required="required" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="telp">Telp</label>
                                <input type="text" value="<?= $identitas['telp'] ?>" class="form-control" id="telp" placeholder="Telp" autocomplete="off" required="required" name="telp">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" value="<?= $identitas['email'] ?>" class="form-control" id="email" placeholder="Email" autocomplete="off" required="required" name="email">
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" name="logo" class="form-control-file mb-2" id="logo" autocomplete="off">
                                    </div>
                                    *foto sebelumnya <br>
                                    <img src="../resources/images/<?= $identitas['logo'] ?>" alt="" width="80%" class="img-thumbnail mt-2">
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="foto">Jumbotron</label>
                                        <input type="file" name="jumbotron" class="form-control-file mb-2" id="foto" autocomplete="off">
                                    </div>
                                    *foto sebelumnya <br>
                                    <img src="../resources/images/<?= $identitas['jumbotron'] ?>" alt="" width="80%" class="img-thumbnail mt-2">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="slogan">Motto</label>
                                <textarea name="slogan" id="slogan" cols="30" rows="3" class="form-control"><?= $identitas['slogan'] ?></textarea>
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
    <script src="../../resources/js/jquery.js"></script>
    <script src="../../resources/js/bootstrap.min.js"></script>
    <script src="../../resources/ckeditor/ckeditor.js"></script>
</body>

</html>