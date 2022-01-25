<?php 


include "../config/koneksi.php";
$nama_barang = @$_POST['waktu'];
$jumlah_barang = @$_POST['tanggal'];
$kode_barang = @$_POST['kegiatan'];
$harga_barang = @$_POST['prioritas'];


$data = [];


$query = mysqli_query($conn, "INSERT INTO `daily` (`waktu`,`tanggal`,`kegiatan`,`prioritas`) VALUES ('".$nama_barang."', '".$jumlah_barang."', '".$kode_barang."', '".$harga_barang."')" );

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
