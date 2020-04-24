<?php

  require 'functions.php';

  if ( isset($_POST["register"])){
    
    if ( registrasi($_POST) > 0 ) {
      echo "<script> alert('user baru berhasil ditambahkan!'); </script>";
    } else{
      echo mysqli_error($con);
    }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Registrasi</title>
    <link type="text/css" rel="stylesheet" href="css/registrasi.css">
</head>

<body>
    <form action="" method="post">
        <h2>Halaman Registrasi</h2>
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <input type="password" placeholder="Confirm Password" name="confirmpassword">
        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>