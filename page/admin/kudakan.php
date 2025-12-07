<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$kuda = mysqli_query($conn, "SELECT * FROM kuda ORDER BY id_kuda DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Mengkuda</title>
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

    <div class="main-content">
        <header class="kudakan1">
            <a href="kuda_tambah.php">+ Tambahkan Kuda</a>
        </header>
        <section>
            <div>
                <table class="tabel-kuda">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Peternakan</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($kuda)){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_kuda']; ?></td>
                        <td><img src="../../uploads/kuda/<?= $row['foto_kuda']; ?>" width="80"></td>
                        <td><?= $row['peternakan']; ?></td>
                        <td>
                            <a href="kuda_edit.php?id=<?= $row['id_kuda'];?>">Edit</a> |
                            <a href="kuda_hapus.php?id=<?= $row['id_kuda'];?>" onclick="return confirm('Hapus nih?')">Hapus</a>
                        </td>
                    </tr>

                    <?php } ?>
                </table>
            </div>
        </section>
    </div>
    
</body>
</html>