<?php 
include 'config/koneksi.php';

$username = "admin";
$email = "admin@gmail.com";
$password = password_hash("maummakan", PASSWORD_DEFAULT);
$nama_lengkap = "administrator";

$query = "insert into users (username, email, password, nama_lengkap)
values ('$username', '$email', '$password', '$nama_lengkap')";



if (mysql_query($conn, $squery)) {
    echo "akunnya udah selesai";
} else {
    echo "gagal tuh", mysql_error($conn);
}

?>