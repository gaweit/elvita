<?php
include '../koneksi.php';

// Ambil data siswa dari database
$result = $koneksi->query("SELECT * FROM siswa WHERE id ORDER BY id DESC");
$tanggal = date("d-m-Y");

// Header laporan
echo '<html>';
echo '<head>';
echo '<title>Laporan Data Siswa</title>';
echo '<style>';
echo 'table {border-collapse: collapse; width: 100%;}';
echo 'th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}';
echo 'th {background-color: #f2f2f2;}';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<h2>Laporan Data Siswa</h2>';
echo '<p> Tanggal Cetak : ' . $tanggal . '</p>';

// Tabel untuk menampilkan data siswa
echo '<table>';
echo '<tr>';
echo '<th>Nama</th>';
echo '<th>Kelas</th>';
echo '<th>Umur</th>';
echo '<th>Gambar</th>';
echo '<th>Alamat</th>';
echo '<th>Nomor Telepon</th>';
echo '</tr>';

// Loop untuk menampilkan data siswa
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['nama'] . '</td>';
    echo '<td>' . $row['kelas'] . '</td>';
    echo '<td>' . $row['umur'] . '</td>';
    echo '<td><img src="uploads/' . $row['gambar'] . '" alt="" style="width: 100px;"></td>';
    echo '<td>' . $row['alamat'] . '</td>';
    echo '<td>' . $row['nomor_telepon'] . '</td>';
    echo '</tr>';
}

echo '</table>';

// Footer laporan
echo '</body>';
echo '<script>';
echo 'window.onload = function() { window.print(); }'; // Mencetak otomatis saat halaman dimuat
echo '</script>';
echo '</html>';
