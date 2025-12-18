
<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM arena WHERE id_arena='$id'");

header("Location: arenakan.php");