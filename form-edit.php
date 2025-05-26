<?php 
include "layout/header.php"; 

$id_barang = (int)$_GET['id_barang'];
$produk = select("SELECT * FROM produk WHERE id_barang = $id_barang")[0];

if (isset($_POST['edit'])) {
    if (update_barang($_POST) > 0) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                showToast('Data barang berhasil diubah!');
                setTimeout(function () {
                    window.location.href = 'table.php?edit=berhasil';
                }, 3000);
            });
        </script>";
    } else {
        echo "<script>
            alert('Data Barang Gagal Diubah');
            window.location.href = 'table.php';
        </script>";
    }
}
?>

<!-- Flatpickr Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-input {
        background-color: #000; 
        color: #fff; 
        border: 1px solid #6c757d; 
        border-radius: 0.375rem;
        padding: 0.375rem 0.75rem;
        width: 100%;
    }

    .flatpickr-calendar {
        z-index: 9999;
    }

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

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h5 class="text-center mb-4">EDIT DATA BARANG</h5>
                <form action="" method="POST">
                    
                    <input type="hidden" name="id_barang" value="<?= $produk['id_barang']; ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" name="nama" 
                            value="<?= $produk['nama']; ?>" placeholder="Nama barang..." required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" 
                            value="<?= $produk['kategori']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" 
                            value="<?= $produk['stok']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" 
                            value="<?= $produk['harga_jual']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" 
                            value="<?= $produk['harga_beli']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control" id="supplier" name="supplier" 
                            value="<?= $produk['supplier']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="text" id="tgl_masuk" name="tgl_masuk" 
                            class="flatpickr-input" 
                            value="<?= $produk['tgl_masuk']; ?>" 
                            placeholder="Pilih tanggal & waktu" required>
                    </div>

                    <button type="submit" name="edit" class="btn btn-danger">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Flatpickr Script -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#tgl_masuk", {
        enableTime: true,
        dateFormat: "Y-m-d H:i:S",
        time_24hr: true
    });
</script>

<!-- Toast Notification -->
<div id="toast" class="toast"></div>

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
