    <?php include 'includes/meta.php'; ?>
    <?php include 'includes/header.php'; ?>

    <?php
    include '../mengkuda/config/koneksi.php';
    $arena = mysqli_query($conn, "select * from arena order by id_arena desc");

    if(mysqli_num_rows($arena) > 0) {
    ?>

    <section class="daf-arena">
        <?php while($row = mysqli_fetch_assoc($arena)) { ?>
        <div class="daf-arena-1">
            <div class="daf-arena-card">
                <img src="uploads/arena/<?= $row['foto_arena'];?>" alt="<?= $row['nama_arena'];?>">
            </div>
            <h2><?= $row['nama_arena'];?></h2>
            <p><?= $row['deskripsi_arena'];?></p>
        </div>
        <?php } ?>
    </section>

<?php 
} else {
    echo "<p style='text-align:center; padding:50px;'>Belum ada data arena.</p>";
}
?>

    <section>
      <img src="gambar/james-doakes.gif" class="decor03" />
      <img src="gambar/waduh-kumala.gif" class="decor04" />
      <img src="gambar/horse-ok.gif" class="decor05" />
    </section>

 <?php include 'includes/footer.php'; ?>