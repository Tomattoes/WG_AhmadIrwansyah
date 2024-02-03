<?php
include 'layout/header.php';
$id = $_GET['id'];
?>

<div class="card mb-3">
    <div class="row">
        <?php
        include 'koneksi.php';
        $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$id'");
        $data = mysqli_fetch_array($sql); {
            $file_path = $data['LokasiFile'] . $data['Foto'];
        ?>
            <div class="col-md-4">
                <a href="<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>" data-lightbox="image-1">
                    <img src="<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>" class="img-fluid rounded-start" alt="...">
                </a>
            </div>
            <div class="col-md-8">
                <form action="comment.php" method="post">
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
                                        <li><a class="dropdown-item" href="<?= $file_path; ?>" download><i class="bi bi-download"></i> unduh</a></li>
                                        <?php
                                        $id = $_GET['id'];
                                        $user = $_SESSION['UserID'];
                                        $ss = mysqli_query($koneksi, "SELECT * FROM save WHERE FotoID=$id and UserID=$user");
                                        $dd = mysqli_num_rows($ss);
                                        if ($dd > 0) { ?>
                                            <li><a class="dropdown-item" href="unsave.php?id=<?= $data['FotoID']; ?>&user=<?= $_SESSION['UserID']; ?>"><i class="bi bi-bookmark-fill" style="color: yellow;"></i> simpan</a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li><a class="dropdown-item" href="save.php?id=<?= $data['FotoID']; ?>&user=<?= $_SESSION['UserID']; ?>"><i class="bi bi-bookmark"></i> simpan</a></li>
                                        <?php
                                        }
                                        ?>
                                        <li><a class="dropdown-item" href="ViewComment.php?id=<?= $data['FotoID']; ?>"><i class="bi bi-chat-dots"></i> lihat semua komentar</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title text-body-secondary"><?= $data['JudulFoto'] ?></h5>
                        <p class="card-text"><?= $data['Deskripsi'] ?>.</p>
                        <p class="text-body-secondary text-sm-end m-3"><?= $data['TanggalUnggah'] ?></p>
                        <div class="input-group mb-3 p-4">
                            <?php
                            $id = $_GET['id'];
                            $user = $_SESSION['UserID'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID=$id and UserID=$user");
                            $data = mysqli_num_rows($sql);
                            if ($data > 0) { ?>
                                <button type="button" class="btn btn-outline-secondary" id="button-addon2"><i class="bi bi-heart-fill" style="color: red;"></i></button>
                            <?php
                            } else {
                            ?>
                                <a href="like.php?id=<?= $id; ?>&user=<?= $user; ?>" type="button" class="btn btn-outline-secondary" id="button-addon2"><i class="bi bi-heart"></i>
                                </a>
                            <?php
                            }
                            ?>
                            <input type="text" name="komentar" class="form-control" placeholder="type comment here" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input type="hidden" name="user" value="<?= $user ?>" class="form-control" placeholder="type comment here" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <input type="hidden" name="id" value="<?= $id ?>" class="form-control" placeholder="type comment here" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-send"></i></button>
                        </div>

                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

<?php
include 'layout/footer.php';
?>