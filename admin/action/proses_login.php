<?php 
session_start();
include 'koneksi.php';
$email = $_POST['email'];
$password = $_POST['password'];
 
$result = mysqli_query($koneksi,"SELECT * FROM users where email='$email' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['nohp'] = $data['nohp'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['password'] = $data['password'];
	$_SESSION['status'] = "sudah_login";
	$_SESSION['id'] = $data['id'];
	header("location:../admin.php");
} else {
	header("location:../../index.html?pesan=gagal login data tidak ditemukan.");
}
?>