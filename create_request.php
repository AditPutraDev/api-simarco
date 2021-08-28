<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $kode = $_POST['kode_cabang'];

     foreach ($kode as $key => $k) {
         print "The kode is ".$k." and email is ".$key."";
         # code...
     }
} 
?>