<?php
session_start();
include '../../config/koneksi.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$sejarah = mysqli_query($conn, "select * from sejarah order by id_sejarah desc");
?>

<?php include 'includes-admin/admin-meta.php'; ?>
<?php include 'includes-admin/admin-sidebar.php'; ?>


    <div class="main-content">
        <header class="kudakan1">
            <a href="sejarah_tambah.php">+ Tambahkan Sejarah</a>
        </header>
        <section>
            <div>
                <table class="tabel-kuda">
                    <tr>
                        <th>No</th>
                        <th>Nama Sejarah</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($sejarah)){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_sejarah']; ?></td>
                        <td><img src="../../uploads/sejarah/<?= $row['foto_sejarah']; ?>" width="80"></td>
                        <td style="max-width: 360px;" ><?= substr($row['deskripsi_sejarah'], 0, 100); ?>...</td>
                        <td>
                            <a href="sejarah_edit.php?id=<?= $row['id_sejarah'];?>">Edit</a> |
                            <a href="sejarah_hapus.php?id=<?= $row['id_sejarah'];?>" onclick="return confirm('hapus sejarah ini?')">Hapus</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
    </div>
    
 <?php include 'includes-admin/admin-footer.php'; ?>