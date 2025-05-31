<?php
require_once 'config/controller.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (delete_pengguna($id) > 0) {
        header("Location: pengguna.php?hapus=berhasil");
        exit;
    } else {
        echo "Gagal menghapus pengguna.";
    }
} else {
    echo "ID tidak ditemukan.";
}
