<?php 

include "../config/koneksi.php";

$id = @$_POST['id'];
$waktu = @$_POST['waktu'];
$tanggal = @$_POST['tanggal'];
$kegiatan = @$_POST['kegiatan'];
$prioritas = @$_POST['prioritas'];

$data = [];

$query = mysqli_query($conn, "UPDATE `daily` SET `waktu`='".$waktu."',`tanggal`='".$tanggal."',`kegiatan`='".$kegiatan."',`prioritas`='".$prioritas."' WHERE `id`='".$id."'");

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
