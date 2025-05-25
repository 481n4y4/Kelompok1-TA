<?php
require_once 'config/controller.php'; 

$data_barang = select("SELECT * FROM produk");

?>

<?php include "layout/header.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </style> 
    <!-- Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
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
                                        <button type="button" class="btn-delete">
                                            Hapus
                                        </button>
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

<?php include "layout/footer.php"; ?>
