    <?php include 'includes/meta.php'; ?>
    <?php include 'includes/header.php'; ?>

    <?php
    include '../mengkuda/config/koneksi.php';
    $sejarah = mysqli_query($conn, "select * from sejarah order by id_sejarah desc");

    if(mysqli_num_rows($sejarah) > 0) {
    ?>

    <section class="daf-sejarah">
        <?php while($row = mysqli_fetch_assoc($sejarah)) { ?>
        <div class="daf-sejarah-1">
            <div class="daf-sejarah-2">
                <h2><?= $row['nama_sejarah'];?></h2>
                <p style="text-indent: 25px;"><?= nl2br($row['deskripsi_sejarah']);?></p>
            </div>
            <div class="daf-sejarah-img">
                <img src="uploads/sejarah/<?= $row['foto_sejarah'];?>" alt="<?= $row['nama_sejarah'];?>">
            </div>
        </div>
        <?php } ?>
    </section>

<?php 
} else {
    echo "<p style='text-align:center; padding:50px;'>Belum ada data sejarah.</p>";
}
?>

    <img src="gambar/black-maid.gif" class="bg04" />

 <?php include 'includes/footer.php'; ?>