<?php

$servername = "localhost";
$database = "pwd_2441919011";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("koneksinya gagal ndok! ". mysqli_connect_error());
}


?>