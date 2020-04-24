<?php
    session_start();
    
    require 'functions.php';

    //cek cookie, 
    // if (isset($_COOKIE['login'])){
    //     if( $_COOKIE['login'] == 'true'){
    //         $_SESSION['login'] = true;
    //     }
    // }

    //cek cookie
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        $result = mysqli_query($con, "SELECT username FROM user WHERE id = $id");
        $row = mysqli_fetch_assoc($result);

        //cek cookie username
        if ( $key === hash('sha256', $row['username'])) {
            $_SESSION['login']= true;
        }
    }

    if (isset($_SESSION["login"])){
       header("location: index.php"); 
    }


    if(isset($_POST["login"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");

        // var_dump(mysqli_num_rows($result));die;


        // cek username
        if ( mysqli_num_rows($result) === 1 ) {

            $row = mysqli_fetch_assoc($result);
            // cek password
            if ( password_verify($password, $row["password"]) ) {
                
                //set sesion
                $_SESSION["login"] = true;

                //cekk remember me
                if ( isset($_POST['remember'])){
                    // setcookie('login','true', time()+60);

                    setcookie('id',$row['id'], time()+60);
                    setcookie('key',hash('sha256',$row['username']),time()+60);
                }
                
                header("Location: index.php");
                exit;
            }
        }

        $error = true;


        
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>1301170763</title>
    <!-- <link type="text/css" rel="stylesheet" href="css/registrasi.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="color: black">
    <!-- <form action="" method="post">
        <h2>Login</h2>

        <?php if(isset($error)) : ?>
            <p style="color: red; font-style: italic; text-align: center; ">Username Atau Password Salah</p>
        <?php endif; ?>

        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <input type="checkbox" name="remember" id="remember" ><label for="remember">Remember me</label>

        <button type="submit" name="login">Login</button>
        <br>
        <a href="guest.php">Masuk sebagai tamu</a>
    </form> -->

    <div class="container" style="padding: 50px;">    

        <form action="" method="post">
            <div class="form-group">
                <h2>Login</h2>
                <?php if(isset($error)) : ?>
                    <p style="color: red; font-style: italic; text-align: center; ">Username Atau Password Salah</p>
                <?php endif; ?>
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
                <small  class="form-text text-muted">Hannya admin yang bisa login.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>

            <br><br><br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <a href="guest.php">Masuk sebagai tamu</a>
        </form>

    </div>
</body>

</html>