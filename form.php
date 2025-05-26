<?php
require_once 'config/controller.php';

if (isset($_POST['tambah'])) {
    if (tambahProduk($_POST)) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    showToast('Data berhasil ditambahkan!');
                    setTimeout(() => {
                        window.location.href = 'table.php';
                    }, 3000);
                });
              </script>";
    } else {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    showToast('Gagal menambahkan data.');
                });
              </script>";
    }
}

include "layout/header.php";
?>

<!-- Toast CSS -->
<style>
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

    input[type="text"],
    input[type="number"],
    input[type="date"] {
        background-color: #1e1e2f; /* warna gelap, bisa disesuaikan */
        color: #fff;
        border: 1px solid #444;
        border-radius: 6px;
    }

    /* Saat fokus tetap gelap */
    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="date"]:focus {
        background-color: #2a2a3d; /* sedikit lebih terang buat efek fokus */
        color: #fff;
        border: 1px solid #666;
        outline: none;
    }

    /* Valid / Invalid tetap gelap juga */
    input:valid,
    input:invalid {
        background-color: #1e1e2f;
        color: #fff;
    }

</style>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Tambah Barang</h6>
                <form action="" method="POST">

                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Toast HTML -->
<div id="toast" class="toast">Data berhasil ditambahkan!</div>

<!-- Toast JS -->
<script>
function showToast(message) {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.classList.add("show");

    setTimeout(() => {
        toast.classList.remove("show");
    }, 2500);
}
</script>

<?php include "layout/footer.php"; ?>
