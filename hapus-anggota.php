<?php
require_once 'config/app.php';           // memuat koneksi + controller hanya sekali
// tidak perlu require controller.php lagi jika sudah dimuat di app.php

// menerima id barang yang dipilih pengguna
$id = (int) $_GET['id'];

if (delete_users($id) > 0) {
    echo "<script>
            alert('Anggota Berhasil Dihapus');
            document.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Anggota Gagal Dihapus');
            document.location.href = 'index.php';
          </script>";
}
?>
