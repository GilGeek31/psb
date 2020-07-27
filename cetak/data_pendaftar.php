<?php

include('../config/koneksi.php');
require '../vendor/autoload.php';

// // // reference the Dompdf namespace
use Dompdf\Dompdf;

// // // instantiate and use the dompdf class
$dompdf = new Dompdf(); 

$html = '<style>
table, th, td {
    font-size: 12px;
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
}
</style>

<img src="../assets/img/logo.png" style="float: left; height: 60px">

<div style="margin-left: 20px">
    <div style="font-size: 18px">Data Pendaftaran Siswa Baru | TAHUN 2020</div>
    <div style="font-size:20px">SMK NEGERI DARUL ULUM</div>
    <div style="font-size: 12px">Dusun Krajan, Wringin Putih, Muncar, Kabupaten Banyuwangi, Jawa Timur 68472</div>
</div>

<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">

<div style="font-size: 12px; margin-left: 10px;">&nbsp; Tanggal CETAK: '. date("d-m-Y") .'</div>

<table width="100%">
<tr>
    <th width="5%">No</th>
    <th width="13%">Nama</th>
    <th width="20%">TTL</th>
    <th width="5%">JK</th>
    <th>Alamat</th>
    <th width="7%">Telepon</th>
    <th width="5%">Nilai</th>
    <th width="10%">Status</th>
</tr>';

// tabel pendaftar
$all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, nilai.nilai_un, nilai.nilai_us, nilai.nilai_uts_1, nilai.status FROM pendaftar, nilai WHERE pendaftar.id = nilai.pendaftar_id order by status, nama");

$no = 1;
while($p = mysqli_fetch_array($all_pendaftar)) { 
    if($p['status'] == 0) {
        $status = "Baru";
    } else if($p['status'] == 1) {
        $status = "Lolos";
    } else {
        $status = "Tdk Lolos";
    }
    
$html .= '
<tr>
    <td align="center">'. $no++ . '</td>
    <td>'. $p['nama'] . '</td>
    <td>'. $p['tmpt_lahir'] . ', '. $p['tgl_lahir'] . '</td>
    <td align="center">'. $p['jenis_kelamin'] . '</td>
    <td>'. $p['alamat'] . '</td>
    <td>'. $p['telepon'] . '</td>
    <td align="center">'.  number_format(($p['nilai_uts_1'] + $p['nilai_us'] + $p['nilai_un']) / 3, 2) . '</td>
    <td align="center">'. $status . '</td>
</tr>';

}

$html .= '
</table>';

$dompdf->loadHtml($html);

// // // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// // // Render the HTML as PDF
$dompdf->render();

// // // Output the generated PDF to Browser
$dompdf->stream("data pendaftar.pdf", array("Attachment"=>0));
