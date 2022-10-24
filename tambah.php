<?php

require "function.php";

if ( isset($_POST["submit"]) ){
    
    // cek apakah tambah data berhasil dilakukan
    if(tambah($_POST) > 0){
        echo "<script>
            alert('data berhasil di tambahkan!');
            document.location.href = 'index.php';
        </script>";        
    } else {
        echo "<script>
            alert('data Gagal di tambahkan!');
        </script>";  
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah form</title>
</head>
<body>
    <form action="" method="POST">

        <h1>Form Tambah Data</h1>

        <ul>
            <li>
                <label for="nisn">Nisn : </label>
                <input type="text" name="nisn" id="nisn" required>
            </li>
            <br>
            <li>
                <label for="nm_siswa">Nama Siswa : </label>
                <input type="text" name="nm_siswa" id="nm_siswa" required>
            </li>
            <br>
            <li>
                <label>Kelas : </label>
                <input type="radio" value="X" name="kelas"> X
                <input type="radio" value="XI" name="kelas"> XI
            </li>
            <br>
            <li>
                <label for="jurusan">Jurusan :</label>
                <select name="Jurusan" id="jurusan">
                    <option value="RPL">RPL</option>
                    <option value="MESIN">MESIN</option>
                    <option value="LISTRIK">LISTRIK</option>
                </select>
            </li>
            <br>
            <button type="submit" name="submit">Tambah</button>
        </ul>

    </form>
</body>
</html>