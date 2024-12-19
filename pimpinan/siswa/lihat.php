<?php
include '../koneksi.php';

// Ambil ID siswa dari parameter URL
$id_siswa = isset($_GET['id']) ? $_GET['id'] : die('ID Siswa tidak valid.');

// Ambil data siswa berdasarkan ID dari database
$query = "SELECT * FROM siswa WHERE id = $id_siswa";
$result = $koneksi->query($query);

// Cek apakah data siswa ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die('Data siswa tidak ditemukan.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Detail Siswa</h2>
        <table class="table table-bordered">
            <tr>
                <td colspan="2"><img style="width: 300px;" src="uploads/<?= $row['gambar'] ?>" alt="Gambar Siswa"></td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td><?= $row['nama'] ?></td>
            </tr>
            <tr>
                <td><strong>Kelas</strong></td>
                <td><?= $row['kelas'] ?></td>
            </tr>
            <tr>
                <td><strong>Umur</strong></td>
                <td><?= $row['umur'] ?></td>
            </tr>
            <tr>
                <td><strong>Alamat</strong></td>
                <td><?= $row['alamat'] ?></td>
            </tr>
            <tr>
                <td><strong>Nomor Telepon</strong></td>
                <td><?= $row['nomor_telepon'] ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td><?= $row['email'] ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal Lahir</strong></td>
                <td><?= $row['tanggal_lahir'] ?></td>
            </tr>
            <tr>
                <td><strong>Jenis Kelamin</strong></td>
                <td><?= $row['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td><strong>Hobi</strong></td>
                <td><?= $row['hobi'] ?></td>
            </tr>
            <tr>
                <td><strong>Kewarganegaraan</strong></td>
                <td><?= $row['kewarganegaraan'] ?></td>
            </tr>
            <tr>
                <td><strong>Agama</strong></td>
                <td><?= $row['agama'] ?></td>
            </tr>
        </table>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>