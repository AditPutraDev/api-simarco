<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $status = $_POST['status_permintaan'];
        $id = $_POST['id_mr'];


        $insert = "UPDATE tbl_mr SET status_permintaan = '$status' WHERE id_mr = '$id' ";
    if (mysqli_query($connect, $insert)) {
        $response['value'] = 1;
        $response['message'] = "Berhasil diubah";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal diubah";
        echo $insert;
        echo json_encode($response);
    }
}
?>