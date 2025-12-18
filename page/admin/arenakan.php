<?php
session_start();
include '../../config/koneksi.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$arena = mysqli_query($conn, "select * from arena order by id_arena desc");
?>

 <?php include 'includes-admin/admin-meta.php'; ?>
 <?php include 'includes-admin/admin-sidebar.php'; ?>


    <div class="main-content">
        <header class="kudakan1">
            <a href="arena_tambah.php">+ Tambahkan Arena</a>
        </header>
        <section>
            <div>
                <table class="tabel-kuda">
                    <tr>
                        <th>No</th>
                        <th>Nama Arena</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($arena)){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_arena']; ?></td>
                        <td><img src="../../uploads/arena/<?= $row['foto_arena']; ?>" width="80"></td>
                        <td style="max-width: 360px;" ><?= substr($row['deskripsi_arena'], 0, 100); ?>...</td>
                        <td>
                            <a href="arena_edit.php?id=<?= $row['id_arena'];?>">Edit</a> |
                            <a href="arena_hapus.php?id=<?= $row['id_arena'];?>" onclick="return confirm('hapus arena ini?')">Hapus</a> 
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
    </div>
    
 <?php include 'includes-admin/admin-footer.php'; ?>