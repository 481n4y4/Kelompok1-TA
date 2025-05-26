<?php
require_once 'config/controller.php'; 

$data_barang = select("SELECT * FROM produk");

if (isset($_GET['hapus']) && $_GET['hapus'] === 'berhasil') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            showToast('Data barang berhasil dihapus!');
        });
    </script>";
}
?>

<?php include "layout/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">

    <style>
        /* Toast Notifikasi */
        .toast {
            visibility: hidden;
            min-width: 300px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 10px;
            padding: 16px 24px;
            position: fixed;
            z-index: 9999;
            left: 50%;
            top: 30px;
            transform: translateX(-50%);
            font-size: 16px;
            opacity: 0;
            transition: opacity 0.5s ease, visibility 0.5s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .toast.show {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="text-center">DATA BARANG</h6>
                
                <div class="table-responsive">
                    <table class="table">   
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Tanggal Masuk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_barang as $produk) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $produk['nama']; ?></td>
                                    <td><?= $produk['kategori']; ?></td>
                                    <td><?= $produk['stok']; ?></td>
                                    <td><?= $produk['harga_beli']; ?></td>
                                    <td><?= $produk['harga_jual']; ?></td>
                                    <td><?= $produk['supplier']; ?></td>
                                    <td><?= $produk['tgl_masuk']; ?></td>
                                    <td width="15%" class="text-center">
                                        <a href="form-edit.php?id_barang=<?= $produk['id_barang']; ?>" class="btn btn-edit">
                                            Edit
                                        </a>
                                        <a href="hapus-barang.php?id_barang=<?= $produk['id_barang']; ?>" class="btn btn-danger">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Table End -->

<!-- Toast -->
<div id="toast" class="toast">Data barang berhasil dihapus!</div>

<script>
function showToast(message) {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.classList.add("show");

    setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}
</script>

<?php include "layout/footer.php"; ?>
