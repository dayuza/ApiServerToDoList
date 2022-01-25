<?php 

include "../config/koneksi.php";

$User = @$_POST['username'];
$Pass = md5(@$_POST['password']);

$data = [];
$query = mysqli_query($conn, "INSERT INTO `admin` (`username`, `password`) VALUES ('".$User."', '".$Pass."')" );

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = [
        "username" => $User,
        "password" => $Pass
    ];
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