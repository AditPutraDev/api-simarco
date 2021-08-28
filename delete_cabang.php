<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $id = $_POST['id_cabang'];

        $insert = "DELETE FROM tbl_cabang WHERE id_cabang = '$id'";
    if (mysqli_query($connect, $insert)) {
        $response['value'] = 1;
        $response['message'] = "Berhasil dihapus";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal dihapus";
        echo $insert;
        echo json_encode($response);
    }
}
?>