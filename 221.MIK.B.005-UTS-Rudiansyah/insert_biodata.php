<?php
include 'koneksi.php';

if(isset($_POST['Submit'])) {
  $nim = $_POST['nim'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $agama = $_POST['agama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $jurusan = $_POST['jurusan'];
  $nama_ayah = $_POST['nama_ayah'];
  $nama_ibu = $_POST['nama_ibu'];
  $alamat_rumah = $_POST['alamat_rumah'];
  $asal_sekolah = $_POST['asal_sekolah'];
  $no_hp = $_POST['no_hp'];
  $no_hp_ortu = $_POST['no_hp_ortu'];

          $sql = $koneksi->query("INSERT INTO siswa VALUES ('', '$nim', '$nama_lengkap', '$agama', '$jenis_kelamin', '$jurusan', '$nama_ayah', '$nama_ibu', '$alamat_rumah', '$asal_sekolah', '$no_hp', '$no_hp_ortu')");
        header('Location:biodata.php');


} else {
  echo "Gagal";
}
?>