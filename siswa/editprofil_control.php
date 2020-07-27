<?php

$id_user = $_SESSION['id_users'];
$sql_pendaftar = "SELECT * FROM pendaftar where users_id = '$id_user'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

if(mysqli_num_rows($result_pendaftar)){

    $data_pendaftar = mysqli_fetch_array($result_pendaftar);

    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_profil') {
        
        $id_pendaftar = $data_pendaftar['id'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        // GAMBAR
        if($_FILES['gambar']['name'] != '') {

            $ekstensi_diperbolehkan = array('png','jpg');
            $nama_gambar = $_FILES['gambar']['name'];
            // profile.png
            $x = explode('.', $nama_gambar);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['gambar']['size'];
            $file_tmp = $_FILES['gambar']['tmp_name'];

            $ubah_nama = $nama . '.' . $ekstensi;

            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if($ukuran < 1044070) {
                    move_uploaded_file($file_tmp, '../uploads/'. $ubah_nama);

                    $sql_update_profil = "UPDATE pendaftar set foto = '$ubah_nama' where id='$id_pendaftar'";
                    $query_update = mysqli_query($koneksi, $sql_update_profil);

                    if($query_update) {

                    } else {
                        echo "GAGAL UPLOAD"; die;
                    }

                } else {
                    echo "Gambar terlalu besar"; die;
                }

            } else {
                echo " ekstensi tidak diperbolehkan"; die;
            }


        }

        $sql_update_profil = "UPDATE pendaftar set nama='$nama', tmpt_lahir='$tempat_lahir', tgl_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', alamat='$alamat', email='$email', telepon='$telepon' where id='$id_pendaftar'";

        $query_update_profil = mysqli_query($koneksi, $sql_update_profil);

        if($query_update_profil) {
            // berhasil
            $_SESSION['pesan_sukses'] = "Edit Profil Sukses!";
            
            header('location:dashboard.php');
        } else {
            echo "gagal update data profil"; die;
        }

    }

}

?>