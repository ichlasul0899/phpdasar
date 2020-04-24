<?php
    // koneksi ke database
    $con = mysqli_connect("localhost","root","","phpdasar");

    function query($query){
        global $con;
        $result = mysqli_query( $con , $query );
        $rows = [];
        while ( $row=mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $con;

        // $gambar = htmlspecialchars($data["gambar"]);
        // Upload gambar
        $gambar = upload();
        if (!$gambar){
            return false;
        }


        $edisi = htmlspecialchars($data["edisi"]);
        $harga = htmlspecialchars($data["harga"]);
        $transmisi = htmlspecialchars($data["transmisi"]);
        $bahan_bakar = htmlspecialchars($data["bahan_bakar"]);
        $mesin = htmlspecialchars($data["mesin"]);
        $tempat_duduk = htmlspecialchars($data["tempat_duduk"]);

        $query = "INSERT INTO cars VALUES ('','$edisi', $harga ,'$transmisi','$bahan_bakar','$mesin','$tempat_duduk','$gambar')";
        mysqli_query($con, $query);
        
        return mysqli_affected_rows($con);
    }



    function hapus($id){
        global $con;

        $query = "DELETE FROM cars WHERE id = $id";
        mysqli_query($con,$query);

        return mysqli_affected_rows($con);
    }

    function ubah($data){
        global $con; 
        $id = $data["id"];
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        //cek apkah user pilih gambar baru atau tidak
        if ($_FILES['gambar']['error']===4){
            $gambar=$gambarLama;
        } else {
            $gambar = upload();
        }

        
        $edisi = htmlspecialchars($data["edisi"]);
        $harga = htmlspecialchars($data["harga"]);
        $transmisi = htmlspecialchars($data["transmisi"]);
        $bahan_bakar = htmlspecialchars($data["bahan_bakar"]);
        $mesin = htmlspecialchars($data["mesin"]);
        $tempat_duduk = htmlspecialchars($data["tempat_duduk"]);

        $query = "UPDATE cars SET edisi = '$edisi', harga = $harga , transmisi = '$transmisi', bahan_bakar = '$bahan_bakar', mesin = '$mesin', tempat_duduk = '$tempat_duduk', gambar = '$gambar' WHERE id =$id";
        mysqli_query($con, $query);
        
        return mysqli_affected_rows($con);
    }

    function cari($keyword){
        $query = "SELECT * FROM CARS WHERE edisi LIKE '%$keyword%' OR harga LIKE '%$keyword%' OR transmisi LIKE '%$keyword%' OR bahan_bakar LIKE '%$keyword%' OR mesin LIKE '%$keyword%' OR tempat_duduk LIKE '%$keyword%'";

        // $query = "SELECT * FROM cars WHERE edisi LIKE '%$keyword%' OR harga LIKE '%$keyword%'";

        return query($query);
    }

    function upload() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apkah tidak ada gambar yang diupload
        if($error === 4 ){
            echo "<script>alert('pilih gambar dulu boss!');</script>";
            return false;
        }

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ["jpg","jpeg", "png"];
        $ekstensiGambar = explode("." , $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar,$ekstensiGambarValid)){
            echo "<script>alert('upload gambar harus bertipe jpg,jpeg,png boss!');</script>";
            return false;
        }

        // cek ukuran gambar
        if ($ukuranFile > 2000000){
            echo "<script>alert('ukuran gambar harus dibawah 2mb boss!');</script>";
            return false;
        }

        //Siap diupload klo lolos

        // generate nama gambar baru agar ketika diupload dengan nama yang sama amaka tidak akanketimpa
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;


        move_uploaded_file($tmpName,'img/'.$namaFileBaru);

        // return nama file supaya di function tambah bisa masuk ke fariabel gambar
        return $namaFileBaru;
        
    }

    function registrasi($data){
        global $con;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($con,$data["password"]);
        $confirmpassword = mysqli_real_escape_string($con,$data["confirmpassword"]);

        // username sudah ada atau belum
        $result = mysqli_query($con, "SELECT username FROM users WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>alert('Sudah terdaftar boss!');</script>";
            return false;
        }

        // cek konfirmasi password
        if ($password !== $confirmpassword){
            echo "<script>alert('Password Tidak Sesuai!');</script>";
            return false;
        }

        // enkripsi password
        // jamgam pake md5
        // $password = md5($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($password);die;

        // masukkan ke database
        $query = "INSERT INTO users VALUES('', '$username','$password')";
        mysqli_query($con, $query);

        return mysqli_affected_rows($con);




    }
?>