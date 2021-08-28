<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // langkah 2
        $cek = "SELECT * FROM users WHERE email='$email' and password='$password'";
        $result = mysqli_fetch_array(mysqli_query($connect, $cek));
    if (isset($result)) {
        $response['value'] = 1;
        $response['message'] = "Successfully sign in";
        $response['username'] = $result['username'];
        $response['nama'] = $result['full_name'];
        $response['password'] = $result['password'];
        $response['role'] = $result['role'];
        $response['email'] = $result['email'];
        $response['phone'] = $result['phone'];
        $response['jabatan'] = $result['jabatan'];


        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Sign in failed, Please check you email or password";
        echo json_encode($response);
    }
}
?>