<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $response = array();
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        // langkah 2
        $cek = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_fetch_array(mysqli_query($connect, $cek));
    if (isset($result)) {
        $response['value'] = 2;
        $response['message'] = "username has been used";
        echo json_encode($response);
    } else {
        $insert = "INSERT INTO users VALUE(NULL,
        '$username','$full_name','$email', '$phone','$password', NOW(), 'NULL','$role','NULL')";
        if (mysqli_query($connect, $insert)) {
            $response['value'] = 1;
            $response['message'] = "Registered successfully";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Gagal didaftarkan";
            echo json_encode($response);
        }
    }
}
?>
