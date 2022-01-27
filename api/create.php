<?php 
include "../config/koneksi.php";
$waktu = @$_POST['waktu'];
$tanggal = @$_POST['tanggal'];
$kegiatan = @$_POST['kegiatan'];
$prioritas = @$_POST['prioritas'];
$data = [];
$query = mysqli_query($conn, "INSERT INTO `daily` (`waktu`,`tanggal`,`kegiatan`,`prioritas`) VALUES ('".$waktu."', '".$tanggal."', '".$kegiatan."', '".$prioritas."')" );
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
