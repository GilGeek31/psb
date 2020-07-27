<?php

$id_user = $_SESSION['id_users'];
$sql_pendaftar = "SELECT * FROM pendaftar where users_id = '$id_user'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

if(mysqli_num_rows($result_pendaftar)){

    $data_pendaftar = mysqli_fetch_array($result_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];

    $sql_nilai = "SELECT * FROM nilai where pendaftar_id = '$id_pendaftar'";
    $result_nilai = mysqli_query($koneksi, $sql_nilai);

    if(mysqli_num_rows($result_nilai)) {
        $data_nilai = mysqli_fetch_array($result_nilai);
        $status = $data_nilai['status'];

    } else  {
        // jika belum ada data nilai/ status maka kosong
    }


    // simpan data nilai
    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_nilai') {

        $un = $_POST['un'];
        $us = $_POST['us'];
        $uts_1 = $_POST['uts_1'];

        if(isset($_POST['id_nilai'])) {
            // update
            $id_nilai = $_POST['id_nilai'];

            $sql_update_nilai = "UPDATE nilai set nilai_un='$un', nilai_us='$us', nilai_uts_1='$uts_1' where id='$id_nilai'";
            $query_update_nilai = mysqli_query($koneksi, $sql_update_nilai);

            if($query_update_nilai){
                // berhasil

                $_SESSION['pesan_sukses'] = "Edit Nilai Sukses!";

                header('location:dashboard.php');
                
            } else {
                echo "error ". mysqli_error($koneksi);
                die;
            }

        } else {
            // insert
            $sql_insert_nilai = "INSERT INTO nilai (nilai_un, nilai_us, nilai_uts_1, status, pendaftar_id) values ('$un', '$us', '$uts_1', 0, '$id_pendaftar')";
    
            $query_insert_nilai = mysqli_query($koneksi, $sql_insert_nilai);

            if($query_insert_nilai){
                // berhasil
                header('location:nilai.php');
                
            } else {
                echo "error ". mysqli_error($koneksi);
                die;
            }

        }
    
        
    
    }

}

?>