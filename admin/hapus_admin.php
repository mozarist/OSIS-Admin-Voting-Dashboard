<?php
include '../koneksi.php';

if (isset($_GET['id_admin'])) {
    $id_admin = $_GET['id_admin'];

    $sql = "DELETE FROM admin WHERE id_admin = $id_admin";
    $go = mysqli_query($koneksi, $sql);

    if($go) {
        header('Location: admin.php');
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    include 'header.php';
    echo "Data yang dipilih tidak ditemukan.";
}
