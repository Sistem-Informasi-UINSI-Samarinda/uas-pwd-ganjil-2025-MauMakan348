<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_sejarah'];
    $deskripsi = $_POST['deskripsi_sejarah'];

    // Upload foto
    $file = $_FILES['foto_sejarah']['name'];
    $tmp = $_FILES['foto_sejarah']['tmp_name'];
    $folder = "../../uploads/sejarah/";

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    move_uploaded_file($tmp, $folder.$file);

    $stmt = $conn->prepare("INSERT INTO sejarah (nama_sejarah, foto_sejarah, deskripsi_sejarah) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nama, $file, $deskripsi);
    $stmt->execute();

    header("Location: sejarahkan.php");
    exit();
}
?>

<?php include 'includes-admin/admin-meta.php'; ?>
<?php include 'includes-admin/admin-sidebar.php'; ?>

<div class="main-content-edit">
    <header class="kudakan1-edit">
        <a href="sejarahkan.php">Kembali</a>
    </header>

    <section>
        <div class="edtkuda-kontener">
            <h2>Tambah Sejarah Balap</h2>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="kudaedt-grid">
                    <div class="kudaedt-kiri">
                        <label>Nama Sejarah:</label>
                        <input type="text" name="nama_sejarah" required>

                        <label>Deskripsi Sejarah:</label>
                        <textarea name="deskripsi_sejarah" rows="8" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
                    </div>

                    <div class="kudaedt-kanan">
                        <label>Preview Foto:</label>
                        <img id="previewImage" class="kudaedt-foto"><br>

                        <label>Upload Foto Sejarah:</label>
                        <input type="file" name="foto_sejarah" id="fotoInput" accept="image/*" required>
                    </div>
                </div>
                
                <button type="submit" name="submit">Simpan</button>
            </form>
        </div>
    </section>

    <script>
        document.getElementById('fotoInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('previewImage');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    </script>
</div>

<?php include 'includes-admin/admin-footer.php'; ?>