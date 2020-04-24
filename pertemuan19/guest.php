<?php

    require 'functions.php';

    $cars = query("SELECT * FROM cars ORDER BY id DESC");

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
            
</head>
<body id="home">

    <div class="navbar-wrapper navbar-fixed black">
        <nav class="black">
        <div class="container">
        
        <div class="nav-wrapper">
            <a href="#home" class="brand-logo">IVSCARS</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                
                
                <li><a href="login.php" class="waves-effect waves-light btn">Login</a></li>

            </ul>         
        </div>            
        </div>    
    </nav>
    </div>

    <!-- sidenav -->
    <ul class="sidenav" id="mobile-demo">
      
      <li><a href="login.php" class="waves-effect waves-light btn">Login</a></li>
    </ul>






    <!-- <h2>Daftar Mobil</h2>
    <br>
    <br> -->
    <br>
    <div class="container ">
        <form action="" method="post">
            <input class="s12 m6 center" id="keyword" type="text" name="keyword" size="20" autofocus placeholder="Apa yang anda cari ?" autocomplete="off">
            <!-- <button id="tombolCari" type="submit" name="cari">Cari</button> -->
        </form>
    </div>

    <h3 class="center">New Cars Available !</h3>
    
    <br>
    <!-- <a href="tambah.php">Tambah data mobil</a>
    <br><br><br> -->
    <div id="container" class="container">
        <table class="higligth centered">
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Edisi</th>
                <th>Harga</th>
                <th>Transmisi</th>
                <th>Bahan Bakar</th>
                <th>Mesin</th>
                <th>Tempat Duduk</th>
                
            </tr>
            <?php
                $i=1;
            ?>
            <?php foreach($cars as $car) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><img src="img/<?= $car["gambar"]; ?>" alt=""></td>
                <td><?= $car["edisi"]; ?></td>
                <td>Rp <?= $car["harga"]; ?></td>
                <td><?= $car["transmisi"]; ?></td>
                <td><?= $car["bahan_bakar"]; ?></td>
                <td><?= $car["mesin"]; ?></td>
                <td><?= $car["tempat_duduk"]; ?></td>
                
            </tr>
            <?php
                $i++;
            ?>
            <?php endforeach; ?>
        </table>
    </div>

    


    <!-- footer -->
    <footer class="page-footer grey darken-3">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">About</h5>
                <p class="grey-text text-lighten-4">Website ini sudah bisa melakukan CRUD dan fitur fitur lainnya adalah, login, registrasi, session, cookie, dan live search menggunakan AJAX.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Developer Contact</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://www.instagram.com/ssfc_2397">Instagram</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://ichlasul0899.github.io/">Personal Website</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.linkedin.com/in/ichlasul-amal-505258194/">Linked In Profile</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright black">
            <div class="container">
            Ichlasul Amal © Copyright 2020  
            <a class="grey-text text-lighten-4 right" href="https://github.com/ichlasul0899">Source Code</a>
            </div>
          </div>
        </footer>

    <!-- <br><button ><a href="logout.php">Logout</a></button> -->

    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
          const sidenav = document.querySelectorAll('.sidenav');
          M.Sidenav.init(sidenav);

          
      </script>

</body>
</html>