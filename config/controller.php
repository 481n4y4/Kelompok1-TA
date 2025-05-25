<?php

require_once 'database.php';

function select($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function update_barang($post)
{
    global $db;

    $id_barang  = mysqli_real_escape_string($db, $post['id_barang']);
    $nama       = mysqli_real_escape_string($db, $post['nama']);
    $kategori   = mysqli_real_escape_string($db, $post['kategori']);
    $stok       = mysqli_real_escape_string($db, $post['stok']);
    $harga_beli = mysqli_real_escape_string($db, $post['harga_beli']);
    $harga_jual = mysqli_real_escape_string($db, $post['harga_jual']);
    $supplier   = mysqli_real_escape_string($db, $post['supplier']);
    $tgl_masuk  = mysqli_real_escape_string($db, $post['tgl_masuk']);

    $query = "UPDATE produk SET 
                nama = '$nama', 
                kategori = '$kategori', 
                stok = '$stok', 
                harga_beli = '$harga_beli', 
                harga_jual = '$harga_jual', 
                supplier = '$supplier', 
                tgl_masuk = '$tgl_masuk' 
              WHERE id_barang = '$id_barang'";

    mysqli_query($db, $query);

    if (mysqli_error($db)) {
        echo "Query Error: " . mysqli_error($db);
    }

    return mysqli_affected_rows($db);
}

function tambahProduk($post)
{
    global $db;

    $nama       = mysqli_real_escape_string($db, $post['nama_produk']);
    $kategori   = mysqli_real_escape_string($db, $post['kategori']);
    $stok       = (int)$post['stok'];
    $harga_beli = (int)$post['harga_beli'];
    $harga_jual = (int)$post['harga_jual'];
    $supplier   = mysqli_real_escape_string($db, $post['supplier']);
    $tgl_masuk  = mysqli_real_escape_string($db, $post['tanggal_masuk']);

    $query = "INSERT INTO produk (nama, kategori, stok, harga_beli, harga_jual, supplier, tgl_masuk) 
              VALUES ('$nama', '$kategori', $stok, $harga_beli, $harga_jual, '$supplier', '$tgl_masuk')";

    mysqli_query($db, $query);

    if (mysqli_error($db)) {
        echo "Query Error: " . mysqli_error($db);
    }

    return mysqli_affected_rows($db);
}

?>
