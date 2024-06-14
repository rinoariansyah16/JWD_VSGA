<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$foto = $_FILES['foto']['name'];

if($foto != "") {
    $allowed_ext = array('png', 'jpg', 'jpeg');
    $ext = strtolower(end(explode('.', $foto)));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $file_new = uniqid() . '.' . $ext;

    if(in_array($ext, $allowed_ext)) {
        move_uploaded_file($file_tmp, "../../../assets/img/portfolio/".$file_new);
        
        $query = "UPDATE portofolio SET nama = '$nama', foto = '$file_new' WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        
        if(!$result) {
            die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            header("Location: ../../portofolio.php?status=success");
        }
    } else {
        echo "Ekstensi file tidak diizinkan.";
    }
} else {
    $query = "UPDATE portofolio SET nama = '$nama' WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    
    if(!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        header("Location: ../../portofolio.php?status=success");
    }
}
?>
