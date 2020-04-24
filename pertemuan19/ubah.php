<?php
    session_start();

    if(!isset($_SESSION["login"])){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';

    // ambil data di url
    $id = $_GET["id"];

    // Query data berdasarkan id
    $car = query("SELECT * FROM cars WHERE id = $id")[0];
    

    // cek apkah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])) {
        
        // cek apakah data berhasil diubah atau tidak
        if ( ubah($_POST) > 0){
          echo "
              <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
              </script>
          ";
        } else{
          // var_dump(tambah($_POST));
          echo "
              <script>
                alert('data gagal diubah');
                document.location.href = 'index.php';
              </script>
          ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
</head>
<body>

<div class="navbar-wrapper navbar-fixed black">
        <nav class="black">
        <div class="container">
        
        <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">IVSCARS</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
            <li><a href="index.php">Home</a></li>
            <li><a href="logout.php" class="waves-effect waves-light btn">Logout</a></li>
            
            
        </div>
            
        </div>    
    </nav>
    </div>

    <!-- sidenav -->
    <ul class="sidenav" id="mobile-demo">
      <li><a href="index.php">Home</a></li>
      <li><a href="logout.php" class="waves-effect waves-light btn">Logout</a></li>
    </ul>

      <div class="container">
      <form action="" method="post" style="margin:50px" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $car["id"] ?>">
        </div> 
        <div class="form-group">
            <input type="hidden" name="gambarLama" value="<?= $car["gambar"] ?>">
        </div> 

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="edisi">Edisi</label>
              <input type="text" class="form-control" id="edisi" name="edisi" value="<?= $car["edisi"] ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="harga">Harga</label>
              <input type="number" class="form-control" id="harga" name="harga" value="<?= $car["harga"] ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="transmisi">Transmisi</label>
            <input type="text" class="form-control" id="transmisi" placeholder="Otomatis" name="transmisi" value="<?= $car["transmisi"] ?>">
          </div>
          <div class="form-group">
            <label for="bahan_bakar">Bahan Bakar</label>
            <input type="text" class="form-control" id="bahan_bakar" placeholder="Bensin"name="bahan_bakar" value="<?= $car["bahan_bakar"] ?>">
          </div>
          <div class="form-group">
            <label for="mesin">Mesin</label>
            <input type="text" class="form-control" id="mesin" name="mesin" value="<?= $car["mesin"] ?>">
          </div>

          <div class="form-group">
            <label for="tempat_duduk">Tempat duduk</label>
            <input type="text" class="form-control" id="tempat_duduk" name="tempat_duduk" value="<?= $car["tempat_duduk"] ?>">
          </div>

          <div class="form-group">
            <label for="gambar">Masukkan gambar</label><br>
            <img src="img/<?= $car["gambar"];?>" alt="" > <br><br>    
            <input type="file" id="gambar"  name="gambar" >
            
          </div>

          <br><br>
          
          
          <button type="submit" class="btn btn-primary" name="submit">Ubah</button>
        </form>
    </div>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
          const sidenav = document.querySelectorAll('.sidenav');
          M.Sidenav.init(sidenav);

          
      </script>

</body>
</html>