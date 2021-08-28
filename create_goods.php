<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $id = $_POST['id_barang'];
        $nama1 = $_POST['nama'];
        $kategori1 = $_POST['kategori'];
        $harga1 = $_POST['harga'];
        $jumlah1 = $_POST['jumlah'];
        $satuan1 = $_POST['satuan'];

        $insert = "INSERT INTO tbl_barang VALUE(NULL,'$id','$nama1','$kategori1','$harga1','$jumlah1','$satuan1')";
    if (mysqli_query($connect, $insert)) {
        $response['value'] = 1;
        $response['message'] = "Data berhasil ditambahkan";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal tambah data";
        echo $insert;
        echo json_encode($response);
    }
}
?>