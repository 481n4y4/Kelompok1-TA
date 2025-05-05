<?php
include 'database.php';

function select($query)
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows; // Kembalikan array, bukan result object
}

$data_barang = select("SELECT * FROM barang");
?>

<?php include "layout/header.php"; ?>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Responsive Table</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_barang as $barang) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $barang['nama']; ?></td>
                                    <td><?= $barang['jumlah']; ?></td>
                                    <td><?= $barang['harga']; ?></td>
                                    <td><?= $barang['tanggal']; ?></td>
                                    <td width="15%" class="text-center">
                                        <button type="button" class="btn btn-success">Edit</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
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
