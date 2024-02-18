<?php
include 'layout/header.php';
?>

<main>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 g-3 mt-5">
                <?php
                include 'koneksi.php';
                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE Publish=1");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="View.php?id=<?= $data['FotoID'] ?>">
                                <img src="<?= $data['LokasiFile'] ?><?= $data['Foto'] ?>" alt="" width="100%" height="225px">
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <?php
                                        $FotoID = $data['FotoID'];

                                        $d = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID = '$FotoID'");
                                        ?>
                                        <button class="btn btn-outline"><i class="bi bi-heart-fill" style="color: red;"></i> <?= mysqli_num_rows($d); ?></button>
                                        <?php
                                        $FotoID = $data['FotoID'];
                                        $s = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE FotoID = '$FotoID'");
                                        ?>
                                        <button class="btn btn-outline"><i class="bi bi-chat-dots"></i> <?= mysqli_num_rows($s); ?></button>

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