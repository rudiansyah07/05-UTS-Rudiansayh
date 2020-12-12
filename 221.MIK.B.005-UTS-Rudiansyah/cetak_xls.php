<?php 
include 'koneksi.php';
$sql = $koneksi->query("SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=peserta.xls");
?>
<body>
    <table>
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
</body>
</html>