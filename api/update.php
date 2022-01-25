<?php 

include "../config/koneksi.php";

$id = @$_POST['id'];
$nama_barang = @$_POST['waktu'];
$jumlah_barang = @$_POST['tanggal'];
$kode_barang = @$_POST['kegiatan'];
$harga_barang = @$_POST['prioritas'];

$data = [];

$query = mysqli_query($conn, "UPDATE `daily` SET `waktu`='".$nama_barang."',`tanggal`='".$jumlah_barang."',`kegiatan`='".$kode_barang."',`prioritas`='".$harga_barang."' WHERE `id`='".$id."'");

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = $query;
} else {
    $status = false;
    $pesan = "request failed";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>