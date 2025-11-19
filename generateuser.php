<?php 
include 'config/koneksi.php';

$username = "admin";
$email = "admin@gmail.com";
$password = password_hash("maumakan", PASSWORD_DEFAULT);
$nama_lengkap = "administrator";

$query = "insert into users (username, email, password, nama_lengkap)
values ('$username', '$email', '$password', '$nama_lengkap')";

if (mysqli_query($conn, $query)) {
    echo "akunnya udah selesai";
} else {
    echo "gagal tuh", mysqli_error($conn);
}

?>