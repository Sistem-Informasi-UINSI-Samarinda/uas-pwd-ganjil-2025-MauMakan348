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
<h lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kuda</title>
    <link rel="stylesheet" href="../../assets/css/adminstyle.css">
</head>

<body class="body-utama">
    <div class="sidebar">
        <h2>Adminkan Kuda</h2>
        <li><a href="index.php">Inpokan</a></li>
        <li><a href="kudakan.php">Kudakan</a></li>
        <li><a href="arenakan.php">Arenakan</a></li>
        <li><a href="ceritakan.php">Ceritakan</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </div>

    <div class="main-content-edit">
        <header class="kudakan1-edit">
            <a href="kudakan.php">Kembali</a>
        </header>
        <section>
            <div class="edtkuda-kontener">
            
                <h2>Edit Data Kuda</h2>
                
                <form method="POST" enctype="multipart/form-data">

                    <div class="kudaedt-grid">

                        <div class="kudaedt-kiri">
                            <label> Nama kuda:</label>
                            <input type="text" name="nama_kuda" value="<?= $data['nama_kuda']; ?>">
                            <label>Tanggal lahir:</label>
                            <input type="text" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>">
                            <label>Jenis kelamin:</label>
                            <select name="jenis_kelamin">
                                <option <?= $data['jenis_kelamin'] == 'Jantan' ? 'selected' : '' ?>>Jantan</option>
                                <option <?= $data['jenis_kelamin'] == 'Betina' ? 'selected' : '' ?>>Betina</option>
                            </select>
                            <label>Peternakan:</label>
                            <input type="text" name="peternakan" value="<?= $data['peternakan']; ?>">
                        </div>

                        <div class="kudaedt-kanan">
                            <label>Foto sebelumnya:</label>
                            <img src="../../uploads/kuda/<?= $data['foto_kuda']; ?>" class="kudaedt-foto"><br>      
                            <label>Ganti foto (opsional): </label>
                            <input type="file" name="foto_kuda">
                        </div>

                    </div>
                
                    <button type="submit" name="submit">Simpan</button>

                </form>
            </div>
        </section>
    </div>

</body>
</html>
