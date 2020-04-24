<?php

    //file ini belum modular

    
    // koneksi ke database
    $con = mysqli_connect("localhost","root","","phpdasar");
    

    // cek apkah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])) {
        // ambil data dari tiap elemen dalam form
        $gambar = $_POST["gambar"];
        $edisi = $_POST["edisi"];
        $harga = $_POST["harga"];
        $transmisi = $_POST["transmisi"];
        $bahan_bakar = $_POST["bahan_bakar"];
        $mesin = $_POST["mesin"];
        $tempat_duduk = $_POST["tempat_duduk"];

        // query insert data
        $query = "INSERT INTO cars VALUES ('','$edisi', '$harga' ,'$transmisi','$bahan_bakar','$mesin','$tempat_duduk','$gambar')";
        mysqli_query($con, $query);

        // cek apakah data berhasil ditambahkan atau tidak
        var_dump(mysqli_affected_rows($con));
        if ( mysqli_affected_rows($con) > 0 ){
          echo "Berhasil";
        } else {
          echo "Gagal!";
          echo "<br>";
          echo mysqli_error($con);
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<form action="" method="POST" style="margin:50px">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="edisi">Edisi</label>
      <input type="text" class="form-control" id="edisi" name="edisi">
    </div>
    <div class="form-group col-md-6">
      <label for="harga">Harga</label>
      <input type="number" class="form-control" id="harga" name="harga">
    </div>
  </div>

  <div class="form-group">
    <label for="transmisi">Transmisi</label>
    <input type="text" class="form-control" id="transmisi" placeholder="Otomatis" name="transmisi">
  </div>
  <div class="form-group">
    <label for="bahan_bakar">Bahan Bakar</label>
    <input type="text" class="form-control" id="bahan_bakar" placeholder="Bensin"name="bahan_bakar">
  </div>
  <div class="form-group">
    <label for="mesin">Mesin</label>
    <input type="text" class="form-control" id="mesin" name="mesin">
  </div>

  <div class="form-group">
    <label for="tempat_duduk">Tempat duduk</label>
    <input type="text" class="form-control" id="tempat_duduk" name="tempat_duduk">
  </div>

  <div class="custom-file">
    <label class="custom-file-label" for="gambar">Masukkan gambar</label>
    <input type="file" class="custom-file-input" id="gambar" aria-describedby="inputGroupFileAddon01" name="gambar">
    
  </div>

  <br><br>
  
  
  <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
</form>
</body>
</html>