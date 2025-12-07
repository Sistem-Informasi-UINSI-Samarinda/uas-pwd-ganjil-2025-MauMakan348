    <?php include 'includes/meta.php'; ?>
    <?php include 'includes/header.php'; ?>

    <?php
    include 'config/koneksi.php';
    $kuda = mysqli_query($conn, "SELECT * FROM kuda ORDER BY id_kuda DESC");
    ?>

<section>
    <div class="kuda-kontener">
        <?php while($row = mysqli_fetch_assoc($kuda)) { ?>
        <div class="kuda-card">
        <img src="uploads/kuda/<?= $row['foto_kuda']; ?>">
        <h3><?= $row['nama_kuda']; ?></h3>

        <p>Lahir: <?= $row['tanggal_lahir']; ?></p>
        <p>Jenis kelamin: <?= $row['jenis_kelamin']; ?></p>
        <p>Peternakan: <?= $row['peternakan']; ?></p>
        </div>
    <?php } ?>
    </div>
</section>

 <?php include 'includes/footer.php'; ?>