<?php
include 'layout/header.php';
$id = $_GET['id'];
?>

<div class="card mb-3">
    <div class="row">
        <?php
        include 'koneksi.php';
        $user = $_SESSION['UserID'];
        $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$id'");
        $data = mysqli_fetch_array($sql); {
        ?>
            <div class="col-md-4">
                <img src="<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <?php
                            include 'koneksi.php';
                            $s = mysqli_query($koneksi, "SELECT user.Username
                                FROM user INNER JOIN foto ON foto.UserID=user.UserID");
                            $d = mysqli_fetch_array($s); {
                            ?>
                                <img src="assets/file/IMG-20240115-WA0033.jpg" alt="" class="rounded-circle" width="25px">
                                <span class="text-secondary m-2"><?= $d['Username']; ?></span>
                            <?php } ?>
                        </div>
                        <div class="col-6">
                            <div class="dropdown text-end">
                                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-list"></i>
                                </a>
                                <ul class="dropdown-menu text-small">
                                    <li><a class="dropdown-item" href="hapusFoto.php?id=<?= $data['FotoID']; ?>" onclick="return confirm('Apakah Anda Yain Ingin Menghapus Foto Ini?');"><i class="bi bi-trash"></i> hapus</a></li>
                                    <li><a class="dropdown-item" href="ViewLike.php?id=<?= $data['FotoID']; ?>"><i class="bi bi-heart-fill"></i> lihat like</a></li>
                                    <li><a class="dropdown-item" href="ViewComment.php?id=<?= $data['FotoID']; ?>"><i class="bi bi-chat-dots"></i> lihat komentar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title text-body-secondary"><?= $data['JudulFoto'] ?></h5>
                    <p class="card-text"><?= $data['Deskripsi'] ?>.</p>
                    <p class="text-body-secondary text-sm-end m-3"><?= $data['TanggalUnggah'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
include 'layout/footer.php';
?>