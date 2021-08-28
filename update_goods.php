<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $jumlah1 = $_POST['jumlah'];
		$id = $_POST['id'];

        $insert = "UPDATE tbl_barang SET jumlah='$jumlah1' WHERE id = '$id' ";
    if (mysqli_query($connect, $insert)) {
        $response['value'] = 1;
        $response['message'] = "Data berhasil diubah";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal diubah";
        echo $insert;
        echo json_encode($response);
    }
}
?>