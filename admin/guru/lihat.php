<?php
include '../koneksi.php';

// Ambil ID guru dari parameter URL
$id_guru = isset($_GET['id']) ? $_GET['id'] : die('ID Guru tidak valid.');

// Ambil data guru berdasarkan ID dari database
$query = "SELECT * FROM guru WHERE id = $id_guru";
$result = $koneksi->query($query);

// Cek apakah data guru ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die('Data guru tidak ditemukan.');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Guru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <h2>Detail Guru</h2>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2"><img style="width: 300px;" src="uploads/<?= $row['gambar'] ?>" alt="Gambar Guru">
                    </td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?= $row['nama'] ?></td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td><?= $row['nip'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $row['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td><?= $row['nomor_telepon'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $row['email'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><?= $row['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?= $row['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <th>Bidang Pengajaran</th>
                    <td><?= $row['bidang_pengajaran'] ?></td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir</th>
                    <td><?= $row['pendidikan_terakhir'] ?></td>
                </tr>
                <tr>
                    <th>Pengalaman Kerja</th>
                    <td><?= $row['pengalaman_kerja'] ?></td>
                </tr>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">Kembali</a>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>