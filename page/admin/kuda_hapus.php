<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM kuda WHERE id_kuda='$id'");

header("Location: kudakan.php");
