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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin mengKuda</title>
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

        <section class="body-tmbhkuda">
            <form method="POST" enctype="multipart/form-data" class="tmbhkuda_kontainer">
               <h2>Tambahkan Data Kuda</h2>
                <div class="tmbhkuda_grup">
                    <label>Nama kuda: </label>
                    <input type="text" name="nama_kuda">
                </div>
                <div class="tmbhkuda_grup">
                   <label>Tanggal lahir: </label>
                    <input type="text" name="tanggal_lahir">
                </div>
                <div class="tmbhkuda_grup">
                    <label>Jenis kelamin: </label>
                    <select name="jenis_kelamin">
                        <option value="Jantan">Jantan</option>
                        <option value="Betina">Betina</option>
                    </select>
                </div>
                <div class="tmbhkuda_grup">
                    <label>Peternakan: </label>
                    <input type="text" name="peternakan">
                </div>
                <div class="tmbhkuda_grup">
                    <label>Foto: </label>
                    <input type="file" name="foto_kuda">
                </div> <br>

                <button type="submit" name="submit" class="btn-kuda1">Simpan</button>
            </form>
        </section>
        
        <div class="bgtmbhkuda">
            <img src="../../assets/gambar/doto-music.gif" style="transform: scaleX(-1);">
            <img src="../../assets/gambar/opera-music.gif">
        </div>

    </div>
    
</body>
</html>




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Kuda</title>
    <link rel="stylesheet" href="../../assets/css/adminstyle.css">
</head>
<body class="tmbhkuda_body">

<form method="POST" enctype="multipart/form-data" class="tmbhkuda_kontainer">
    <h2>Tambahkan Data Kuda</h2>
    <div class="tmbhkuda_grup">
        <label>Nama kuda: </label>
        <input type="text" name="nama_kuda">
    </div>
    <div class="tmbhkuda_grup">
        <label>Tanggal lahir: </label>
        <input type="text" name="tanggal_lahir">
    </div>
    <div class="tmbhkuda_grup">
        <label>Jenis kelamin: </label>
        <select name="jenis_kelamin">
            <option value="Jantan">Jantan</option>
            <option value="Betina">Betina</option>
        </select>
    </div>
    <div class="tmbhkuda_grup">
        <label>Peternakan: </label>
        <input type="text" name="peternakan">
    </div>
    <div class="tmbhkuda_grup">
        <label>Foto: </label>
        <input type="file" name="foto_kuda">
    </div> <br>

    <button type="submit" name="submit" class="btn-kuda1">Simpan</button>
    <a href="kudakan.php" class="btn-kuda2">kembali</a>
</form>

<img src="../../assets/gambar/urara-duduk.gif" class="tmbhkuda-bg">
    
</body>
</html> -->