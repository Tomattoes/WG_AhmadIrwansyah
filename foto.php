<?php
include 'layout/header.php';

?>

<main>
    <div class="album bg-body-tertiary">
        <div class="container">
            <h1 class="fw-light text-center">Foto</h1>
            <div class="text-center">
                <p>
                    <a href="CreateAlbum.php" class="btn btn-primary my-2">Buat Album</a>
                    <a href="UploadFoto.php" class="btn btn-secondary my-2">Upload Foto</a>
                </p>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                <?php
                include 'koneksi.php';
                $ID = $_SESSION['UserID'];
                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$ID'");
                $cek = mysqli_num_rows($sql); {
                    if ($cek == 0) { ?><span class="fw-light" style="color: red;">Anda belum Mengupload Foto</span>
                        <?php } else {
                        while ($data = mysqli_fetch_array($sql)) { ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img src="<?= $data['LokasiFile'] ?><?= $data['Foto'] ?>" alt="" width="100%" height="225px">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="ViewFoto.php?id=<?= $data['FotoID'] ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                                <a href="hapusFoto.php?id=<?= $data['FotoID'] ?>" type="button" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Foto ini?');"><i class="bi bi-trash"></i></a>
                                            </div>
                                            <small class="text-body-secondary"><?= $data['TanggalUnggah'] ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                <?php }
                } ?>
            </div>

        </div>
    </div>
</main>


<?php
include 'layout/footer.php';
?>