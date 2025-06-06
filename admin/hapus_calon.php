<?php
include '../koneksi.php';

if (isset($_GET['id_calon'])) {
    $id_calon = $_GET['id_calon'];

    $sql = "DELETE FROM calon WHERE id_calon = $id_calon";
    $go = mysqli_query($koneksi, $sql);

    if($go) {
        header('Location: calon.php');
        exit;
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    include 'header.php';
    echo "ID tidak ditemukan.";
}
