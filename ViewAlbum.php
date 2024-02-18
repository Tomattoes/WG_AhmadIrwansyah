<?php
include 'layout/header.php';
$id = $_GET['id'];
?>

<section class="py-5 text-center container mt-5">
    <div class="row mt-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <?php
            include 'koneksi.php';
            $ID = $_SESSION['UserID'];
            $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE AlbumID='$id'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <h1 class="fw-light"><?= $data['NamaAlbum'] ?></h1>
                <p class="lead text-body-secondary"><?= $data['Deskripsi'] ?>.</p>
                <a href="AddFoto.php?id=<?= $data['AlbumID'] ?>" class="btn btn-primary"><i class="bi bi-plus"></i> Tambahkan Foto Ke Album <b><?= $data['NamaAlbum'] ?></b></a>
            <?php } ?>
        </div>
    </div>
</section>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 text-center">
    <?php
    include 'koneksi.php';
    $ID = $_SESSION['UserID'];
    $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE AlbumID='$id'");
    $cek = mysqli_num_rows($sql); {
        if ($cek == 0) { ?><span class="fw-light" style="color: red;">Anda belum Mengupload Foto</span>
            <?php } else {
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <a href="ViewFoto.php?id=<?= $data['FotoID'] ?>">
                            <img src="<?= $data['LokasiFile'] ?><?= $data['Foto'] ?>" class="img-fluid rounded-start" alt="..." width="300px">
                        </a>
                    </div>
                </div>
    <?php }
        }
    } ?>
</div>

<?php
include 'layout/footer.php';
?>