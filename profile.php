<?php
include 'layout/header.php';

?>
<div class="row py-lg-5 p-5 mt-5">
    <div class="col mt-4">

        <main>

            <section class="text-center container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <?php
                        include 'koneksi.php';
                        $user = $_SESSION['UserID'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID='$user'");
                        while ($data = mysqli_fetch_array($sql)) {
                        ?>
                            <img src="assets/file/IMG-20240115-WA0033.jpg" alt="" class="rounded-circle" width="200px">
                            <h1 class="fw-light"><?= $data['Username'] ?></h1>
                            <p class="lead text-body-secondary"><?= $data['Email'] ?></p>
                        <?php } ?>
                        <p>
                            <?php
                            include 'koneksi.php';
                            $user = $_SESSION['UserID'];
                            $sql = mysqli_query($koneksi, "SELECT COUNT(LikeID) as lk 
                    FROM user INNER JOIN foto ON foto.UserID=user.UserID INNER JOIN likefoto ON likefoto.FotoID=foto.FotoID 
                    WHERE user.UserID='$user'");
                            $data = mysqli_fetch_array($sql); {
                            ?>
                                <button class="btn btn-secondary my-2"><i class="bi bi-heart-fill" style="color: red;"></i> <?= $data['lk'] ?></button>
                            <?php } ?>
                            <a href="editProfile.php" class="btn btn-primary my-2">Edit Profile</a>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="container text-center">
                    <div class="row">
                        <?php
                        include 'koneksi.php';
                        $ID = $_SESSION['UserID'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM save INNER JOIN foto ON save.FotoID=foto.FotoID INNER JOIN user ON save.UserID=user.UserID WHERE user.UserID='$ID'");
                        while ($data = mysqli_fetch_array($sql)) { ?>
                            <div class="col">
                                <a href="View.php?id=<?= $data['FotoID'] ?>">
                                    <img src="<?= $data['LokasiFile'] ?><?= $data['Foto'] ?>" alt="" width="120px" height="225px">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

        </main>

    </div>
</div>

<?php
include 'layout/footer.php';
?>