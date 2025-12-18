<?php
session_start();
include '../../config/koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id']; 
$arena = mysqli_query($conn, "select * from arena where id_arena='$id'");
$data = mysqli_fetch_assoc($arena);

if (isset($_POST['submit'])){
    $nama = $_POST['nama_arena'];
    $deskripsi = $_POST['deskripsi_arena'];
    $foto_lama =$_POST['foto_lama'];

    if($_FILES['foto_arena']['name'] != ''){
        $file = $_FILES['foto_arena']['name'];
        $tmp = $_FILES['foto_arena']['tmp_name'];
        $folder = "../../uploads/arena/";

        if (file_exists($folder.$foto_lama)){
            unlink($folder.$foto_lama);
        }

        move_uploaded_file($tmp, $folder.$file);

        $stmt = $conn->prepare("update arena set nama_arena=?, foto_arena=?, deskripsi_arena=? where id_arena=?");
        $stmt->bind_param("sssi", $nama, $file, $deskripsi, $id);
    }else{
        $stmt = $conn->prepare("update arena set nama_arena=?, deskripsi_arena=? where id_arena=?");
        $stmt->bind_param("ssi", $nama, $deskripsi, $id);
    }

    $stmt->execute();
    header("location: arenakan.php");
    exit();
}

?>

<?php include 'includes-admin/admin-meta.php'; ?>
<?php include 'includes-admin/admin-sidebar.php'; ?>

<div class="main-content-edit">
    <header class="kudakan1-edit">
        <a href="arenakan.php">Kembali</a>
    </header>

        <section>
            <div class="edtkuda-kontener">
            
                <h2>Edit Arena Balap</h2>
                
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="foto_lama" value="<? = $data['foto_arena']; ?>">

                    <div class="kudaedt-grid">

                        <div class="kudaedt-kiri">
                            <label> Nama Arena:</label>
                            <input type="text" name="nama_arena" value="<?= $data['nama_arena']; ?>" required>
                            <label>Deskripsi Arena:</label>
                            <textarea name="deskripsi_arena" rows="8" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"><?= $data['deskripsi_arena']; ?></textarea>
                        </div>

                        <div class="kudaedt-kanan">
                            <label>Foto sebelumnya:</label>
                            <img id="previewImage" src="../../uploads/arena/<?= $data['foto_arena']; ?>" class="kudaedt-foto" style="display: block;"><br>     
                            <label>Ganti foto (opsional): </label>
                            <input type="file" name="foto_arena" id="fotoInput" accept="image/*">
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