<?php
include 'layout/header.php';
$id = $_GET['id'];
?>
<main class="py-5 mt-3">
    <div class="card mb-3 mt-5">
        <div class="row">
            <?php
            include 'koneksi.php';
            $user = $_SESSION['UserID'];
            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$id'");
            $data = mysqli_fetch_array($sql); {
            ?>
                <div class="col-md-6">
                    <a href="<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>" data-lightbox="image-1">
                        <img src="<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>" class="img-fluid rounded-start" alt="...">
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <?php
                                include 'koneksi.php';
                                $id = $_SESSION['UserID'];
                                $s = mysqli_query($koneksi, "SELECT user.Username
                                FROM user INNER JOIN foto ON foto.UserID=user.UserID where user.UserID=$id");
                                $d = mysqli_fetch_array($s); {
                                ?>
                                    <img src="assets/file/IMG-20240115-WA0033.jpg" alt="" class="rounded-circle" width="25px">
                                    <span class="text-secondary m-2"><?= $d['Username']; ?></span>
                                <?php } ?>
                            </div>
                            <div class="col-3">
                                <?php
                                $id = $_GET['id'];
                                $user = $_SESSION['UserID'];
                                $ss = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID=$id and UserID=$user");
                                $dd = mysqli_fetch_array($ss); {
                                    if ($dd['Publish'] == 0) { ?>
                                        <span class=""><i><i class="bi bi-eye-slash"></i> Foto ini bersifat private</i></span>
                                    <?php } else { ?>
                                <?php }
                                } ?>
                            </div>
                            <div class="col-3 text-end">
                                <div class="dropdown">
                                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-list"></i>
                                    </a>
                                    <ul class="dropdown-menu text-small">
                                        <li><a class="dropdown-item" href="ViewLike.php?id=<?= $data['FotoID']; ?>"><i class="bi bi-heart-fill"></i> lihat like</a></li>
                                        <li><a class="dropdown-item" href="ViewComment.php?id=<?= $data['FotoID']; ?>"><i class="bi bi-chat-dots"></i> lihat komentar</a></li>
                                        <hr>
                                        <?php
                                        $id = $_GET['id'];
                                        $user = $_SESSION['UserID'];
                                        $s = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID=$id and UserID=$user");
                                        $d = mysqli_fetch_assoc($s);
                                        if ($d['Publish'] == 0) { ?>
                                            <li><a class="dropdown-item" href="publish.php?id=<?= $id; ?>&user=<?= $user; ?>" onclick="return confirm('Apakah Anda Yain Ingin Mempublish Foto Ini?');"><i class="bi bi-eye"></i> Publish Foto</a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li><a class="dropdown-item" href="private.php?id=<?= $id; ?>&user=<?= $user; ?>" onclick="return confirm('Apakah Anda Yain Ingin Memprivate Foto Ini?');"><i class="bi bi-eye-slash"></i> Private Foto</a></li>
                                        <?php
                                        }
                                        ?>
                                        <li><a class="dropdown-item" href="hapusFoto.php?id=<?= $data['FotoID']; ?>" onclick="return confirm('Apakah Anda Yain Ingin Menghapus Foto Ini?');"><i class="bi bi-trash"></i> hapus</a></li>
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
</main>

<?php
include 'layout/footer.php';
?>