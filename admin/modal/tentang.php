<div class="modal fade" id="tentang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Bagian Tentang Kami</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <?php
                    include "action/koneksi.php";
                    $tentang = "SELECT * FROM pembaruan WHERE id=1";
                    $result = mysqli_query($koneksi, $tentang);
                    if (!$result) {
                        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                    }
                    $about = mysqli_fetch_assoc($result);
                    ?>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="<?php echo $about['judul']; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">Visi Misi Poin 1</label>
                            <textarea class="form-control" name="perubahan1" rows="3"><?php echo $about['perubahan1']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Visi Misi Poin 2</label>
                            <textarea class="form-control" name="perubahan2" rows="3"><?php echo $about['perubahan2']; ?></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label">Visi Misi Poin 3</label>
                            <textarea class="form-control" name="perubahan3" rows="3"><?php echo $about['perubahan3']; ?></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bagian Tentang</label>
                        <textarea class="form-control" name="perubahan4" rows="3"><?php echo $about['perubahan4']; ?></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-success" value="Update">
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include "action/koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $perubahan1 = mysqli_real_escape_string($koneksi, $_POST['perubahan1']);
    $perubahan2 = mysqli_real_escape_string($koneksi, $_POST['perubahan2']);
    $perubahan3 = mysqli_real_escape_string($koneksi, $_POST['perubahan3']);
    $perubahan4 = mysqli_real_escape_string($koneksi, $_POST['perubahan4']);

    $query = "UPDATE pembaruan SET 
                judul='$judul', 
                perubahan1='$perubahan1', 
                perubahan2='$perubahan2', 
                perubahan3='$perubahan3', 
                perubahan4='$perubahan4' 
              WHERE id=1";

    if (mysqli_query($koneksi, $query)) {
        header("Location: admin.php?message=update_success");
        
        exit(); 
    } else {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }
}
?>
