<?php
    require '../functions.php';

    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM CARS WHERE edisi LIKE '%$keyword%' OR harga LIKE '%$keyword%' OR transmisi LIKE '%$keyword%' OR bahan_bakar LIKE '%$keyword%' OR mesin LIKE '%$keyword%' OR tempat_duduk LIKE '%$keyword%'";
    $cars = query($query);

?>
<table class="table table-striped table-dark">
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Edisi</th>
                <th>Harga</th>
                <th>Transmisi</th>
                <th>Bahan Bakar</th>
                <th>Mesin</th>
                <th>Tempat Duduk</th>
                <th>Aksi</th>
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
                <td><a href="ubah.php?id=<?= $car["id"] ?>" >Ubah</a> | 
                    <a href="hapus.php?id=<?= $car["id"]; ?>" onclick=" return confirm('Yakin mau dihapus ?')">Hapus</a>
                </td>
            </tr>
            <?php
                $i++;
            ?>
            <?php endforeach; ?>
        </table>