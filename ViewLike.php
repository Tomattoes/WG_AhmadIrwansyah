<?php
include 'layout/header.php';
$id = $_GET['id'];
?>

<main class="py-5 mt-3">
    <div class="card mt-5">
        <ul class="list-group list-group-flush">
            <?php
            include 'koneksi.php';
            $sd = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$id'");
            $sql = mysqli_fetch_assoc($sd); {
                if ($sql['Publish'] == "1") {
                    $s = mysqli_query($koneksi, "SELECT * FROM likefoto INNER JOIN user ON likefoto.UserID=user.UserID INNER JOIN foto ON foto.FotoID=likefoto.FotoID WHERE likefoto.FotoID='$id'");
                    $cek = mysqli_num_rows($s);
                    if ($cek == 0) { ?>
                        <span class="text-body p-4 m-4" style="color: blue;">Belum ada like</span>
                        <?php } else {
                        while ($sq = mysqli_fetch_array($s)) { ?>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-start m-2">
                                    <img src="assets/file/IMG-20240115-WA0033.jpg" alt="" class="rounded-circle" width="3%" height="3%">
                                    <span class="text-body m-1"><?= $sq['Username']; ?></span>
                                    <span class="text-secondary m-1">Memberikan Like <i class="bi bi-heart-fill" style="color: red;"></i></span>
                                </div>
                                <div class="d-flex justify-content-end"><span class="text-secondary m-2"><?= $sq['TanggalLike'] ?></span></div>
                            </li>
                    <?php }
                    }
                } elseif ($sql['Publish'] == "0") { ?>
                    <span class="text-body p-4 m-4" style="color: blue;"><i><i class="bi bi-eye-slash"></i> Foto ini bersifat private</i></span>
            <?php }
            } ?>
        </ul>
    </div>
</main>

<?php
include 'layout/footer.php';
?>