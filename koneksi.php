<?php

//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "osis_voting"; //nama database

$koneksi = new mysqli($host, $user, $pass, $db);


//cek koneksi
if($koneksi->connect_error) {
    die("lost connection: " . $koneksi->connect_error);
 }