<?php
include 'layout/header.php';
?>

<div class="row py-lg-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Profil Saat Ini</h3>
            </div>
            <?php
            $user = $_SESSION['UserID'];
            include 'koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID=$user");
            $data = mysqli_fetch_array($sql); {
            ?>
                <form class="form-control" action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                        <input type="text" value="<?= $data['NamaLengkap']; ?>" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" value="<?= $data['Email']; ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" value="<?= $data['Username']; ?>" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="text" value="<?= $data['Alamat']; ?>" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Edit Profil</h3>
            </div>
            <?php
            $user = $_SESSION['UserID'];
            include 'koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID=$user");
            $data = mysqli_fetch_array($sql); {
            ?>
                <form class="form-control" action="proses_editprofil.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Pengguna</label>
                        <input type="text" name="nama" value="<?= $data['NamaLengkap']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <input type="hidden" name="UserID" value="<?= $_SESSION['UserID']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" name="email" value="<?= $data['Email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" value="<?= $data['Username']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input type="text" name="alamat" value="<?= $data['Alamat']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md">Ubah</button>
                </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>