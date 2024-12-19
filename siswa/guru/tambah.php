<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $bidang_pengajaran = $_POST['bidang_pengajaran'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $path = 'uploads/';  // Folder tempat menyimpan gambar

    // Pindahkan gambar ke folder uploads
    move_uploaded_file($tmp_name, $path . $gambar);

    // Simpan data guru beserta nama file gambar
    $query = "INSERT INTO guru (nama, nip, alamat, nomor_telepon, email, tanggal_lahir, jenis_kelamin, bidang_pengajaran, pendidikan_terakhir, pengalaman_kerja, gambar) 
              VALUES ('$nama', '$nip', '$alamat', '$nomor_telepon', '$email', '$tanggal_lahir', '$jenis_kelamin', '$bidang_pengajaran', '$pendidikan_terakhir', '$pengalaman_kerja', '$gambar')";
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
    <title>Tambah Guru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h2>Tambah Guru</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP:</label>
                <input type="text" name="nip" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                <input type="text" name="nomor_telepon" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bidang_pengajaran" class="form-label">Bidang Pengajaran:</label>
                <input type="text" name="bidang_pengajaran" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir:</label>
                <input type="text" name="pendidikan_terakhir" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja:</label>
                <textarea name="pengalaman_kerja" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar:</label>
                <input type="file" name="gambar" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-danger">Back</a>
        </form>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>