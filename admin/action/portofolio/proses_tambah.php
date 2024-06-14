<?php
include '../koneksi.php';

if (isset($_POST['nama']) && isset($_FILES['foto'])) {
    $nama = $_POST['nama'];
    $fileName = $_FILES['foto']['name'];
    $fileTmpName = $_FILES['foto']['tmp_name'];
    $fileSize = $_FILES['foto']['size'];
    $fileError = $_FILES['foto']['error'];
    $fileType = $_FILES['foto']['type'];
    $allowed = array('jpg', 'jpeg');
    $fileExt = strtolower(end(explode('.', $fileName)));
    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNewName = uniqid('', true) . "." . $fileExt;
                $fileDestination = '../../../assets/img/portfolio/' . $fileNewName;
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $sql = "INSERT INTO portofolio (nama, foto) VALUES ('$nama', '$fileNewName')";
                    if ($koneksi->query($sql) === TRUE) {
                        echo "<script>alert('Data berhasil disimpan!');window.location='../../portofolio.php';</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $koneksi->error;
                    }
                } else {
                    echo "Error saat mengunggah file.";
                }
            } else {
                echo "Ukuran file terlalu besar.";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Jenis file tidak diizinkan.";
    }
} else {
    echo "<script>alert('Data tidak lengkap!');window.location='../../portofolio.php';</script>";
}
?>
