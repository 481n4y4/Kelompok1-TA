<?php
require_once 'config/controller.php'; 

$data_anggota = select("SELECT * FROM users");

if (isset($_GET['hapus']) && $_GET['hapus'] === 'berhasil') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
            showToast('Data anggota berhasil dihapus!');
        });
    </script>";
}
?>

<?php include "layout/header.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
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
<!-- Table End -->

<!-- Toast -->
<div id="toast" class="toast">Data Anggota Berhasil dihapus!</div>

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
