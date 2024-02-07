<?php
include 'layout/header.php';
$id = $_GET['id'];
?>
<div class="py-5">
    <div class="card">
        <ul class="list-group list-group-flush">
            <?php
            include 'koneksi.php';
            $sd = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$id'");
            $sql = mysqli_fetch_assoc($sd); {
                if ($sql['Publish'] == "1") {
                    $s = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.UserID=user.UserID WHERE komentarfoto.FotoID='$id'");
                    $sq = mysqli_fetch_assoc($sd);
                    $cek = mysqli_num_rows($s);
                    if ($cek == 0) { ?>
                        <span class="text-body p-4 m-4" style="color: blue;">Belum ada komentar</span>
                        <?php } else {
                        while ($sq = mysqli_fetch_array($s)) { ?>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-start m-2">
                                    <img src="assets/file/IMG-20240115-WA0033.jpg" alt="" class="rounded-circle" width="3%" height="3%">
                                    <span class="text-body m-1"><?= $sq['Username']; ?></span>
                                    <span class="text-secondary m-1"><?= $sq['IsiKomentar'] ?></span>
                                </div>
                                <div class="d-flex justify-content-end"><span class="text-secondary m-2"><?= $sq['TanggalKomentar'] ?></span></div>
                            </li>
                    <?php }
                    }
                } elseif ($sql['Publish'] == "0") { ?>
                    <span class="text-body p-4 m-4" style="color: blue;"><i><i class="bi bi-eye-slash"></i> Foto ini bersifat private</i></span>
            <?php }
            } ?>
        </ul>
    </div>
</div>

<?php
include 'layout/footer.php';
?>