<?php
    require "function.php";
    $siswa = query("SELECT * FROM data_peserta_didik");

    if( isset($_POST["cari"]) ){
        $siswa = cari($_POST["keyword"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selamat Datang, admin</h1>

    <a href="tambah.php">Tambah Data Siswa</a>

    <br><br>

    <form action="" method="post">
        <input type="text" placeholder="Cari Halaman..." name="keyword" autocomplete="off" autofocus>
        <button type="submit" name="cari">Cari !</button>
    </form>
    
    <br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>no</th>
                <th>nisn</th>
                <th>nm_siswa</th>
                <th>kelas</th>
                <th>jurusan</th>
                <th>
                    aksi
                </th>
            </tr>
        </thead>
        <tbody>
        <?php 
            
            $i = 1;
            foreach($siswa as $data) :
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $data["nisn"] ?></td>
                <td><?= $data["nm_siswa"] ?></td>
                <td><?= $data["kelas"] ?></td>
                <td><?= $data["Jurusan"] ?></td>
                <td>
                    <a href="detail.php?nisn=<?= $data["nisn"]?>">Detail |</a>
                    <a href="hapus.php?nisn=<?= $data["nisn"]?>" onclick="return confirm('yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        
            <?php 
            endforeach; ?>
        </tbody>
    </table>
</body>
</html>