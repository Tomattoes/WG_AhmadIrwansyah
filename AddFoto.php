<?php
include 'layout/header.php';
$album = $_GET['id'];
?>

<div class="card">
    <form class="form-control" action="aksiFotoAlbum.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <input type="hidden" name="user" value="<?= $_SESSION['UserID'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="hidden" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul Foto</label>
            <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            <input type="hidden" name="album" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $album; ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
            <textarea type="text" name="deskripsi" class="form-control" id="exampleInputPassword1"></textarea>
        </div>
        <label for="exampleInputEmail1" class="form-label">Publish</label>
        <div class="mb-3">
            <label for="publish" class="form-label">Ya</label>
            <input type="radio" name="publish" id="publish" aria-describedby="emailHelp" value="1" required>
            <label for="publish" class="form-label">Tidak</label>
            <input type="radio" name="publish" id="publish" aria-describedby="emailHelp" value="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<?php
include 'layout/footer.php';
?>