<?php
include '../koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM siswa WHERE id = $id";
$koneksi->query($query);

header('Location: index.php');
exit();
