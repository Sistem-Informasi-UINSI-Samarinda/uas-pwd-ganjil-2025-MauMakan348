<?php
include '../../config/koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_kuda'];
    $lahir = $_POST['tanggal_lahir'];
    $kelamin = $_POST['jenis_kelamin'];
    $peternakan = $_POST['peternakan'];

    // Upload foto
    $file = $_FILES['foto_kuda']['name'];
    $tmp = $_FILES['foto_kuda']['tmp_name'];
    $folder = "../../uploads/kuda/";

    move_uploaded_file($tmp, $folder.$file);

    mysqli_query($conn, "INSERT INTO kuda (nama_kuda, tanggal_lahir, jenis_kelamin, peternakan, foto_kuda)
                         VALUES ('$nama','$lahir','$kelamin','$peternakan','$file')");

    header("Location: kudakan.php");
}
?>

<form method="POST" enctype="multipart/form-data">
    Nama kuda: <input type="text" name="nama_kuda"><br>
    Tanggal lahir: <input type="text" name="tanggal_lahir"><br>
    Jenis kelamin: 
        <select name="jenis_kelamin">
            <option value="Jantan">Jantan</option>
            <option value="Betina">Betina</option>
        </select><br>
    Peternakan: <input type="text" name="peternakan"><br>
    Foto: <input type="file" name="foto_kuda"><br>
    <button type="submit" name="submit">Simpan</button>
    <a href="kudakan.php">kembali</a>
</form>
