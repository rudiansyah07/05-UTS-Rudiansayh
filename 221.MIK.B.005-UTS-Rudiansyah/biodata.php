<?php 
// session_start();
// if (!isset($_SESSION['password'])) {
//     header('location: login.php ');
//     exit;
// }
include 'koneksi.php';

$jumlahDataPerHalaman = 5;
$hitung = $koneksi->query("SELECT * FROM siswa");
$jumlahData = mysqli_num_rows($hitung);

$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
$halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

if (isset($_POST['btnserach'])) {
  $search = $_POST['search'];

  $sql = $koneksi->query("SELECT * FROM biodata 
    WHERE nama LIKE '%'. $search .'%' ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

  if (mysqli_num_rows($sql) == 0) {
    $sql = $koneksi->query("SELECT * FROM biodata ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");
    echo '<script>alert("Data tidak ditemukan");</script>';
  }

} else {
  $sql = $koneksi->query("SELECT * FROM biodata ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");
}

?>

<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col s12 m12">
        <h3>DATA SISWA ELTIBIZ 2019</h3>
        <div class="row">
          <div class="col s12 m12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <form action="" method="POST">
                    <!-- Kolom 1 -->
                    <div class="col s4 m4">
                      <input type="text" name="search" placeholder="Pencarian berdasarkan Nama">
                    </div>
                    <!-- Kolom 2 -->
                    <div class="col s4 m4">
                      <button type="submit" name="btnserach" class="btn-small blue darken-1">Search</button>
                    </div>
                  </form>
                  <!-- Kolom 3 -->
                  <div class="col s4 m4">
                    <a href="tambah_biodata.php" class="btn-floating blue darken-1 right"><i class="material-icons">add</i></a>
                  </div>

                </div>
                <table class="highlight responsive-table">
                  <thead>
                    <tr>
                      <th class="center-align">No</th>
                      <th class="center-align">NIM</th>
                      <th>Nama Lengkap</th>
                      <th class="center-align">Agama</th>
                      <th class="center-align">Jenis Kelamin</th>
                      <th class="center-align">Jurusan</th>
                      <th class="center-align">Nama Ayah</th>
                      <th class="center-align">Nama Ibu</th>
                      <th class="center-align">Alamat Rumah</th>
                      <th class="center-align">Asal Sekolah</th>
                      <th class="center-align">Nomor Handphone</th>
                      <th class="center-align">Nomor Handphone Orang Tua</th>
                      <th class="center-align" width="200pt">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; ?>
                    <?php foreach ($hitung as $row) : ?>
                      <tr>
                        <td class="center-align"><?= $no++; ?></td>
                        <td class="center-align"><?= $row['nim']; ?></td>
                        <td class="center-align"><?= $row['nama_lengkap']; ?></td>
                        <td class="center-align"><?= $row['agama']; ?></td>
                        <td class="center-align"><?= $row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                        <td class="center-align"><?= $row['jurusan']; ?></td>
                        <td class="center-align"><?= $row['nama_ayah']; ?></td>
                        <td class="center-align"><?= $row['nama_ibu']; ?></td>
                        <td class="center-align"><?= $row['alamat_rumah']; ?></td>
                        <td class="center-align"><?= $row['asal_sekolah']; ?></td>
                        <td class="center-align"><?= $row['no_hp']; ?></td>
                        <td class="center-align"><?= $row['no_hp_ortu']; ?></td>
                          <td width="229pt" class="center-align">
                            <a href="detail_biodata.php?id=<?= $row['id']; ?>" class="btn-small cyan accent-3 black-text">Detail</a> 
                            <a href="edit_biodata.php?id=<?= $row['id']; ?>" class="btn-small yellow accent-3 black-text">Edit</a> 
                            <a href="hapus_biodata.php?id=<?= $row['id']; ?>" onclick = "return confirm('Data akan dihapus ?')" class="btn-small red accent-3">Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s6 m6">
              <a href="cetak_xls.php" class="btn-small">Print xls</a> 
              <a href="cetak_pdf.php" class="btn-small">Print pdf</a>
            </div>
            <div class="col s6 m6">
              <ul class="pagination right">

                <?php if($halamanAktif > 1) : ?>
                  <li class="waves-effect">
                    <a href="?page=<?= $halamanAktif - 1; ?>"><i class="material-icons">chevron_left</i></a>
                  </li>
                  <?php else : ?>
                    <li class="disabled">
                      <a href=""><i class="material-icons">chevron_left</i></a>
                    </li>
                  <?php endif; ?>

                  <?php for($i = 1; $i<=$jumlahHalaman; $i++) : ?>
                    <?php if($i == $halamanAktif) : ?>
                      <li class="active">
                        <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                      </li>
                      <?php else : ?>
                        <li class="waves-effect">
                          <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                      <?php endif; ?>
                    <?php endfor; ?>

                    <?php if($halamanAktif < $jumlahHalaman) : ?>
                      <li class="waves-effect">
                        <a href="?page=<?= $halamanAktif + 1; ?>"><i class="material-icons">chevron_right</i></a>
                      </li>
                      <?php else : ?>
                        <li class="disabled">
                          <a href=""><i class="material-icons">chevron_right</i></a>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!--JavaScript at end of body for optimized loading-->
          <script type="text/javascript" src="assets/js/materialize.min.js"></script>
        </body>
        </html>