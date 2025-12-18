<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id']; 
$sejarah = mysqli_query($conn, "select * from sejarah where id_sejarah='$id'");
$data = mysqli_fetch_assoc($sejarah);

if (isset($_POST['submit'])){
    $nama = $_POST['nama_sejarah'];
    $deskripsi = $_POST['deskripsi_sejarah'];
    $foto_lama =$_POST['foto_lama'];

    if($_FILES['foto_sejarah']['name'] != ''){
        $file = $_FILES['foto_sejarah']['name'];
        $tmp = $_FILES['foto_sejarah']['tmp_name'];
        $folder = "../../uploads/sejarah/";

        if (file_exists($folder.$foto_lama)){
            unlink($folder.$foto_lama);
        }

        move_uploaded_file($tmp, $folder.$file);

        $stmt = $conn->prepare("update sejarah set nama_sejarah=?, foto_sejarah=?, deskripsi_sejarah=? where id_sejarah=?");
        $stmt->bind_param("sssi", $nama, $file, $deskripsi, $id);
    }else{
        $stmt = $conn->prepare("update sejarah set nama_sejarah=?, deskripsi_sejarah=? where id_sejarah=?");
        $stmt->bind_param("ssi", $nama, $deskripsi, $id);
    }

    $stmt->execute();
    header("location: sejarahkan.php");
    exit();
}

?>

<?php include 'includes-admin/admin-meta.php'; ?>
<?php include 'includes-admin/admin-sidebar.php'; ?>

<div class="main-content-edit">
    <header class="kudakan1-edit">
        <a href="sejarahkan.php">Kembali</a>
    </header>

            <div class="edtkuda-kontener">
            
                <h2>Edit Sejarah Balap</h2>
                
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="foto_lama" value="<? = $data['foto_sejarah']; ?>">

                    <div class="kudaedt-grid">

                        <div class="kudaedt-kiri">
                            <label> Nama Sejarah:</label>
                            <input type="text" name="nama_sejarah" value="<?= $data['nama_sejarah']; ?>" required>
                            <label>Deskripsi Sejarah:</label>
                            <textarea name="deskripsi_sejarah" rows="8" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?= $data['deskripsi_sejarah']; ?></textarea>
                        </div>

                        <div class="kudaedt-kanan">
                            <label>Foto sebelumnya:</label>
                            <img id="previewImage" src="../../uploads/sejarah/<?= $data['foto_sejarah']; ?>" class="kudaedt-foto" style="display: block;"><br>     
                            <label>Ganti foto (opsional): </label>
                            <input type="file" name="foto_sejarah" id="fotoInput" accept="image/*">
                        </div>

                    </div>
                
                    <button type="submit" name="submit">Simpan</button>

                </form>
            </div>
        </section>

        <script>
            document.getElementById('fotoInput').addEventListener('change' , function(e){
                const file = e.target.files[0];
                const preview = document.getElementById('previewImage');

                if(file){
                    preview.src = URL.createObjectURL(file);
                    preview.style.display = 'block';
                }
            })
        </script>

</div>

<?php include 'includes-admin/admin-footer.php'; ?>