<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $idCbg = $_POST['id_cabang'];
        $kodeCbg = $_POST['kode_cabang'];
        $idBrg = $_POST['id_barang'];
        $namaBrg = $_POST['nama_barang'];
        $jumlah = $_POST['jumlah_stok'];
        $stokIn = $_POST['stok_masuk'];
        $stokOut = $_POST['stok_keluar'];
        $dateIn = $_POST['tgl_masuk'];
        $dateOut = $_POST['tgl_keluar'];

        $insert = "INSERT INTO tbl_stok VALUE(NULL,'$idCbg','$kodeCbg','$idBrg','$namaBrg','$jumlah','$stokIn','$stokOut','$dateIn','$dateOut')";
    if (mysqli_query($connect, $insert)) {
        $response['value'] = 1;
        $response['message'] = "Berhasil";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal";
        echo $insert;
        echo json_encode($response);
    }
}
?>