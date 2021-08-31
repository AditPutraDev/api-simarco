<?php
    require "conn.php";
    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inputJSON = file_get_contents('php://input'); $input = json_decode($inputJSON, TRUE);
            $response = array();
            $kode_cabang = $input['kode_cabang'];
            $nilai_kontrak = $input['user_id'];
            $jumlah_barang = $input['jumlah_barang'];
            $total_jumlah = $input['total_jumlah'];
            $tgl_permintaan = $input['tgl_permintaan'];
            $periode_mr = $input['periode_mr'];
            $status_permintaan = $input['status_permintaan'];
            // $db->beginTransaction();
            mysqli_autocommit($connect, TRUE);
            mysqli_begin_transaction($connect);
            $insertmr = "INSERT INTO tbl_mr 
                                (kode_cabang, 
                                user_id, 
                                jumlah_barang,
                                total_jumlah,
                                tgl_permintaan,
                                periode_mr, 
                                status_permintaan) 
                                VALUES ('$kode_cabang','$nilai_kontrak','$jumlah_barang','$total_jumlah','$tgl_permintaan','$periode_mr','$status_permintaan')";
            // $insert = "INSERT INTO tbl_barang VALUE(NULL,'$id','$nama1','$kategori1','$harga1','$jumlah1','$satuan1')";
            $excutemr = mysqli_query($connect, $insertmr);
            $idMR =  mysqli_insert_id($connect);
            if( isset($input['barang'])){
                if (count($input['barang']) > 0){
                    foreach ($input['barang'] as $item) {
                        $insertreq = "INSERT INTO tbl_request (
                                                id_mr, 
                                                nama_barang, 
                                                harga_satuan, 
                                                qty, 
                                                jumlah) VALUES (
                                                $idMR, 
                                                '".$item['nama_barang']."', 
                                                '".$item['harga_satuan']."', 
                                                '".$item['qty']."', 
                                                '".$item['jumlah']."')";
                        $excutemr = mysqli_query($connect, $insertreq);
                        if (!$excutemr){
                            $response['value'] = 0;
                            $response['message'] = "Gagal tambah data";
                            mysqli_rollback($connect);
                            mysqli_close($connect);
                            echo json_encode($response);
                            exit();
                        }
                    }
                }
            }
            if (!mysqli_commit($connect)) {
                // echo "Commit transaction failed";
                $response['value'] = 0;
                $response['message'] = "Gagal tambah data";
                mysqli_rollback($connect);
                mysqli_close($connect);
                echo json_encode($response);
                exit();
            }
            mysqli_close($connect);
            $response['value'] = 1;
            $response['message'] = "Data berhasil ditambahkan";
            echo json_encode($response);
            exit();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>