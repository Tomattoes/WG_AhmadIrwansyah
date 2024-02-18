<?php
include 'layout/header.php';

?>

<main>

    <section class="text-center container p-5">
        <div class="row py-lg-5 p-5 mt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Create Album</h1>
                <p class="lead text-body-secondary">Buat Album dan kaitkan momen berharga anda kapanpun dan dimanapun hanya dengan Thread Link.</p>
                <p>
                    <a href="CreateAlbum.php" class="btn btn-primary my-2">Buat Album</a>
                    <a href="UploadFoto.php" class="btn btn-secondary my-2">Upload Foto</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                <?php
                include 'koneksi.php';
                $ID = $_SESSION['UserID'];
                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$ID'");
                $cek = mysqli_num_rows($sql); {
                    if ($cek == 0) { ?><span class="fw-light" style="color: red;">Anda belum Memiliki Album</span>
                        <?php } else {
                        while ($data = mysqli_fetch_array($sql)) { ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <a href="ViewAlbum.php?id=<?= $data['AlbumID'] ?>">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                            <title>Img</title>
                                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $data['NamaAlbum'] ?></text>
                                        </svg>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text"><?= $data['Deskripsi'] ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="ViewAlbum.php?id=<?= $data['AlbumID'] ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                                <a href="HapusAlbum.php?id=<?= $data['AlbumID'] ?>" type="button" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Album ini? Semua Foto Yang Ada di Album Ini Akan Ikut Terhapus!');"><i class="bi bi-trash"></i></a>
                                            </div>
                                            <small class="text-body-secondary"><?= $data['TanggalDibuat'] ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>
            </div>

        </div>
    </div>
</main>

<?php
include 'layout/footer.php';
?>