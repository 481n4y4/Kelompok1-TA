<?php 
include "layout/header.php"; 
require_once 'config/controller.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$pengguna = select("SELECT * FROM pengguna WHERE id = $id")[0] ?? [];

if (isset($_POST['edit'])) {
    if (update_pengguna($_POST) > 0) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                showToast('Data pengguna berhasil diubah!');
                setTimeout(function () {
                    window.location.href = 'pengguna.php?edit=berhasil';
                }, 3000);
            });
        </script>";
    } else {
        echo "<script>
            alert('Data Pengguna Gagal Diubah');
            window.location.href = 'pengguna.php';
        </script>";
    }
}
?>

<!-- Flatpickr Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-input, .form-select, .form-control {
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
                <h5 class="text-center mb-4">EDIT DATA PENGGUNA</h5>
                <form action="" method="POST">

                    <input type="hidden" name="id" value="<?= htmlspecialchars($pengguna['id'] ?? '') ?>">

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" 
                            value="<?= htmlspecialchars($pengguna['nama_lengkap'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" 
                            value="<?= htmlspecialchars($pengguna['username'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                            value="<?= htmlspecialchars($pengguna['email'] ?? '') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select class="form-select" id="level" name="level" required>
                            <option value="admin" <?= ($pengguna['level'] ?? '') === 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="user" <?= ($pengguna['level'] ?? '') === 'user' ? 'selected' : '' ?>>User</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_buat" class="form-label">Tanggal Buat</label>
                        <input type="text" id="tanggal_buat" name="tanggal_buat" 
                            class="flatpickr-input" 
                            value="<?= htmlspecialchars($pengguna['tanggal_buat'] ?? '') ?>" 
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
    flatpickr("#tanggal_buat", {
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
