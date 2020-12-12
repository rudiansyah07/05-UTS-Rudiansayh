<?php 
include 'koneksi.php';
$id = $_GET['id'];

$sql = $koneksi->query("DELETE FROM siswa WHERE id='$id'");

header('Location:biodata.php');