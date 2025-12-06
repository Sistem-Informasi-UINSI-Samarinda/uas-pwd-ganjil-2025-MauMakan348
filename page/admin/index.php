<?php
session_start();
include '../../config/koneksi.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Mengkuda</title>
    <link rel="stylesheet" href="../../assets/css/adminstyle.css">
</head>
<body>
    <div class="sidebar">
        <h2>Adminkan Kuda</h2>
        <li><a href="index.php">Inpokan</a></li>
        <li><a href="kudakan.php">Kudakan</a></li>
        <li><a href="arenakan.php">Arenakan</a></li>
        <li><a href="ceritakan.php">Ceritakan</a></li>
        <li><a href="logout.php" class="logout">Logout</a></li>
    </div>

    <div class="main-content">
        <header class="inpo1">
            <h1>Welkom, <?php echo $_SESSION['username']; ?></h1>
        </header>
        <section></section>
    </div>
    
</body>
</html>