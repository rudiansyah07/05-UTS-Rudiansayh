<?php 
include 'koneksi.php';
$id = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM siswa WHERE id = '$id'");
$row = mysqli_fetch_assoc($sql);
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
   <div class="container">
      <div class="row">
         <div class="col s12 m12">
            <form action="insert_biodata.php" method="POST">
               <div class="card">
                  <div class="card-content" style="margin-bottom: 1px;">
                  <div class="row">
                        <div class="input-field col s12">
                           <input placeholder="Masukkan NIM" id="nim" type="text" class="validate" name="nim">
                           <label for="nim">NIM</label>
                        </div>
                     </div>
                     <div class="row">
                        <div class="input-field col s12">
                           <input placeholder="Masukkan nama Lengkap" id="nama_lengkap" type="text" class="validate" name="nama_lengkap">
                           <label for="nama_lengkap">Nama Lengkap</label>
                        </div>
                     </div>

                     <div class="row" style="margin-bottom: 45px;">
                        <div class="col s12">
                           <label for="agama">Agama</label>
                           <select class="browser-default" name="agama" id="agama">
                              <option value="" disabled selected>Choose your option</option>
                              <?php $agama = array('Islam', 'Protestan', 'Khatolik', 'Hindu', 'Budha', 'Konghuchu'); ?>
                              <?php foreach ($agama as $key) : ?>
                                 <option value="<?= $key; ?>"><?= $key; ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                     </div>

                     <div class="row" style="margin-bottom: 25px;">
                        <div class="col s12">
                           <label>Jenis Kelamin</label><br>
                           <p>
                              <label for="laki-laki">
                                 <input name="jenis_kelamin" value="L" type="radio" id="laki-laki" />
                                 <span>Laki-laki</span>
                              </label>
                           </p>
                           <p>
                              <label for="perempuan">
                                 <input name="jenis_kelamin" value="P" type="radio" id="perempuan" />
                                 <span>Perempuan</span>
                              </label>
                           </p>
                        </div>  
                     </div>

                     <div class="row" style="margin-bottom: 45px;">
                        <div class="col s12">
                           <label for="jurusan">Jurusan</label>
                           <select class="browser-default" name="jurusan" id="jurusan">
                              <option value="" disabled selected>Pilih Jurusan</option>
                              <?php $jurusan = array('Manajenen Informatika Dan komputer', 'IT Suport', 'Administrasi Perkantoran', 'Akuntansi Perkantoran'); ?>
                              <?php foreach ($jurusan as $key) : ?>
                                 <option value="<?= $key; ?>"><?= $key; ?></option>
                              <?php endforeach ?>
                           </select>
                        </div>
                     </div>

                     <div class="row">
                        <div class="input-field col s12">
                           <input placeholder="Masukkan nama ayah" id="nama_ayah" type="text" class="validate" name="nama_ayah">
                           <label for="nama_ayah">Nama Ayah</label>
                        </div>
                     </div>

                     <div class="row">
                        <div class="input-field col s12">
                           <input placeholder="Masukkan nama ibu" id="nama_ibu" type="text" class="validate" name="nama_ibu">
                           <label for="nama_ibu">Nama Ibu</label>
                        </div>
                     </div>

                     <div class="row">
                        <div class="input-field col s12">
                           <label for="alamat_rumah">Alamat Rumah</label>
                           <textarea id="alamat_rumah" class="materialize-textarea validate" placeholder="Masukkan alamat lengkap" name="alamat_rumah"></textarea>
                        </div>
                     </div>

                     <div class="row">
                        <div class="input-field col s12">
                           <input placeholder="Masukkan Asal Sekolah" id="asal_sekolah" type="text" class="validate" name="asal_sekolah">
                           <label for="asal_sekolah">Asal Sekolah</label>
                        </div>
                     </div>

                     <div class="row">
                        <div class="input-field col s12">
                           <input placeholder="Masukkan nomor handphone" id="no_hp" type="number" class="validate" name="no_hp">
                           <label for="no_hp">Nomor Handphone</label>
                        </div>
                     </div>

                     <div class="row">
                        <div class="input-field col s12">
                           <input placeholder="Masukkan nomor handphone Orang Tua" id="no_hp_ortu" type="number" class="validate" name="no_hp_ortu">
                           <label for="no_hp_ortu">Nomor Handphone Orang Tua</label>
                        </div>
                     </div>

                  <div class="card-action">
                     <button class="btn-small blue accent-3" type="submit">Simpan</button> 
                     <button class="btn-small red accent-3" type="button">Batal</button> 
                     <a href="biodata.php" class="btn-small blue-grey lighten-5 black-text">Kembali</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>      

   <script type="text/javascript" src="assets/js/materialize.min.js"></script>
</body>
</html>