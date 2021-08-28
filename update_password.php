<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $password = md5($_POST['password']);
        $id = $_POST['user_id'];


        $insert = "UPDATE users SET password = '$password' WHERE user_id = '$id' ";
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