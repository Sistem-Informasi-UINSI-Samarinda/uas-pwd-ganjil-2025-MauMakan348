<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Ambil ID dari URL
$id = $_GET['id'];

$ambil = mysqli_query($conn, "SELECT * FROM kuda WHERE id_kuda='$id'");
$data = mysqli_fetch_assoc($ambil);

// tombol submit
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_kuda'];
    $lahir = $_POST['tanggal_lahir'];
    $kelamin = $_POST['jenis_kelamin'];
    $peternakan = $_POST['peternakan'];

    // Cek apakah ada upload foto baru
    if ($_FILES['foto_kuda']['name'] != "") {
        $foto = $_FILES['foto_kuda']['name'];
        $tmp = $_FILES['foto_kuda']['tmp_name'];
        $folder = "../../uploads/kuda/";

        // Hapus foto lama
        if (file_exists($folder.$data['foto_kuda'])) {
            unlink($folder.$data['foto_kuda']);
        }

        move_uploaded_file($tmp, $folder.$foto);

        $query = "UPDATE kuda SET
                    nama_kuda='$nama',
                    tanggal_lahir='$lahir',
                    jenis_kelamin='$kelamin',
                    peternakan='$peternakan',
                    foto_kuda='$foto'
                  WHERE id_kuda='$id'";
    } else {
        // Tanpa mengubah foto
        $query = "UPDATE kuda SET
                    nama_kuda='$nama',
                    tanggal_lahir='$lahir',
                    jenis_kelamin='$kelamin',
                    peternakan='$peternakan'
                  WHERE id_kuda='$id'";
    }

    mysqli_query($conn, $query);
    header("Location: kudakan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kuda</title>
</head>
<body>

<h2>Edit Data Kuda</h2>

<form method="POST" enctype="multipart/form-data">
    Nama kuda:<br>
    <input type="text" name="nama_kuda" value="<?= $data['nama_kuda']; ?>"><br><br>

    Tanggal lahir:<br>
    <input type="text" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>"><br><br>

    Jenis kelamin:<br>
    <select name="jenis_kelamin">
        <option <?= $data['jenis_kelamin'] == 'Jantan' ? 'selected' : '' ?>>Jantan</option>
        <option <?= $data['jenis_kelamin'] == 'Betina' ? 'selected' : '' ?>>Betina</option>
    </select><br><br>

    Peternakan:<br>
    <input type="text" name="peternakan" value="<?= $data['peternakan']; ?>"><br><br>

    Foto sebelumnya:<br>
    <img src="../../uploads/kuda/<?= $data['foto_kuda']; ?>" width="120"><br><br>

    Ganti foto (opsional):<br>
    <input type="file" name="foto_kuda"><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>

</body>
</html>
