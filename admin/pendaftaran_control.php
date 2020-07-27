<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, nilai.nilai_un, nilai.nilai_us, nilai.nilai_uts_1, nilai.status FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_pendaftar = $_GET['id'];
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar where id = '$id_pendaftar'");

    if(mysqli_num_rows($query_pendaftar)){

        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        // hapus nilai
        $sql_hapus_nilai = mysqli_query($koneksi," DELETE FROM nilai where pendaftar_id = '$id_pendaftar'");

        // hapus foto pendaftar
        unlink('../uploads/'. $data_pendaftar['foto']);
        $sql_hapus_pendaftar = mysqli_query($koneksi," DELETE FROM pendaftar where id = '$id_pendaftar'");

        // hapus nilai
        $sql_hapus_user = mysqli_query($koneksi," DELETE FROM users where id = '$id_user'");

        if(!$sql_hapus_nilai || !$sql_hapus_pendaftar || !$sql_hapus_user) {
            die('Query Error: '. mysqli_error($koneksi));
        }

        // simpan session
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        // header('location:pendaftaran.php');

    } else {
        die('Data pendaftar tidak ditemukan!');
    }
}


?>