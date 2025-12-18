<?php
session_start();
include '../../config/koneksi.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$query_kuda = mysqli_query($conn, "SELECT COUNT(*) as total FROM kuda");
$total_kuda = mysqli_fetch_assoc($query_kuda)['total'];

$query_arena = mysqli_query($conn, "SELECT COUNT(*) as total FROM arena");
$total_arena = mysqli_fetch_assoc($query_arena)['total'];

$query_sejarah = mysqli_query($conn, "SELECT COUNT(*) as total FROM sejarah");
$total_sejarah = mysqli_fetch_assoc($query_sejarah)['total'];
?>

 <?php include 'includes-admin/admin-meta.php'; ?>
 <?php include 'includes-admin/admin-sidebar.php'; ?>


    <div class="main-content">
        <header class="inpo1">
            <h1>Welkom, <?php echo $_SESSION['username']; ?></h1>
        </header>

        <section class="inpo-cards">
            <div class="inpo-card">
                <h3>Total Kuda</h3>
                <p><?= $total_kuda ?></p>
            </div>
            <div class="inpo-card">
                <h3>Total Arena</h3>
                <p><?= $total_arena ?></p>
            </div>
            <div class="inpo-card">
                <h3>Total Sejarah</h3>
                <p><?= $total_sejarah ?></p>
            </div>
        </section>
        
        <img src="../../assets/gambar/urara-duduk.gif" class="bg-inpokan1">
    </div>
    
 <?php include 'includes-admin/admin-footer.php'; ?>