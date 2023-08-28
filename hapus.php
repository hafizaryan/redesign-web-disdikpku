<?php
// koneksi database

$conn = mysqli_connect('localhost','root','','contact') or die('connection failed');
// menyimpan sementara data id yang di kirim dari url
$id = $_GET['id'];
// menghapus data dari database
mysqli_query($conn,"delete from coment where id='$id'");
// mengalihkan halaman kembali ke index.php
header("location:contact.php");
?>