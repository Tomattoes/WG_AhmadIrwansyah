<?php
include 'layout/header.php';
?>

<div class="card">
    <form class="form-control" action="aksiFoto.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <input type="hidden" name="user" value="<?= $_SESSION['UserID'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="hidden" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul Foto</label>
            <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
            <textarea type="text" name="deskripsi" class="form-control" id="exampleInputPassword1"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Masukan ke Album</label>
            <select name="album" id="exampleInputPassword1" class="form-control">
                <option value=""> -- Pilih Album -- </option>
                <?php
                include 'koneksi.php';
                $user = $_SESSION['UserID'];
                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$user'");
                while ($data = mysqli_fetch_array($sql)) { ?>
                    <option value="<?= $data['AlbumID'] ?>"><?= $data['NamaAlbum'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <label for="exampleInputEmail1" class="form-label">Publish</label>
        <div class="mb-3">
            <label for="publish" class="form-label">Ya</label>
            <input type="radio" name="publish" id="publish" aria-describedby="emailHelp" value="1" required>
            <label for="publish" class="form-label">Tidak</label>
            <input type="radio" name="publish" id="publish" aria-describedby="emailHelp" value="0" required>
            <br>
            <a class="mt-5 mb-3 text-body" href="CreateAlbum.php">Buat Album?</a>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>