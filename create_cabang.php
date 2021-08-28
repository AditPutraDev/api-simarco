<?php
    require "conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $response = array();
        $kd = $_POST['kode_cabang'];
        $nb = $_POST['nama_bandara'];
        $nk = $_POST['nama_kontrak'];
        $nilaik = $_POST['nilai_kontrak'];
        $periode = $_POST['periode'];
        $awal = $_POST['awal_kontrak'];
        $berakhir = $_POST['berakhir_kontrak'];

        $insert = "INSERT INTO tbl_cabang VALUE(NULL,'$kd','$nb','$nk','$nilaik','$periode','$awal','$berakhir')";
    if (mysqli_query($connect, $insert)) {
        $response['value'] = 1;
        $response['message'] = "Berhasil";
        echo json_encode($response);
    } else {
        $response['value'] = 0;
        $response['message'] = "Gagal tambah data";
        echo $insert;
        echo json_encode($response);
    }
}
?>