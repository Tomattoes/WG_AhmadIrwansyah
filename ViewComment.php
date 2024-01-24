<?php
include 'layout/header.php';
$id = $_GET['id'];
?>

<div class="card">
    <ul class="list-group list-group-flush">
        <?php
        include 'koneksi.php';
        $s = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.UserID=user.UserID WHERE komentarfoto.FotoID='$id'");
        $cek = mysqli_num_rows($s); {
            if ($cek == 0) { ?><span class="text-body p-4 m-4" style="color: blue;">Jadilah yang pertama berkomentar</span>
                <?php } else {
                while ($d = mysqli_fetch_array($s)) { ?>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-start m-2">
                            <img src="assets/file/IMG-20240115-WA0033.jpg" alt="" class="rounded-circle" width="3%" height="3%">
                            <span class="text-body m-1"><?= $d['Username']; ?></span>
                            <span class="text-secondary m-1"><?= $d['IsiKomentar'] ?></span>
                        </div>
                        <div class="d-flex justify-content-end"><span class="text-secondary m-2"><?= $d['TanggalKomentar'] ?></span></div>
                    </li>
        <?php }
            }
        } ?>
    </ul>
</div>

<?php
include 'layout/footer.php';
?>