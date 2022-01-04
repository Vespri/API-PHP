<?php
$host	= "localhost";
$user	= "root";
$password	= "";
$database	= "komputer_polsri";

$db_connect = new mysqli($host, $user, $password, $database);
if($db_connect->connect_error){
    die("Koneksi Gagal: ". $db_connect->connect_error);
}
?>
