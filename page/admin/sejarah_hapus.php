
<?php
include '../../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM sejarah WHERE id_sejarah='$id'");

header("Location: sejarahkan.php");