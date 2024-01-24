<?php
include 'layout/header.php';
?>

<main>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                <?php
                include 'koneksi.php';
                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE Publish=1");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= $data['LokasiFile'] ?><?= $data['Foto'] ?>" alt="" width="100%" height="225px">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="View.php?id=<?= $data['FotoID'] ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <small class="text-body-secondary text-sm"><?= $data['TanggalUnggah'] ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</main>
<?php
include 'layout/footer.php'
?>