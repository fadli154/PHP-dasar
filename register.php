<?php 

    require "function.php";

    if(isset($_POST["register"])){

        if( registrasi($_POST) > 0 ){
            echo "<script>
                    alert('user baru berhasil di tambahkan'); 
                    </script>";
        } else {
            echo mysqli_error($conn);
        }
    }


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="POST">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" placeholder="Masukkan Username">
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" placeholder="Masukkan Password">
        <br>
        <label for="password2">Koofirmasi Password :</label>
        <input type="password" name="password2" id="password2" placeholder="Masukkan Password koonfirmasi">
        <br>
        <button type="submit" name="register">Registrasi</button>
    </form>
</body>
</html>