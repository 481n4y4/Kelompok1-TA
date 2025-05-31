<?php
include "layout/header.php"
?>

<?php
require_once 'config/controller.php'; 

$data_barang = select("SELECT * FROM produk");
$data_anggota = select("SELECT * FROM users"); // Tambahan
$data_pengguna = select("SELECT * FROM pengguna"); // Tambahan


if (isset($_GET['hapus']) && $_GET['hapus'] === 'berhasil') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            showToast('Data barang berhasil dihapus!');
        });
    </script>";
}
?>

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

<!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
          <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-secondary text-center rounded p-4">
                <div
                  class="d-flex align-items-center justify-content-between mb-4"
                >
                  <h6 class="mb-0">Grafik Penjualan</h6>
                  <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="h-100 bg-secondary rounded p-4">
                <div
                  class="d-flex align-items-center justify-content-between mb-4"
                >
                  <h6 class="mb-0">Calender</h6>
                  <a href="">Show All</a>
                </div>
                <div id="calender"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sales Chart End -->

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

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="text-center text-white">DAFTAR ANGGOTA</h6>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-white">   
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password (Encrypted)</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_anggota as $anggota) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($anggota['username']); ?></td>
                                    <td><?= htmlspecialchars($anggota['password']); ?></td>
                                    <td width="5%" class="text-center">
                                        <a href="hapus-anggota.php?id=<?= $anggota['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus anggota ini?')">
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

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="text-center">DAFTAR PENGGUNA</h6>
                
                <div class="table-responsive">
                    <table class="table">   
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nama Lengkap</th>
                                <th>Role</th>
                                <th>Terdaftar Sejak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_pengguna as $pengguna) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $pengguna['username']; ?></td>
                                    <td><?= $pengguna['email']; ?></td>
                                    <td><?= $pengguna['nama_lengkap']; ?></td>
                                    <td><?= $pengguna['role']; ?></td>
                                    <td><?= $pengguna['created_at']; ?></td>
                                    <td class="text-center">
                                        <a href="edit-pengguna.php?id=<?= $pengguna['id']; ?>" class="btn btn-edit">Edit</a>
                                        <a href="hapus-pengguna.php?id=<?= $pengguna['id']; ?>" class="btn btn-danger">Hapus</a>
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

        

        
<?php
include "layout/footer.php"
?>