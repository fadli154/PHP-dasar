<?php

require "function.php";

$nisn = $_GET["nisn"];

$query = mysqli_query($conn, "SELECT * FROM data_peserta_didik WHERE nisn = $nisn");

if ( isset($_POST["submit"]) ){
// cek apakah Ubah data berhasil dilakukan
    if(Ubah($_POST) > 0){
        echo "<script>
            alert('data berhasil di Ubah!');
            document.location.href = 'index.php';
        </script>";        
    } else {
        echo "<script>
            alert('data Gagal di Ubah!');
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
    <title>Detail form</title>
</head>
<body>
    <form action="" method="POST">

        <?php 
        while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <h1>Form Detail Data</h1>

        <ul>
                <input type="hidden" name="nisn" id="nisn" readonly value="<?= $data["no"] ?>">
            <li>
                <label for="nisn">Nisn : </label>
                <input type="text" name="nisn" id="nisn" readonly value="<?= $data["nisn"] ?>">
            </li>
            <br>
            <li>
                <label for="nm_siswa">Nama Siswa : </label>
                <input type="text" name="nm_siswa" id="nm_siswa" required value="<?= $data["nm_siswa"] ?>">
            </li>
            <br>
            <li>
                <label for="kelas">Kelas : </label>
                <input type="text" name="kelas" id="kelas" value="<?= $data["kelas"] ?>">
            </li>
            <br>
            <li>
                <label for="jurusan">Jurusan :</label>
                <input type="text" name="Jurusan" id="jurusan" value="<?= $data["Jurusan"] ?>">
            </li>
            <br>
            <button type="submit" name="submit">Ubah Data!</button>
        </ul>

        <?php } ?>

    </form>
</body>
</html>