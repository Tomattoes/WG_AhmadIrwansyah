<?php
include 'layout/header.php';
?>

<div class="row py-lg-5">
    <div class="col">
        <div class="card">
            <form class="form-control" action="aksi.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Album</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <input type="hidden" name="user" value="<?= $_SESSION['UserID'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <input type="hidden" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" id="exampleInputPassword1" required></textarea>
                    <br>
                    <a class="mt-5 mb-3 text-body" href="UploadFoto.php">Upload Foto?</a>
                </div>
                <button type="submit" name="buat" class="btn btn-primary">Buat</button>
            </form>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>