<?php
include '../koneksi.php';

$id = $_GET['id'];
$result = $koneksi->query("SELECT * FROM siswa WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $umur = $_POST['umur'];

    // Kolom-kolom baru
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    $nomor_telepon = isset($_POST['nomor_telepon']) ? $_POST['nomor_telepon'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : '';
    $kewarganegaraan = isset($_POST['kewarganegaraan']) ? $_POST['kewarganegaraan'] : '';
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '';

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $path = 'uploads/';

    // Pindahkan gambar ke folder uploads jika ada file yang diunggah
    if (!empty($gambar)) {
        move_uploaded_file($tmp_name, $path . $gambar);
    } else {
        // Jika tidak ada file yang diunggah, gunakan gambar yang sudah ada
        $gambar = $row['gambar'];
    }

    $query = "UPDATE siswa SET 
              nama='$nama', 
              kelas='$kelas', 
              umur=$umur, 
              alamat='$alamat', 
              nomor_telepon='$nomor_telepon', 
              email='$email', 
              tanggal_lahir='$tanggal_lahir', 
              jenis_kelamin='$jenis_kelamin',  
              hobi='$hobi', 
              kewarganegaraan='$kewarganegaraan', 
              agama='$agama', 
              gambar='$gambar'
              WHERE id=$id";

    $koneksi->query($query);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Siswa</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas:</label>
                <input type="text" name="kelas" value="<?= $row['kelas'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur:</label>
                <input type="number" name="umur" value="<?= $row['umur'] ?>" class="form-control" required>
            </div>
            <!-- Kolom-kolom baru -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                <input type="text" name="nomor_telepon" value="<?= $row['nomor_telepon'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" value="<?= $row['email'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki" <?= ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki
                    </option>
                    <option value="Perempuan" <?= ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="hobi" class="form-label">Hobi:</label>
                <input type="text" name="hobi" value="<?= $row['hobi'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kewarganegaraan" class="form-label">Kewarganegaraan:</label>
                <input type="text" name="kewarganegaraan" value="<?= $row['kewarganegaraan'] ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama:</label>
                <input type="text" name="agama" value="<?= $row['agama'] ?>" class="form-control">
            </div>
            <!-- Upload Gambar -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar:</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
            <!-- Tampilkan gambar saat ini -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar saat ini:</label><br>
                <img src="uploads/<?= $row['gambar'] ?>" alt="" style="width: 200px;">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-danger">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>