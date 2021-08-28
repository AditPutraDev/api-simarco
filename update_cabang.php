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
        $id = $_POST['id_cabang'];

        $insert = "UPDATE tbl_cabang SET kode_cabang = '$kd',nama_bandara='$nb', nama_kontrak = '$nk', nilai_kontrak = '$nilaik', periode = '$periode', awal_kontrak = '$awal', berakhir_kontrak = '$berakhir' WHERE id_cabang = '$id' ";
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