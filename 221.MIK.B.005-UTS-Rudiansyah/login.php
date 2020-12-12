<?php 
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $usr = $_POST['username'];
$pwd = $_POST['password'];


$sql = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$usr'");

$cek = mysqli_num_rows($sql);


if ($cek === 1) {

    $row = mysqli_fetch_assoc($sql);

    if (password_verify($pwd, $row['password'])) {
      session_start();

        $_SESSION['password'] = true;
        header('location: dashboard.php');

      exit;
    }
}
$error= true;
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
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
        <div class="card" style="margin : 75px 350px 0px 350px;">
          <div class="card-content">
              <h4 class="center">LOGIN</h4>
              <?php if (isset($error)) :?>
                <p class="red-text"> Username / Password Salah!!</p>
              <?php endif ; ?>
              <form action="" method="POST">
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" name="username" id="username">
                    <label for="username">Username</label>
                  </div>
                  <div class="input-field col s12">
                    <input type="password" name="password" id="password">
                    <label for="password">Password</label>
                  </div>
                  <div class="input-field col s6">
                    <button class="btn-small blue-accent-3" name="submit" type="submit">Login</button>  
                  </div>
                  <div class="input-field col s6">
                    <a href="daftar.php" class="btn-small blue-accent-3 right">Registrasi</a>  
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div> 
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="assets/js/materialize.min.js"></script>
</body>
</html>
